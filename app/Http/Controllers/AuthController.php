<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Account;
class AuthController extends Controller
{
    public function register(Request $request) {
        $account = Account::create([
            'email' => $request->email,
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);

        return response()->json(['message' => 'Tạo tài khoản thành công', 'account' => $account],200);
    }

    public function login(Request $request)
    {
              $credentials = $request->only('username', 'password');
          
            if($request->role == 'nv') {
                if (Auth::guard('account')->attempt($credentials)) {
                    $account = Auth::guard('account')->user();
                    return response()->json(['message' => 'Đăng nhập thành công', 'account' => $account], 200); 
                }
        
                return response()->json(['message' => 'Thông tin đăng nhập không hợp lệ'], 401); 
            }
            else if($request->role == 'qtv') {
                if (Auth::guard('admin')->attempt($credentials)) {
                    $admin = Auth::guard('admin')->user();
                    return response()->json(['message' => 'Đăng nhập thành công', 'admin' => $admin], 200); 
                }
                return response()->json(['message' => 'Thông tin đăng nhập không hợp lệ'], 401); 
            }
            return response()->json(['message' => 'Chưa chọn quyền đăng nhập'], 401); 
    }
}
