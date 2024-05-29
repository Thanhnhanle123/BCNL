<?php

namespace App\Http\Controllers;

use App\Models\Table;
use App\Http\Requests\StoreTableRequest;
use App\Http\Requests\UpdateTableRequest;
use App\Models\Area;
use Illuminate\Support\Facades\Log;

class TableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tables = Table::all();
        return view('admin.tables.index', compact('tables'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $areas = Area::all();
        return view("admin.tables.create", compact('areas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTableRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTableRequest $request)
    {
        // Lấy tất cả dữ liệu từ form
        $data = $request->validated();
        // Tạo một đối tượng mới của model Drink và gán dữ liệu từ form
        $table = new Table();
        $table->name = $data['name'];
        $table->area_id = $data['area_id'];
        // Lưu đối tượng vào cơ sở dữ liệu
        $table->save();
        // Chuyển hướng người dùng sau khi đã lưu thành công
        return redirect()->route('table.index')->with('success', 'Đã thêm bàn thành công.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Table  $table
     * @return \Illuminate\Http\Response
     */
    public function show(Table $table)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Table  $table
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $areas = Area::all();
        $table = Table::find($id);
        return view('admin.tables.edit', compact('areas', 'table'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTableRequest  $request
     * @param  \App\Models\Table  $table
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTableRequest $request, $id)
    {
        $data = $request->validated();
        $table = Table::findOrFail($id);
        $table->update($data);
        return redirect()->route('table.index')->with('success', 'Cập nhật bàn mới thành công.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Table  $table
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        try {
            Table::find($id)->delete();
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
