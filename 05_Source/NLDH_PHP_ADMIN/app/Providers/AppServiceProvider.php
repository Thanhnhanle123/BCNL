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
        view()->share('editCategory', 'Sửa danh mục đồ uống');
        view()->share('nameCategory', 'Tên danh mục đồ uống');
        view()->share('enterNameCategory', 'Nhập tên danh mục đồ uống');
        view()->share('descriptionCategory', 'Mô tả danh mục đồ uống');
        view()->share('enterDescriptionCategory', 'Nhập mô tả danh mục đồ uống');
        view()->share('drinksPage', 'Đồ uống');
        view()->share('areaPage', 'Khu vực');
        view()->share('diskPage', 'Bàn');
        view()->share('dataTables', 'Bảng dữ liệu');
        view()->share('add', 'Thêm');
        view()->share('edit', 'Sửa');
        view()->share('STT', 'STT');
        view()->share('name', 'Tên');
        view()->share('description', 'Mô tả');
        view()->share('action', 'Hành động');
        view()->share('addData', 'Thêm dữ liệu');
        view()->share('editData', 'Sửa dữ liệu');

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

    }
}
