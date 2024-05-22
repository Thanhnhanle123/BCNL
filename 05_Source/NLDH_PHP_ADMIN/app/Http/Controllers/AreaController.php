<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Http\Requests\StoreAreaRequest;
use App\Http\Requests\UpdateAreaRequest;
use Illuminate\Support\Facades\Log;

class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Hiển thị danh sách khu vực
        $areas = Area::all();
        return view('admin.areas.index', compact('areas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Hiển thị form để tạo mới khu vực
        return view("admin.areas.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAreaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAreaRequest $request)
    {
        // Lưu khu vực mới vào cơ sở dữ liệu
        $data = $request->validated();
        $area = new Area();
        $area->name = $data['nameArea'];
        $area->description = $data['descriptionArea'] == "" ? $data['nameArea'] : $data['descriptionArea'];
        $area->save();
        return redirect()->route('area.index')->with('success', 'Đã thêm khu vực mới thành công.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function show(Area $area)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $area = Area::find($id);
        return view("admin.areas.edit", compact("area"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAreaRequest  $request
     * @param  \App\Models\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAreaRequest $request, $id)
    {
        // Cập nhật thông tin khu vực
        $data = $request->validated();
        $area = Area::find($id);
        $area->name = $data['nameArea'];
        $area->description = $data['descriptionArea'] == "" ? $data['nameArea'] : $data['descriptionArea'];
        $area->update();
        return redirect()->route('area.index')->with('success', 'Cập nhật khu vực thành công.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Xóa khu vực khỏi cơ sở dữ liệu
        try {
            // Kiểm tra xem có tham chiếu đến khu vực này không
            // $references = // thực hiện kiểm tra tham chiếu tại đây, ví dụ: $area->drinks()->exists();

            // if ($references) {
            //     // Nếu có tham chiếu, trả về thông báo lỗi
            //     return response()->json([
            //         'code' => 400,
            //         'message' => 'Khu vực đang được sử dụng và không thể xóa.'
            //     ], 400);
            // }

            // Nếu không có tham chiếu, tiến hành xóa và trả về thông báo thành công
            Area::find($id)->delete();
            return response()->json([
                'code' => 200,
                'message' => 'Xóa khu vực thành công.'
            ], 200);
        } catch (\Exception $exception) {
            // Xử lý các ngoại lệ và trả về thông báo lỗi
            Log::error("Message: " . $exception->getMessage() . " --- Line : " . $exception->getLine());
            return response()->json([
                'code' => 500,
                'message' => 'Đã xảy ra lỗi. Vui lòng thử lại sau.'
            ], 500);
        }
    }
}
