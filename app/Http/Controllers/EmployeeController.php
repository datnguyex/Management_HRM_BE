<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    /** get values employee*/
    public function index()
    {
        $employees = Employee::all();

        return response()->json([
            'employees' => $employees
        ], 200);
    }

    /**Create employee */
    public function store(Request $request)
    {
        try {
            //create employee
            $employee = Employee::create([
                'fullname' => $request->fullname,
                'nickname' => $request->nickname,
                'img' => $request->img,
                'address' => $request->address,
                'phone' => $request->phone,
                'dob' => $request->dob,
                'sex' => $request->sex,
                'marital_status' => $request->marital_status,
                'email' => $request->email,
                'start_date' => $request->start_date,
                'finish_date' => $request->finish_date,
                'type' => $request->type,
                'position' => $request->position,
                'state_work' => $request->state_work,
            ]);

            return response()->json([
                'message' => "Employee successfully created",
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => "something really wrong",
            ], 500);
        }
    }

    /**Show employee */
    public function update(Request $request, $id)
    {
        try {
            //Find employee update
            $employee = Employee::find($id);

            //check employee
            if (!$employee) {
                return response()->json([
                    'message' => "Not found user",
                ], 404);
            }

            //update user
            $employee->fullname = $request->fullname | $employee->fullname;
            $employee->nickname = $request->nickname | $employee->nickname;
            $employee->img = $request->img | $employee->img;
            $employee->address = $request->address | $employee->address;
            $employee->phone = $request->phone | $employee->phone;
            $employee->sex = $request->sex | $employee->sex;
            $employee->marital_status = $request->marital_status | $employee->marital_status;
            $employee->dob = $request->dob | $employee->dob;
            $employee->email = $request->email | $employee->email;
            $employee->start_date = $request->start_date | $employee->start_date;
            $employee->finish_date = $request->finish_date | $employee->finish_date;
            $employee->type = $request->type | $employee->type;
            $employee->position = $request->position | $employee->position;
            $employee->state_work = $request->state_work | $employee->state_work;

            //save user
            $employee->save();

            //message
            return response()->json([
                "message" => "Update successfully ",
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => "Something went really wrong",
            ], 500);
        }
    }

    //destroy users
    public function destroy($id)
    {
        try {
            $employee = Employee::find($id);

            //check employee
            if (!$employee) {
                return response()->json([
                    "message" => "User not found",
                ], 404);
            }
            $employee->delete();
            return response()->json([
                "message" => "Destroy successfully",
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                "message" => "Something Wrong"
            ], 500);
        }
    }

    public function show($id)
    {
        $employee = Employee::find($id);
        if (!$employee) {
            return response()->json([
                "message" => "User not found",
            ], 404);
        }
        return response()->json([
            "employee" => $employee,
        ], 200);
    }
}