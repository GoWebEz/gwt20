<?php

namespace Database\Seeders;

use App\Models\Designation;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DesignationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Designation::truncate();
        $designations = [
            ["code" => "1", "name" => "Site Engineer","role_id" => "2"],
            ["code" => "2", "name" => "Site Manager" ,"role_id" => "2"],
            ["code" => "3", "name" => "Site Director" ,"role_id" => "2"],
            ["code" => "4", "name" => "Facility Manager","role_id" => "2"],
            ["code" => "5", "name" => "ROD","role_id" => "2"],
            ["code" => "6", "name" => "RVP","role_id" => "2"],
            ["code" => "7", "name" => "Administator","role_id" => "1"],
        ];

        DB::table('designations')->insert($designations);

     }
}
