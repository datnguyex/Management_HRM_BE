<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class EmployeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('employees')->insert([
        [
            'id' => 1,
            'email' => 'user1@gmail.com',
            'department_id' => '1',
            'fullName' => 'NguyenThanhDat',
            'DOB' => '2004/7/2',
            'phone' => '0329169799',
            'img' => 'havert.jpg',
            'address' => 'Hoang Huu Nam'
        ],
        ]);
    }
}
