<?php

namespace Database\Seeders;

use App\Models\Location;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Location::truncate();
        $location = [
            [
                "category_id"     => "1",
                "code"     => "AA101",
                "name"     => "Texas",
                "primary_email"     => "admin@gmail.com",
                "secondary_email"   => "gm319@redrobin.com",
                "state"            => "1",
                "city"             => "Anchorage",
                "ZMW"              => "75",
            ],
            [
                "category_id"     => "2",
                "code"     => "RR708",
                "name"     => "Indian Lake",
                "primary_email"     => "indianlake@redrobin.com",
                "secondary_email"   => "gmrr708@redrobin.com",
                "state"            => "1",
                "city"             => "Anchorage",
                "ZMW"              => "37201",
            ],
        ];

        DB::table('locations')->insert($location);

        // foreach ($location as $key => $locations) {
        //     Location::create($locations);
        // }
    }
}
