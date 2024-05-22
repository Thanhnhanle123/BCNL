<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $employees = User::all();
        return view('admin.employees.index', compact("employees"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $roles = Role::all();
        return view("admin.employees.create", compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRoleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        try {
            DB::beginTransaction();
            $latestEmployee = User::latest()->first();
            $nextId = $latestEmployee ? $latestEmployee->id + 1 : 1;
            $employeeCode = 'NV-' . $nextId;
            // Lấy tất cả dữ liệu từ form
            $data = $request->validated();
            // Tạo một đối tượng mới của model Drink và gán dữ liệu từ form
            $user = new User();
            $user->employee_code = $employeeCode;
            $user->display_name = $data['employeeName'];
            $user->password = Hash::make($data['password']);
            $user->email = $data['email'];
            // // Lưu đối tượng vào cơ sở dữ liệu
            $user->save();
            $user->roles()->attach($data['roleId']);
            // // Chuyển hướng người dùng sau khi đã lưu thành công
            DB::commit();
            return redirect()->route('employee.index')->with('success', 'Đã thêm nhân viên mới thành công.');
        } catch (\Exception $ex) {
            DB::rollBack();
            Log::error("message". $ex->getMessage(). " --- Line : ". $ex->getLine());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $employee = User::find($id);
        $roles = Role::all();
        $rolesEmployee = $employee->roles;
        return view("admin.employees.edit", compact("employee", "roles", "rolesEmployee"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUserRequest  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, $id)
    {
        //

        try {
            DB::beginTransaction();
            $user = User::findOrFail($id);
            $data = $request->validated();
            if($data['password'] == "") {
                $data['password'] = $user->password;
            }else{
                $data['password'] = Hash::make($data['password']);
            }
            $user->update($data);
            $user->roles()->sync($data['roleId']);
            // // Chuyển hướng người dùng sau khi đã lưu thành công
            DB::commit();
            return redirect()->route('employee.index')->with('success', 'Đã cập nhật thành công.');
        } catch (\Exception $ex) {
            DB::rollBack();
            Log::error("message". $ex->getMessage(). " --- Line : ". $ex->getLine());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        //
        try{
            User::find($id)->delete();
            return response()->json([
                'code' => 200,
                'message' => 'success'
            ],200);
        }catch(\Exception $exception){
            Log::error("message". $exception->getMessage(). " --- Line : ". $exception->getLine());
            return response()->json([
                'code' => 500,
                'message' => $exception->getMessage()
            ],500);
        }
    }
}
