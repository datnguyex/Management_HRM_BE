<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeeSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('employees')->insert([
            [
                'id' => 1,
                'fullname' => "Nguyễn Hiệp",
                'nickname' => "Nguyễn",
                'img' => "user.jpg",
                'address' => "Bình Thành",
                'phone' => "0834983286",
                'dob' => "2017-06-15",
                'email' => "minhhiep325@gmail.com",
                'start_date' => "2017-06-15",
                'finish_date' => "2017-06-15",
                'type' => "intern",
                'position' => "employee",
                'state_work' => "new",
            ],
            [
                'id' => 2,
                'fullname' => "Nguyễn Minnh",
                'nickname' => "Minnh",
                'img' => "user.jpg",
                'address' => "Bình Thành",
                'phone' => "0834983286",
                'dob' => "2017-06-15",
                'email' => "minhminh325@gmail.com",
                'start_date' => "2017-06-15",
                'finish_date' => "2017-06-15",
                'type' => "intern",
                'position' => "employee",
                'state_work' => "new",
            ]
        ]);
    }
}
