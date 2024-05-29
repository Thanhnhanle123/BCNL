<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Http\Requests\StorePermissionRequest;
use App\Http\Requests\UpdatePermissionRequest;
use App\Models\PermissionGroup;
use Illuminate\Support\Facades\Log;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $permissions = Permission::all();
        return view('admin.permissions.index', compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $permissionGroups = PermissionGroup::all();
        $existingPermissions = Permission::pluck('key_code')->toArray();

        // Tạo mảng chứa các giá trị từ config
        $configPermissions = [];
        foreach (config('permission.table_module') as $table_module) {
            foreach (config('permission.model_children') as $model_children) {
                $configPermissions[] = "{$model_children}_{$table_module}";
            }
        }

        // Lọc các giá trị không có trong existingPermissions
        $filteredPermissions = array_filter($configPermissions, function ($value) use ($existingPermissions) {
            return !in_array($value, $existingPermissions);
        });
        return view("admin.permissions.create", compact("permissionGroups", "filteredPermissions"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePermissionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePermissionRequest $request)
    {
        //
        $data = $request->validated();
        $permission = new Permission();
        $permission->name = $data['permissionName'];
        $permission->display_name = $data['permissionDescription'] == "" ? $data['permissionName'] : $data['permissionDescription'];
        $permission->key_code = $data['permissionKeyCode'];
        $permission->permission_group_id = $data['permissionGroupId'];
        $permission->save();
        return redirect()->route('permission.index')->with('success', 'Đã thêm quyền thành công.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function show(Permission $permission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $permission =  Permission::find($id);
        $permissionGroups  = PermissionGroup::all();
        return view("admin.permissions.edit", compact("permission", "permissionGroups"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePermissionRequest  $request
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePermissionRequest $request, $id)
    {
        //
        $data = $request->validated();
        $permission = Permission::findOrFail($id);
        $permission->name = $data['permissionName'];
        $permission->display_name = $data['permissionDescription'] == "" ? $data['permissionName'] : $data['permissionDescription'];
        $permission->key_code = $data['permissionKeyCode'];
        $permission->permission_group_id = $data['permissionGroupId'];
        $permission->update();
        return redirect()->route('permission.index')->with('success', 'Cập nhật quyền mới thành công.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        try {
            Permission::find($id)->delete();
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
