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
                'id' => 1,
                'manager_id' => 1,
                'brand_id' =>  1,
                'departments_name' => 'Nhân sự'
            ],
            [
                'id' => 2,
                'manager_id' => 1,
                'brand_id' =>  1,
                'departments_name' => 'Kế Toán'
            ],
            [
                'id' => 3,
                'manager_id' => 1,
                'brand_id' =>  1,
                'departments_name' => 'IT'
            ],
        ]);
    }
}
