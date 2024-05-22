<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function login(LoginRequest $request) {
        $credentials = $request->only('employeeCode', 'password');

        if (Auth::attempt(['employee_code' => $credentials['employeeCode'], 'password' => $credentials['password']], $request->remember)) {
            $userId = Auth::user()->id;
            User::find($userId)->update(['last_login_at' => now()]);
            return redirect()->intended('/admin');
        }

        return redirect()->back()
            ->withInput($request->only('email', 'remember'))
            ->withErrors(['email' => 'Những thông tin xác thực này không khớp với hồ sơ của chúng tôi.']);
    }

    public function logout() {
        Auth::logout();
        return redirect('/login');
    }
}
