<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use App\Models\UserActivity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::latest()->get();
        return view('admin.role.index', compact('roles'));
    }

    public function create()
    {
        $permissions = Permission::where('name', '<>', 'All')->get();
        return view('admin.role.create', compact('permissions'));
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:roles,name',
            'permissions' => 'required',
        ], [
            'permissions.required' => 'Please select permissions.'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        if ($validator->passes()) {
            $permissions = $request->permissions;
            $role = new Role();
            $role->name = $request->name;
            $role->slug = Str::slug($request->name);
            $role->save();
            $role->permissions()->sync($permissions);
        }
        $dataName = $role->name;
        $tableName = getTableName(new Role());
        $msg = 'created the role ' . $dataName;
        UserActivity::storeLog($request, 'create', $message = $msg, $table_name = $tableName,
            $data_name = $dataName);
        Session::flash('message', 'Role created successfully.');
        return redirect()->route('role.index');
    }

    public function edit($id)
    {
        $role = Role::find($id);
        $permissions = Permission::where('name', '<>', 'All')->get();
        return view('admin.role.edit', compact('role', 'permissions'));
    }

    public function update(Request $request, $id)
    {
        $role = Role::find($id);
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:roles,name,' . $role->id,
            'permissions' => 'required',
        ], [
            'permissions.required' => 'Please select permissions.'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        if ($validator->passes()) {
            $permissions = $request->permissions;
            $dataName = $role->name;
            $role->name = $request->name;
            $role->slug = Str::slug($request->name);
            $role->save();
            $name = $role->name;
            $role->permissions()->sync($permissions);
        }
        $tableName = getTableName(new Role());
        $msg = 'updated the role ' . $dataName . ' to ' . $name;
        UserActivity::storeLog($request, 'update', $message = $msg, $table_name = $tableName,
            $data_name = $dataName);
        Session::flash('message', 'Role updated successfully.');
        return redirect()->route('role.index');
    }

    public function destroy(Request $request, $id)
    {
        $role = Role::find($id);
        $dataName = $role->name;
        $permissions = $role->permissions;
        $role->permissions()->detach($permissions);
        $role->delete();
        $tableName = getTableName(new Role());
        $msg = 'deleted the role ' . $dataName;
        UserActivity::storeLog($request, 'delete', $message = $msg, $table_name = $tableName,
            $data_name = $dataName);
        Session::flash('message', 'Role deleted successfully.');
        return redirect()->route('role.index');
    }
}
