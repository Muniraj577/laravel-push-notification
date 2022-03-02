<?php

namespace App\Models;

use App\Notifications\AdminResetPasswordNotification;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Laravel\Passport\HasApiTokens;

class Admin extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;

    protected $fillable = ['name', 'email', 'password', 'active', 'avatar', 'phone'];

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new AdminResetPasswordNotification($token));
    }

    public function roles()
    {
        return $this->belongsToMany('App\Models\Role', 'admin_roles');
    }

    public static function datas()
    {
        if (Request::is('api/*')) {
            $admin = Auth::guard('admin-api')->user();
            if ($admin) {
                $admin_id = $admin->id;
                $admin_name = $admin->name;
                $admin_email = $admin->email;
                $admin_phone = $admin->phone;
                $roles = $admin->roles->pluck('name', 'id');
                $types = 'Admin';
                $data = ['admin_id' => $admin_id, 'admin_name' => $admin_name,
                    'types' => $types, 'email' => $admin_email, 'roles' => $roles, 'phone' => $admin_phone];
                return $data;
            } else {
                $admin = Auth::guard('admin')->user();
                $admin_id = $admin->id;
                $admin_name = $admin->name;
                $admin_email = $admin->email;
                $admin_phone = $admin->phone;
                $roles = $admin->roles->pluck('name', 'id');
                $types = 'Admin';
                $data = ['admin_id' => $admin_id, 'admin_name' => $admin_name,
                    'types' => $types, 'email' => $admin_email, 'roles' => $roles, 'phone' => $admin_phone];
                return $data;
            }
        } else {
            $admin = Auth::guard('admin')->user();
            $admin_id = $admin->id;
            $admin_name = $admin->name;
            $admin_email = $admin->email;
            $admin_phone = $admin->phone;
            $roles = $admin->roles->pluck('name', 'id');
            $types = 'Admin';
            $data = ['admin_id' => $admin_id, 'admin_name' => $admin_name,
                'types' => $types, 'email' => $admin_email, 'roles' => $roles, 'phone' => $admin_phone];
            return $data;
        }
    }
}
