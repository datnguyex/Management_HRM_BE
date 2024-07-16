<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('departments')->insert([
            [
                'department_id' => 1,
                'managerID' => 1,
                'brandID' =>  1,
                'department_name' => 'Nhân sự'
            ],
            [
                'department_id' => 2,
                'managerID' => 2,
                'brandID' =>  1,
                'department_name' => 'Kế Toán'
            ],
            [
                'department_id' => 3,
                'managerID' => 3,
                'brandID' =>  1,
                'department_name' => 'IT'
            ],
        ]);
    }
}
