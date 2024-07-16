<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Account;
use App\Models\Employee;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function register(Request $request)
    {

        $inputAccount = $request->only('email', 'username', 'password', 'role');
        $inputEmployee = $request->only('department_id', 'fullName', 'phone', 'img', 'email');
        $dob = $request->year . '/' . $request->month . '/' . $request->day;
        $address = $request->district . '/' . $request->city . '/' . $request->country;

        // $inputPhone = $request->only('phone');

        $validator = Validator::make($request->all(), [
            'fullName' => 'required',
            'email' => 'required', //
            'username' => 'required',
            'district' => 'required',
            'city' => 'required',
            'country' => 'required',
            'day' => 'required||max:31||min:1||numeric',
            'month' => 'required||max:12||min:1||numeric',
            'year' => 'required||digits:4||numeric',
            'password' => 'required',
            'role' => 'required',
            'department_id' => 'required',
        ]);


        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // else if (preg_match('/^[0-9]+$/', $request->phone)) {
        //     return response()->json(['errors' => 'Số điện thoại không được chứa ký tự nào khác ngoài số'], 411);
        // }

        // if (strlen($request->input('phone')) == 0) {
        //     return response()->json(['errors' => 'Số điện thoại không được rỗng'], 411);
        // }


        else if (Employee::where('phone', $request->phone)->exists()) {
            return response()->json(['errors' => "Số điện thoại này đã tồn tại trong hệ thống"], 422);
        } else if (Account::where('username', $request->username)->exists()) {
            return response()->json(['errors' => "Tên tài khoản này đã tồn tại trong hệ thống"], 422);
        } else if (Employee::where('email', $request->email)->exists()) {
            return response()->json(['errors' => "Email này đã tồn tại trong hệ thống"], 422);
        } else {
            $account = Account::create([
                'email' => $inputAccount['email'],
                'username' => $inputAccount['username'],
                'password' => Hash::make($inputAccount['password']),
                'role' => $inputAccount['role'],
            ]);

            $employee = Employee::create([
                'email' => $inputEmployee['email'],
                'department_id' => $inputEmployee['department_id'],
                'fullName' => $inputEmployee['fullName'],
                'DOB' => $dob,
                'img' => $inputEmployee['img'],
                'phone' => $inputEmployee['phone'],
                'address' => $address,
            ]);
            return response()->json(['message' => 'Thêm nhân viên và tạo tài khoản thành công', 'account' => $account, 'employee' => $employee], 200);
        }
    }
    public function login(Request $request)
    {

        $credentialsAd = $request->only('username', 'password');
        $credentialsNVQL = $request->only('username', 'password', 'role');




        $validator = Validator::make($request->all(), [
            'username' => 'required|max:255',
            'password' => 'required|min:2',
            'role' => 'required',
        ]);




        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }


        if ($request->role == 'nv' || $request->role == 'ql') {

            if (Auth::guard('account')->attempt($credentialsNVQL)) {
                $account = Auth::guard('account')->user();
                $userID = $account->id;

                $token = $account->createToken('token')->plainTextToken;
                $cookie = cookie('jwt' . $userID, $token, 10);
                return response()->json([
                    'message' => 'Đăng nhập thành công',
                    'account' => $account,
                    'token' => $token
                ], 200)->withCookie($cookie);
            } else {
                return response()->json(['errors' => 'Thông tin đăng nhập không hợp lệ'], 401);
            }
        } else if ($request->role == 'qtv') {
            if (Auth::guard('admin')->attempt($credentialsAd)) {
                $admin = Auth::guard('admin')->user();
                $token = $admin->createToken('token')->plainTextToken;
                $cookie = cookie('jwt', $token, 10);
                return response()->json([
                    'message' => 'Đăng nhập thành công',
                    'admin' => $admin,
                    'token' => $token
                ], 200)
                    ->withCookie($cookie);
            }
            return response()->json(['errors' => 'Thông tin đăng nhập không hợp lệ'], 401);
        }

        return response()->json(['errors' => 'Đã xảy ra lỗi'], 401);
    }
    function getToken(Request $request)
    {
        $value = $request->cookie('jwt');
        return response()->json(['message' => $value], 200);
    }

    function getValues(Request $request)
    {
        $data = Auth::user();
        return response()->json(['message' => 'dang nhap thanh cong', "value" => $data], 200);
    }
    public function logout(Request $request)
    {
        $cookie = Cookie::forget('jwt');
        $cookie = Cookie::forget('jwt1');
        // $cookie = Cookie::forget('jwt2');
        return response()->json(['message' => 'Đăng xuất thành công'])->withCookie($cookie);
    }
}