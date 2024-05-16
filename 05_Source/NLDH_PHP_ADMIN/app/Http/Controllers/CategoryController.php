<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Drink;
use Illuminate\Support\Facades\Log;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("admin.categories.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {
        //
        $data = $request->validated();
        $category = new Category();
        $category->name = $data['name'];
        $category->description = $data['description'];
        $category->save();
        // $name = $request->name;
        // $description = $request->description;
        // $data = [
        //     'name' => $name,
        //     'description' => $description
        // ];
        // if (empty($id)) {
        //     if (Category::where('name', $name)->first() != null) {
        //         Category::where('name', $name)->update($data);
        //     } else {
        //         Category::FirstOrCreate($data);
        //     }
        // } else {
        //     Category::find($id)->update($data);
        // }
        return redirect()->route('categories.index')->with('success', 'Đã thêm danh mục đồ uống mới thành công.');;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category, $id)
    {
        //
        $category = Category::find($id);
        return view("admin.categories.edit", compact("category"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCategoryRequest  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        //
        $request->validate([
            'name' => 'required',
        ], [
            'name.required' => 'Tên danh mục bắt buộc nhập',
        ]);
        $id = $request->id;
        $name = $request->name;
        $description = $request->description;
        $data = [
            'name' => $name,
            'description' => $description
        ];
        Category::find($id)->update($data);
        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category, $id)
    {
        //
        try {
            $references = Drink::where('category_id', $id)->exists();

            if ($references) {
                return response()->json([
                    'code' => 400,
                    'message' => 'Khóa ngoại đang được sử dụng và không thể xóa.'
                ], 400);
            }
            Category::find($id)->delete();
            return response()->json([
                'code' => 200,
                'message' => 'success'
            ], 200);
        } catch (\Exception $exception) {
            Log::error("message" . $exception->getMessage() . " --- Line : " . $exception->getLine());
            return response()->json([
                'code' => 500,
                'message' => $exception->getMessage()
            ], 500);
        }
    }
}
