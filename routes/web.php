<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CoursesController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RolePermissionController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Auth\AdminAuthenticatedSessionController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;



Route::controller(AdminAuthenticatedSessionController::class)->group(function () {
    Route::get('/admin/login', 'create')->name('admin.login');
    Route::post('/admin/login', 'store');
    Route::post('/admin/logout', 'destroy')->name('admin.logout');
});



Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth:web', 'verified'])->name('dashboard');


Route::middleware('auth:web')->group(function () {
    Route::controller(UsersController::class)->group(function () {
            Route::get('/admin/users', 'index')->name('users.index')->middleware('can:viewAnyUser');
            Route::get('/admin/users/create','create')->name('users.create')->middleware('can:createUser');
            Route::post('/admin/users/store','store')->name('users.store');
            Route::get('/admin/users/{user}','show')->name('users.show')->middleware('can:viewUser');
            Route::get('/admin/users/{user}/edit','edit')->name('users.edit')->middleware('can:updateUser');
            Route::patch('/admin/users/{user}/update','update')->name('users.update')->middleware('can:updateUser');
            Route::delete('/admin/users/{user}','destroy')->name('users.delete')->middleware('can:deleteUser');

        });

         // Courses Routes
    Route::controller(CoursesController::class)->group(function () {

        Route::get('admin/courses', 'index')->name('courses.index')->middleware('can:viewAnyCourse');
        Route::get('admin/courses/create',  'create')->name('courses.create')->middleware('can:createCourse');
        Route::post('admin/courses',  'store')->name('courses.store')->middleware('can:createCourse');
        Route::get('admin/courses/{course}',  'show')->name('courses.show')->middleware('can:viewCourse');
        Route::get('admin/courses/{course}/edit',  'edit')->name('courses.edit')->middleware('can:updateCourse');
        Route::patch('admin/courses/{course}/update',  'update')->name('courses.update')->middleware('can:updateCourse');
        Route::delete('admin/courses/{course}',  'destroy')->name('courses.destroy')->middleware('can:deleteCourse');
    });


    Route::controller(PermissionController::class)->group(function () {
        Route::get('admin/permissions','index')->name('permissions.index')->middleware('can:viewAnyRole');
        Route::get('admin/permissions/create',  'create')->name('permissions.create')->middleware('can:createRole');
        Route::post('admin/permissions','store')->name('permissions.store')->middleware('can:createRole');
        Route::get('admin/permissions/{permission}','show')->name('permissions.show')->middleware('can:viewRole');
        Route::get('admin/permissions/{permission}/edit','edit')->name('permissions.edit')->middleware('can:updateRole');
        Route::put('admin/permissions/{permission}/update','update')->name('permissions.update')->middleware('can:updateRole');
        Route::delete('admin/permissions/{permission}/delete','destroy')->name('permissions.destroy')->middleware('can:deleteRole');
    
    });


    Route::controller(RolePermissionController::class)->group(function () {
    Route::get('admin/roles',  'index')->name('roles.index')->middleware('can:viewAnyRole');
    Route::get('admin/roles/create',  'create')->name('roles.create')->middleware('can:createRole');
    Route::post('admin/roles',  'store')->name('roles.store')->middleware('can:createRole');
    Route::get('admin/roles/{role}',  'show')->name('roles.show')->middleware('can:viewRole');
    Route::get('admin/roles/{role}/edit',  'edit')->name('roles.edit')->middleware('can:updateRole');
    Route::put('admin/roles/{role}/update',  'update')->name('roles.update')->middleware('can:updateRole');
    Route::delete('admin/roles/{role}/delete', 'destroy')->name('roles.destroy')->middleware('can:deleteRole');
    });
});  
    Route::middleware(['role:super-admin'])->group(function () {
        Route::resource('admins', AdminController::class);
    });



require __DIR__.'/auth.php';
