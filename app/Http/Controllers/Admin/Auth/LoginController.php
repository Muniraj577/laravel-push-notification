<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\UserActivity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    protected $email = 'email';
    protected $redirectTo = '/admin/dashboard';
    protected $guard = 'admin';

    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    public function postLogin(Request $request)
    {
        $admin = Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password, 'active' => 1]);
        if ($admin) {
            $dataName = 'logged in';
            $tableName = UserActivity::getTableName(new Admin());
            $msg = $dataName;
            UserActivity::storeLog($request, 'login', $message = $msg, $table_name = $tableName,
                $data_name = $dataName);
            return redirect($this->redirectTo);
        }
        return redirect()->back();
    }

    public function getLogout(Request $request)
    {
        $dataName = 'logged out';
        $tableName = UserActivity::getTableName(new Admin());
        $msg = $dataName;
        UserActivity::storeLog($request, 'logout', $message = $msg, $table_name = $tableName,
            $data_name = $dataName);
        Auth::guard('admin')->logout();
        return redirect('/');
    }
}
