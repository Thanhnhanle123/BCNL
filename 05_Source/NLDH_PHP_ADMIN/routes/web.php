<?php

use App\Http\Controllers\AreaController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DrinkController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\PermissionGroupController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Models\PermissionGroup;
use Illuminate\Support\Facades\Route;

Route::prefix('/login')->group(function () {
    Route::get('/', function () {
        return view('login');
    })->name('login.index');
    Route::post('/',    [UserController::class, 'login'])->name('user.login');
});
Route::get('/logout', [UserController::class, 'logout'])->name('user.logout');
// category
Route::prefix('admin')->middleware('auth', 'session.timeout')->group(function () {
    Route::get('/', function () {
        return view('home');
    })->name('home.index')->middleware("can:list_home");
    Route::prefix('category')->group(function () {
        Route::get('/',           [CategoryController::class, 'index'])->name('categories.index')->middleware("can:list_category");
        Route::get('/create',     [CategoryController::class, 'create'])->name('categories.create')->middleware("can:add_category");
        Route::post('/create',    [CategoryController::class, 'store'])->name('categories.store')->middleware("can:add_category");
        Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('categories.edit')->middleware("can:edit_category");
        Route::post('/update/{id}', [CategoryController::class, 'update'])->name('categories.update')->middleware("can:edit_category");
        Route::get('/destroy/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy')->middleware("can:delete_category");
    });


    // drink
    Route::prefix('drink')->group(function () {
        Route::get('/',             [DrinkController::class, 'index'])->name('drink.index')->middleware("can:list_drink");
        Route::get('/create',       [DrinkController::class, 'create'])->name('drink.create')->middleware("can:add_drink");
        Route::post('/create',      [DrinkController::class, 'store'])->name('drink.store')->middleware("can:add_drink");
        Route::get('/edit/{id}',    [DrinkController::class, 'edit'])->name('drink.edit')->middleware("can:edit_drink");
        Route::post('/update/{id}',      [DrinkController::class, 'update'])->name('drink.update')->middleware("can:edit_drink");
        Route::get('/destroy/{id}', [DrinkController::class, 'destroy'])->name('drink.destroy')->middleware("can:delete_drink");
    });

    // staff
    Route::prefix('employee')->group(function () {
        Route::get('/',             [EmployeeController::class, 'index'])->name('employee.index')->middleware("can:list_employee");
        Route::get('/create',       [EmployeeController::class, 'create'])->name('employee.create')->middleware("can:add_employee");
        Route::post('/create',      [EmployeeController::class, 'store'])->name('employee.store')->middleware("can:add_employee");
        Route::get('/edit/{id}',    [EmployeeController::class, 'edit'])->name('employee.edit')->middleware("can:edit_employee");
        Route::post('/update/{id}',      [EmployeeController::class, 'update'])->name('employee.update')->middleware("can:edit_employee");
        Route::get('/destroy/{id}', [EmployeeController::class, 'destroy'])->name('employee.destroy')->middleware("can:delete_employee");
    });

    // role
    Route::prefix('role')->group(function () {
        Route::get('/',             [RoleController::class, 'index'])->name('role.index')->middleware("can:list_role");
        Route::get('/create',       [RoleController::class, 'create'])->name('role.create')->middleware("can:add_role");
        Route::post('/create',      [RoleController::class, 'store'])->name('role.store')->middleware("can:add_role");
        Route::get('/edit/{id}',    [RoleController::class, 'edit'])->name('role.edit')->middleware("can:edit_role");
        Route::post('/update/{id}',      [RoleController::class, 'update'])->name('role.update')->middleware("can:edit_role");
        Route::get('/destroy/{id}', [RoleController::class, 'destroy'])->name('role.destroy')->middleware("can:delete_role");
    });

    // permission group
    Route::prefix('permission-group')->group(function () {
        Route::get('/',             [PermissionGroupController::class, 'index'])->name('permissionGroup.index')->middleware("can:list_permission_group");
        Route::get('/create',       [PermissionGroupController::class, 'create'])->name('permissionGroup.create')->middleware("can:add_permission_group");
        Route::post('/create',      [PermissionGroupController::class, 'store'])->name('permissionGroup.store')->middleware("can:add_permission_group");
        Route::get('/edit/{id}',    [PermissionGroupController::class, 'edit'])->name('permissionGroup.edit')->middleware("can:edit_permission_group");
        Route::post('/update/{id}',      [PermissionGroupController::class, 'update'])->name('permissionGroup.update')->middleware("can:edit_permission_group");
        Route::get('/destroy/{id}', [PermissionGroupController::class, 'destroy'])->name('permissionGroup.destroy')->middleware("can:delete_permission_group");
    });

    // permission
    Route::prefix('permission')->group(function () {
        Route::get('/',             [PermissionController::class, 'index'])->name('permission.index')->middleware("can:list_permission");
        Route::get('/create',       [PermissionController::class, 'create'])->name('permission.create')->middleware("can:add_permission");
        Route::post('/create',      [PermissionController::class, 'store'])->name('permission.store')->middleware("can:add_permission");
        Route::get('/edit/{id}',    [PermissionController::class, 'edit'])->name('permission.edit')->middleware("can:edit_permission");
        Route::post('/update/{id}',      [PermissionController::class, 'update'])->name('permission.update')->middleware("can:edit_permission");
        Route::get('/destroy/{id}', [PermissionController::class, 'destroy'])->name('permission.destroy')->middleware("can:delete_permission");
    });

    Route::prefix('area')->group(function () {
        Route::get('/',             [AreaController::class, 'index'])->name('area.index')->middleware("can:list_area");
        Route::get('/create',       [AreaController::class, 'create'])->name('area.create')->middleware("can:add_area");
        Route::post('/create',      [AreaController::class, 'store'])->name('area.store')->middleware("can:add_area");
        Route::get('/edit/{id}',    [AreaController::class, 'edit'])->name('area.edit')->middleware("can:edit_area");
        Route::post('/update/{id}',      [AreaController::class, 'update'])->name('area.update')->middleware("can:edit_area");
        Route::get('/destroy/{id}', [AreaController::class, 'destroy'])->name('area.destroy')->middleware("can:delete_area");
    });
});

Route::prefix('employee')->group(function () {
    Route::get('/',             [EmployeeController::class, 'index'])->name('employee.index')->middleware("can:list_employee");
    Route::get('/create',       [EmployeeController::class, 'create'])->name('employee.create')->middleware("can:add_employee");
    Route::post('/create',      [EmployeeController::class, 'store'])->name('employee.store')->middleware("can:add_employee");
    Route::get('/edit/{id}',    [EmployeeController::class, 'edit'])->name('employee.edit')->middleware("can:edit_employee");
    Route::post('/update/{id}',      [EmployeeController::class, 'update'])->name('employee.update')->middleware("can:edit_employee");
    Route::get('/destroy/{id}', [EmployeeController::class, 'destroy'])->name('employee.destroy')->middleware("can:delete_employee");
});
