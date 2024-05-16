<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDrinkRequest;
use App\Models\Category;
use App\Models\Drink;
use Illuminate\Http\Request;

class DrinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $drinks = Drink::all();
        return view('admin.drinks.index', compact('drinks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::all();
        return view("admin.drinks.create", compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDrinkRequest $request)
    {
        // Lấy tất cả dữ liệu từ form
        $data = $request->validated();
        // Tạo một đối tượng mới của model Drink và gán dữ liệu từ form
        $drink = new Drink();
        $drink->name = $data['name'];
        $drink->size = $data['size'];
        $drink->price = $data['price'];
        $drink->category_id = $data['category_id'];
        // Lưu đối tượng vào cơ sở dữ liệu
        $drink->save();

        // Chuyển hướng người dùng sau khi đã lưu thành công
        return redirect()->route('drink.index')->with('success', 'Đã thêm đồ uống mới thành công.');
    }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  \App\Models\Category  $category
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show(Category $category)
    // {
    //     //
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  \App\Models\Category  $category
    //  * @return \Illuminate\Http\Response
    //  */
    // public function edit(Category $category, $id)
    // {
    //     //
    //     $category = Category::find($id);
    //     return view("admin.categories.edit", compact("category"));
    // }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \App\Http\Requests\UpdateCategoryRequest  $request
    //  * @param  \App\Models\Category  $category
    //  * @return \Illuminate\Http\Response
    //  */
    // public function update(UpdateCategoryRequest $request, Category $category)
    // {
    //     //
    //     $request->validate([
    //         'name' => 'required',
    //     ], [
    //         'name.required' => 'Tên danh mục bắt buộc nhập',
    //     ]);
    //     $id = $request->id;
    //     $name = $request->name;
    //     $description = $request->description;
    //     $data = [
    //         'name' => $name,
    //         'description' => $description
    //     ];
    //     Category::find($id)->update($data);
    //     return redirect()->route('categories.index');

    // }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  \App\Models\Category  $category
    //  * @return \Illuminate\Http\Response
    //  */
    // public function destroy(Category $category, $id)
    // {
    //     //
    //     try{
    //         Category::find($id)->delete();
    //         return response()->json([
    //             'code' => 200,
    //             'message' => 'success'
    //         ],200);
    //     }catch(\Exception $exception){
    //         Log::error("message". $exception->getMessage(). " --- Line : ". $exception->getLine());
    //         return response()->json([
    //             'code' => 500,
    //             'message' => 'fail'
    //         ],500);
    //     }
    // }
}
