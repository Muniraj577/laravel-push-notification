<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class UserActivity extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'user_name', 'admin_id', 'admin_name'
        , 'role_id', 'role_name', 'type_id', 'type_name', 'action', 'message',
        'table_name', 'data_name', 'types', 'phone'];

    public static function data()
    {
        $data = Admin::datas();
        return $data;
    }

    public static function getTableName($model)
    {
        return $model->getTable();
    }

    public static function storeLog($request, $action = null, $message = null, $table_name = null,
                                    $data_name = null)
    {
        date_default_timezone_set('Asia/Kathmandu');
        $datas = self::data();
        $log = new UserActivity();
        $log->admin_id = $datas['admin_id'];
        $adminName = $log->admin_name = $datas['admin_name'];
        $log->phone = $datas['phone'];
        $log->email = $datas['email'];
        if ($datas['roles']->isEmpty()) {
            $roleId = null;
            $roleName = null;
        } else {
            $roleId = [];
            $roleName = [];
            foreach ($datas['roles'] as $key => $value) {
                $roleId[] = $key;
                $roleName[] = $value;
            }
            $roleId = implode(',', $roleId);
            $roleName = implode(',', $roleName);
        }
        $log->role_id = $roleId;
        $log->role_name = $roleName;
        $log->action = $action;
        $msg = $log->message = $adminName . ' ' . $message . ' at ' . date("F j, Y, g:i:s A");
        $log->table_name = $table_name;
        $log->data_name = $data_name;
        $log->types = $datas['types'];
        switch ($action) {
            case 'create':
                Log::channel('create')->info($msg);
                break;
            case 'update':
                Log::channel('update')->info($msg);
                break;
            case 'delete':
                Log::channel('delete')->warning($msg);
                break;
            case 'status':
                Log::channel('status')->info($msg);
                break;
            case 'login':
                Log::channel('status')->info($msg);
                break;
            case 'logout':
                Log::channel('status')->info($msg);
                break;
            default:
                response()->json(['success' => 'No log data']);
        }
        $log->save();
    }
}
