<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\UserActivity;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::orderBy('id','asc')->get();
        return view('admin.permission.index', compact('permissions'));
    }

    public function create()
    {
        return view('admin.permission.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:permissions',
        ]);
        $input = $request->except('_token');
        $permission = Permission::create($input);
        $dataName = $permission->name;
        $tableName = getTableName(new Permission());
        $msg = 'created the permission ' . $dataName;
        UserActivity::storeLog($request, 'create', $message = $msg, $table_name = $tableName,
            $data_name = $dataName);
        Session::flash('message', 'Permission created successfully.');
        return redirect()->route('permission.index');
    }

    public function edit($id)
    {
        $permission = Permission::find($id);
        return view('admin.permission.edit', compact('permission'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|unique:permissions,name,' . $request->id,
        ]);
        $permission = Permission::find($id);
        $dataName = $permission->name;
        $input = $request->except('_token');
        $permission->update($input);
        $name = $permission->name;
        $tableName = getTableName(new Permission());
        $msg = 'updated the permission ' . $dataName . ' to ' . $name;
        UserActivity::storeLog($request, 'update', $message = $msg, $table_name = $tableName,
            $data_name = $dataName);
        Session::flash('message', 'Permission updated successfully.');
        return redirect()->route('permission.index');
    }

    public function destroy(Request $request, $id)
    {
        $permission = Permission::find($id);
        $dataName = $permission->name;
        $permission->delete();
        $tableName = getTableName(new Permission());
        $msg = 'deleted the permission ' . $dataName;
        UserActivity::storeLog($request, 'delete', $message = $msg, $table_name = $tableName,
            $data_name = $dataName);
        Session::flash('message', 'Permission deleted.');
        return redirect()->route('permission.index');
    }
}
