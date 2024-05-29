<?php

namespace App\Providers;

use Illuminate\Contracts\View\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        view()->share('homePage', 'Trang chủ');
        view()->share('dashboard', 'Bảng điều khiển');
        view()->share('categoryPage', 'Danh mục đồ uống');
        view()->share('addCategory', 'Thêm danh mục đồ uống');
        view()->share('editCategory', 'Cập nhật danh mục đồ uống');
        view()->share('nameCategory', 'Tên danh mục đồ uống');
        view()->share('enterNameCategory', 'Nhập tên danh mục đồ uống');
        view()->share('descriptionCategory', 'Mô tả danh mục đồ uống');
        view()->share('enterDescriptionCategory', 'Nhập mô tả danh mục đồ uống');
        view()->share('drinksPage', 'Đồ uống');
        view()->share('areaPage', 'Khu vực');
        view()->share('tablePage', 'Bàn');
        view()->share('dataTables', 'Bảng dữ liệu');
        view()->share('add', 'Thêm');
        view()->share('edit', 'Cập nhật');
        view()->share('STT', 'STT');
        view()->share('name', 'Tên');
        view()->share('description', 'Mô tả');
        view()->share('action', 'Hành động');
        view()->share('addData', 'Thêm dữ liệu');
        view()->share('editData', 'Cập nhật dữ liệu');
        view()->share('login', 'Đăng nhập');


        // Login
        view()->share('titleLogin', 'CAFE 96');
        view()->share('nameLogin', 'Tên đăng nhập');
        view()->share('enterNameLogin', 'Nhập tên đăng nhập');
        view()->share('enterPasswordLogin', 'Nhập mật khẩu đăng nhập');

        // Drink
        view()->share('drinkPage', 'Đồ uống');
        view()->share('drinkName', 'Tên đồ uống');
        view()->share('size', 'Kích thước');
        view()->share('price', 'Giá');
        view()->share('categoryName', 'Tên danh mục');
        view()->share('addDrink', 'Thêm đồ uống');
        view()->share('enterDrinkName', 'Nhập tên đồ uống');
        view()->share('sizeDrink', 'Kích thước');
        view()->share('enterSizeDrink', 'Nhập kích thước');
        view()->share('priceDrink', 'Giá');
        view()->share('enterPriceDrink', 'Nhập giá');
        view()->share('editDrink', 'Cập nhật đồ uống');

        // Staff
        view()->share('employeePage', 'Nhân viên');
        view()->share('employeeCode', 'Mã nhân viên');
        view()->share('enterEmployeeCode', 'Nhập mã nhân viên');
        view()->share('employeeName', 'Tên nhân viên');
        view()->share('enterEmployeeName', 'Nhập tên nhân viên');
        view()->share('email', 'Email');
        view()->share('enterEmail', 'Nhập email');
        view()->share('password', 'Mật khẩu');
        view()->share('enterPassword', 'Nhập mật khẩu');
        view()->share('addEmployee', 'Thêm nhân viên');
        view()->share('editEmployee', 'Cập nhật nhân viên');

        // Role
        view()->share('rolePage', 'vai trò');
        view()->share('roleName', 'Tên vai trò');
        view()->share('enterRoleName', 'Nhập tên vai trò');
        view()->share('roleDisplayName', 'Tên chi tiết vai trò');
        view()->share('enterRoleDisplayName', 'Nhập tên chi tiết vai trò');
        view()->share('addRole', 'Thêm vai trò');
        view()->share('editRole', 'Cập nhật vai trò');

        // permissionGroup
        view()->share('permissionGroupPage', 'Nhóm quyền');
        view()->share('addPermission', 'Thêm nhóm quyền');
        view()->share('editPermission', 'Cập nhật nhóm quyền');
        view()->share('namePermissionGroup', 'Tên nhóm quyền');
        view()->share('enterNamePermissionGroup', 'Nhập tên nhóm quyền');
        view()->share('descriptionPermissionGroup', 'Mô tả nhóm quyền');
        view()->share('enterDescriptionPermissionGroup', 'Nhập mô tả nhóm quyền');


        // permission
        view()->share('permissionPage', 'Quyền');
        view()->share('permissionName', 'Tên quyền');
        view()->share('enterPermissionName', 'Nhập tên quyền');
        view()->share('addPermission', 'Thêm quyền');
        view()->share('editPermission', 'Cập nhật quyền');
        view()->share('permissionDescription', 'Mô tả quyền');
        view()->share('enterPermissionDescription', 'Nhập mô tả quyền');
        view()->share('permissionKeyCode', 'Key code');
        view()->share('enterPermissionKeyCode', 'Nhập Key code');

        // area
        view()->share('areaPage', 'Khu vực');
        view()->share('addArea', 'Thêm khu vực');
        view()->share('editArea', 'Cập nhật khu vực');
        view()->share('nameArea', 'Tên khu vực');
        view()->share('enterNameArea', 'Nhập tên khu vực');
        view()->share('descriptionArea', 'Mô tả khu vực');
        view()->share('enterDescriptionArea', 'Nhập mô tả khu vực');

        // table
        view()->share('addTable', 'Thêm bàn');
        view()->share('editTable', 'Cập nhật bàn');
        view()->share('tableName', 'Tên bàn');
        view()->share('enterTableName', 'Nhập tên bàn');
        // view()->share('descriptionTable', 'Mô tả khu vực');
        // view()->share('enterDescriptionTable', 'Nhập mô tả khu vực');

        // bill
        view()->share('billPage', 'Hóa đơn');
    }
}
