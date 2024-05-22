<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Models\Permission;
use App\Models\PermissionGroup;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $roles = Role::all();
        return view('admin.roles.index', compact("roles"));
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
        return view('admin.roles.create', compact('permissionGroups'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRoleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRoleRequest $request)
    {
        //
        try {
            DB::beginTransaction();
            // Lấy tất cả dữ liệu từ form
            $data = $request->validated();
            // Tạo một đối tượng mới của model Drink và gán dữ liệu từ form
            $role = new Role();
            $role->name = $data['roleName'];
            $role->display_name = $data['roleDisplayName'];
            // // Lưu đối tượng vào cơ sở dữ liệu
            $role->save();
            $role->permissions()->attach($data['permission_id']);
            // // Chuyển hướng người dùng sau khi đã lưu thành công
            DB::commit();
            return redirect()->route('role.index')->with('success', 'Đã thêm vai trò thành công.');
        } catch (\Exception $ex) {
            DB::rollBack();
            Log::error("message". $ex->getMessage(). " --- Line : ". $ex->getLine());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $role = Role::find($id);
        $permissionGroups = PermissionGroup::all();
        $permissionsOfRole = $role->permissions;
        return view("admin.roles.edit", compact("role", "permissionGroups", "permissionsOfRole"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRoleRequest  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRoleRequest $request, $id)
    {
        try {
            DB::beginTransaction();
            $data = $request->validated();
            $role = Role::findOrFail($id);
            $role->name = $data['roleName'];
            $role->display_name = $data['roleDisplayName'];
            $role->update();
            $role->permissions()->sync($data['permission_id']);
            // // Chuyển hướng người dùng sau khi đã lưu thành công
            DB::commit();
            return redirect()->route('role.index')->with('success', 'Đã cập nhật thành công.');
        } catch (\Exception $ex) {
            DB::rollBack();
            Log::error("message". $ex->getMessage(). " --- Line : ". $ex->getLine());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        //
    }
}
