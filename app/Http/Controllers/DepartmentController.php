<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Account;
use App\Models\Employee;
use App\Models\Department;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Validator;

class DepartmentController extends Controller
{
    public function getAllDepartment(Request $request) {
      $departments = Department::all();
        return response()->json([
            'results' => $departments
        ], 200);
    }   


}
