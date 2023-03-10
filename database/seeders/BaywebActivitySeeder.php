<?php

namespace Database\Seeders;

use App\Models\BaywebActivity;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BaywebActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BaywebActivity::truncate();
        $activities = [
            ["activity_code" => "0", "current_activity" => "Occupied"],
            ["activity_code" => "1", "current_activity" => "Unoccupied" ],
            ["activity_code" => "2", "current_activity" => "Occupied Refresh"],
            ["activity_code" => "3", "current_activity" => "Pre-Cool/Heat"],

        ];

         DB::table('bayweb_activities')->insert($activities);

    }
}
