<?php

namespace App\Http\Controllers;

use App\Models\PermissionGroup;
use App\Http\Requests\StorePermissionGroupRequest;
use App\Http\Requests\UpdatePermissionGroupRequest;
use App\Models\Permission;
use Illuminate\Support\Facades\Log;

class PermissionGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $permissionGroups = PermissionGroup::all();
        return view('admin.permissionGroups.index', compact('permissionGroups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("admin.permissionGroups.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePermissionGroupRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePermissionGroupRequest $request)
    {
        //
        $data = $request->validated();
        $permissionGroup = new PermissionGroup();
        $permissionGroup->name = $data['name'];
        $permissionGroup->description = $data['description'] == "" ? $data['name'] : $data['description'];
        $permissionGroup->save();
        return redirect()->route('permissionGroup.index')->with('success', 'Đã thêm nhóm quyền thành công.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PermissionGroup  $permissionGroup
     * @return \Illuminate\Http\Response
     */
    public function show(PermissionGroup $permissionGroup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PermissionGroup  $permissionGroup
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $permissionGroup = PermissionGroup::find($id);
        return view("admin.permissionGroups.edit", compact("permissionGroup"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePermissionGroupRequest  $request
     * @param  \App\Models\PermissionGroup  $permissionGroup
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePermissionGroupRequest $request, $id)
    {
        //
        $permissionGroup = PermissionGroup::findOrFail($id);
        $permissionGroup->update($request->validated());
        return redirect()->route('permissionGroup.index')->with('success', 'Cập nhật nhóm quyền mới thành công.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PermissionGroup  $permissionGroup
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        try {
            $permission = Permission::where('permissions_group_id', $id)->exists();

            if ($permission) {
                return response()->json([
                    'code' => 400,
                    'message' => 'Khóa ngoại đang được sử dụng và không thể xóa.'
                ], 400);
            }
            PermissionGroup::find($id)->delete();
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
