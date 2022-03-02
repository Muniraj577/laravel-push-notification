<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug'];

    public function admins()
    {
        return $this->belongsToMany('App\Models\Admin', 'admin_roles');
    }

    public function permissions()
    {
        return $this->belongsToMany('App\Models\Permission', 'role_permissions');
    }
}
