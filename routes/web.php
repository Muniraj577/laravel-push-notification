<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Admin Auth Section
use App\Http\Controllers\Admin\Auth\ForgotPasswordController as AdminForgotPasswordController;
use App\Http\Controllers\Admin\Auth\ResetPasswordController as AdminResetPasswordController;

//End Admin Auth Section

use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\GeneralController as AdminGeneralController;
use App\Http\Controllers\Admin\LogController as AdminLogController;

//User Role Permission Section
use App\Http\Controllers\Admin\PermissionController as AdminPermissionController;
use App\Http\Controllers\Admin\RoleController as AdminRoleController;
use App\Http\Controllers\Admin\UserController as AdminUserController;

//End Role Permission Section

Route::get('/', function () {
    return view('welcome');
});


Route::group(['prefix' => 'admin', 'middleware' => 'admin_guest'], function () {
    Route::get('login', [\App\Http\Controllers\Admin\Auth\LoginController::class, 'showLoginForm'])->name('admin.showLogin');
    Route::post('login', [\App\Http\Controllers\Admin\Auth\LoginController::class, 'postLogin'])->name('admin.postLogin');
    Route::get('reset', [AdminForgotPasswordController::class, 'showLinkRequestForm'])->name('admin.getForgotPassword');
    Route::post('email', [AdminForgotPasswordController::class, 'sendResetLinkEmail'])->name('admin.sendResetLinkEmail');
    Route::get('reset/{token}', [AdminResetPasswordController::class, 'showResetForm'])->name('admin.getShowResetForm');
    Route::post('reset', [AdminResetPasswordController::class, 'reset'])->name('admin.reset');
});
Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {
    Route::get('logout', [\App\Http\Controllers\Admin\Auth\LoginController::class, 'getLogout'])->name('admin.logout');
    Route::get('dashboard', [AdminDashboardController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('logs', [AdminLogController::class, 'index'])->name('admin.log');
    //    Permission Section
    Route::group(['prefix' => 'permission'], function () {
        Route::get('/', [AdminPermissionController::class, 'index'])->name('permission.index');
        Route::get('/create', [AdminPermissionController::class, 'create'])->name('permission.create');
        Route::post('/store', [AdminPermissionController::class, 'store'])->name('permission.store');
        Route::get('/edit/{id}', [AdminPermissionController::class, 'edit'])->name('permission.edit');
        Route::put('/update/{id}', [AdminPermissionController::class, 'update'])->name('permission.update');
        Route::get('/delete/{id}', [AdminPermissionController::class, 'destroy'])->name('permission.destroy');
    });
//    End Permission Section

//    Role Section
    Route::group(['prefix' => 'role'], function () {
        Route::get('/', [AdminRoleController::class, 'index'])->name('role.index');
        Route::get('/create', [AdminRoleController::class, 'create'])->name('role.create');
        Route::post('/store', [AdminRoleController::class, 'store'])->name('role.store');
        Route::get('/edit/{id}', [AdminRoleController::class, 'edit'])->name('role.edit');
        Route::put('/update/{id}', [AdminRoleController::class, 'update'])->name('role.update');
        Route::get('/delete/{id}', [AdminRoleController::class, 'destroy'])->name('role.destroy');
    });
//     End Role Section
//    Admin User Section
    Route::group(['prefix' => 'user'], function () {
        Route::get('/', [AdminUserController::class, 'index'])->name('admin.index');
        Route::get('/create', [AdminUserController::class, 'create'])->name('admin.create');
        Route::post('/store', [AdminUserController::class, 'store'])->name('admin.store');
        Route::get('/edit/{id}', [AdminUserController::class, 'edit'])->name('admin.edit');
        Route::put('/update/{id}', [AdminUserController::class, 'update'])->name('admin.update');
        Route::get('/delete/{id}', [AdminUserController::class, 'destroy'])->name('admin.destroy');
//        Admin Profile Section
        Route::get('/profile', [AdminUserController::class, 'profile'])->name('admin.profile');
        Route::post('/change-admin-password', [AdminUserController::class, 'adminNewPassword'])->name('adminNewPassword');
        Route::post('/change-admin-email', [AdminUserController::class, 'changeAdminEmail'])->name('changeAdminEmail');
        Route::post('/change-admin-avatar', [AdminUserController::class, 'chageAdminAvatar'])->name('chageAdminAvatar');
    });
//    End Admin User Section

    //    Agent Section
    Route::group(['prefix' => 'agent', 'as' => 'agent.'], function () {
        Route::get('/', [\App\Http\Controllers\Admin\AgentController::class, 'index'])->name('index');
        Route::get('/create', [\App\Http\Controllers\Admin\AgentController::class, 'create'])->name('create');
        Route::post('/store', [\App\Http\Controllers\Admin\AgentController::class, 'store'])->name('store');
////        Route::get('/edit/{id}', [AdminNoticeController::class, 'edit'])->name('edit');
//        Route::post('/update/{id}', [AdminGeneralController::class, 'update'])->name('update');
//        Route::delete('/delete/{id}', [AdminGeneralController::class, 'destroy'])->name('delete');
    });

    //    General Section
    Route::group(['prefix' => 'general-information', 'as' => 'general.'], function () {
        Route::get('/', [AdminGeneralController::class, 'index'])->name('index');
//        Route::get('/create', [AdminNoticeController::class, 'create'])->name('create');
        Route::post('/store', [AdminGeneralController::class, 'store'])->name('store');
//        Route::get('/edit/{id}', [AdminNoticeController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [AdminGeneralController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [AdminGeneralController::class, 'destroy'])->name('delete');
    });
});
Route::get('/message', function () {
    event(new \App\Events\Notify());
    return "Event sent";
});
Route::get('notify', [\App\Http\Controllers\NotificiationController::class, 'notify']);
Route::view('/notification', 'notification');
Route::get('test', function () {
    event(new App\Events\StatusLiked('Someone'));
    return "Event has been sent!";
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/lesson/create',[\App\Http\Controllers\LessonController::class,'newLesson']);
Route::post('/notification/lesson/notification',[\App\Http\Controllers\LessonController::class,'notification']);
