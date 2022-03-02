<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminUserRequest;
use App\Models\Admin;
use App\Models\FileUpload;
use App\Models\Role;
use App\Models\UserActivity;
use App\Rules\MatchPassword;
use Illuminate\Http\Request;
use App\Models\FileUpload as Upload;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    protected $destination = "images/admin/avatars/";

    protected function admin()
    {
        $admin = Auth::guard('admin')->user();
        return $admin;
    }

    public function index()
    {
        $admins = Admin::latest()->get();
        return view('admin.user.index', compact('admins'));
    }

    public function create()
    {
        $roles = Role::all();
        return view('admin.user.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:admins,email',
            'active' => 'required',
            'password' => 'required|confirmed|min:8',
            'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:4096',
            'roles' => 'required',
        ], [
            'name.required' => 'The name field is required.',
            'email.required' => 'Email is required',
            'email.email' => 'Please enter valid email address.',
            'email.unique' => 'Email has already been taken.',
            'password.required' => 'Password field is required',
            'password.confirmed' => 'Password confirmation does not match.',
            'password.min' => 'Password must be of at least 8 characters.',
            'roles.required' => 'At least one role must be selected.',
        ]);
        $input = $request->except('_token', 'password_confirmation');
        if ($request->hasFile('avatar')) {
            $input['avatar'] = Upload::file($request, 'avatar', '', $this->destination);
        }
        $input['password'] = Hash::make($request->password);
        $roles = $request->roles;
        $admin = Admin::create($input);
        $admin->roles()->sync($roles);
        $dataName = $admin->name;
        $tableName = getTableName(new Admin());
        $msg = 'created the admin user ' . $dataName;
        UserActivity::storeLog($request, 'create', $message = $msg, $table_name = $tableName,
            $data_name = $dataName);
        Session::flash('message', 'New user has been successfully added.');
        return redirect()->route('admin.index');
    }

    public function edit($id)
    {
        $admin = Admin::where('id', $id)->firstOrFail();
        $roles = Role::all();
        return view('admin.user.edit', compact('admin', 'roles'));
    }

    public function update(Request $request, $id)
    {
        $user = Admin::find($id);
        $oldPassword = $user->password;
        $oldImage = $user->avatar;
        $dataName = $user->name;
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:admins,email,' . $user->id,
            'active' => 'required',
            'password' => 'confirmed|min:8|nullable',
            'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:4096',
            'roles' => 'required',
        ], [
            'name.required' => 'The name field is required.',
            'email.required' => 'Email is required',
            'email.email' => 'Please enter valid email address.',
            'email.unique' => 'Email has already been taken.',
            'password.confirmed' => 'Password confirmation does not match.',
            'password.min' => 'Password must be of at least 8 characters.',
            'roles.required' => 'At least one role must be selected.',
        ]);
        $input = $request->except('_token', 'password_confirmation');
        if ($request->hasFile('avatar')) {
            if ($oldImage != null && file_exists($this->destination . $oldImage) && $oldImage != 'default.png') {
                unlink($this->destination . $oldImage);
            }
            $input['avatar'] = Upload::file($request, 'avatar', '', $this->destination);
        } else {
            $input['avatar'] = $oldImage;
        }
        if ($request->filled('password')) {
            $input['password'] = Hash::make($request->password);
        } else {
            $input['password'] = $oldPassword;
        }
        $roles = $request->roles;
        $user = Admin::where('id', $id)->firstOrFail();
        $user->update($input);
        $user->roles()->sync($roles);
        $tableName = UserActivity::getTableName(new Admin());
        $msg = 'updated the admin user ' . $dataName;
        UserActivity::storeLog($request, 'update', $message = $msg, $table_name = $tableName,
            $data_name = $dataName);
        Session::flash('message', 'User has been successfully updated.');
        return redirect()->route('admin.index');
    }

    public function destroy($id)
    {

    }

    public function profile()
    {
        $admin = Auth::guard('admin')->user();
        return view('admin.user.profile', compact('admin'));
    }

    public function adminNewPassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required', new MatchPassword()],
            'new_password' => ['required'],
            'confirm_new_password' => ['same:new_password'],
        ]);
        $admin = Auth::guard('admin')->user();
        Admin::find($admin->id)->update(['password' => Hash::make($request->new_password)]);
        Auth::logout();
        Session::flush();
        return redirect()->route('admin.showLogin');
    }

    public function changeAdminEmail(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
        ]);
        Admin::find($this->admin()->id)->update(['email' => $request->email]);
        $notification = array(
            'alert-type' => 'success',
            'message' => 'Email changed successfully.'
        );
        return redirect()->back()->with($notification);
    }

    public function chageAdminAvatar(Request $request)
    {
        $this->validate($request, [
            'image' => 'mimes:jpeg,jpg,png,svg|max:4096',
        ]);
        $input = $request->except('_token');
        $currentImage = $this->admin()->avatar;
        if ($request->hasFile('image')) {
            if ($currentImage != null && file_exists($this->destination . $currentImage) && $currentImage != "default.png") {
                unlink($this->destination . $currentImage);
            }
            $input['avatar'] = Upload::file($request, 'image', '', $this->destination);
        } else {
            $input['avatar'] = $currentImage;
        }
        $this->admin()->update($input);
        $notification = array(
            'alert-type' => 'success',
            'message' => 'Email changed successfully.'
        );
        return redirect()->back()->with($notification);
    }
}
