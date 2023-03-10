<?php

namespace Database\Seeders;

use App\Models\State;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        State::truncate();
        $usStates = [
            ["name" => "Alabama", "code" => "AL", "time_zone" => "America/Chicago"],
            ["name" => "Alaska", "code" => "AK", "time_zone" => "America/Anchorage"],
            ["name" => "Arizona", "code" => "AZ", "time_zone" => "America/Phoenix"],
            ["name" => "Arkansas", "code" => "AR", "time_zone" => "America/Chicago"],
            ["name" => "California", "code" => "CA", "time_zone" => "America/Los_Angeles"],
            ["name" => "Colorado", "code" => "CO", "time_zone" => "America/Denver"],
            ["name" => "Connecticut", "code" => "CT", "time_zone" => "America/New_York"],
            ["name" => "Delaware", "code" => "DE", "time_zone" => "America/New_York"],
            ["name" => "Florida", "code" => "FL", "time_zone" => "America/New_York"],
            ["name" => "Georgia", "code" => "GA", "time_zone" => "America/New_York"],
            ["name" => "Hawaii", "code" => "HI", "time_zone" => "Pacific/Honolulu"],
            ["name" => "Idaho", "code" => "ID", "time_zone" => "America/Boise"],
            ["name" => "Illinois", "code" => "IL", "time_zone" => "America/Chicago"],
            ["name" => "Indiana", "code" => "IN", "time_zone" => "America/Indiana/Indianapolis"],
            ["name" => "Iowa", "code" => "IA", "time_zone" => "America/Chicago"],
            ["name" => "Kansas", "code" => "KS", "time_zone" => "America/Chicago"],
            ["name" => "Kentucky", "code" => "KY", "time_zone" => "America/Kentucky/Louisville"],
            ["name" => "Louisiana", "code" => "LA", "time_zone" => "America/Chicago"],
            ["name" => "Maine", "code" => "ME", "time_zone" => "America/New_York"],
            ["name" => "Maryland", "code" => "MD", "time_zone" => "America/New_York"],
            ["name" => "Massachusetts", "code" => "MA", "time_zone" => "America/New_York"],
            ["name" => "Michigan", "code" => "MI", "time_zone" => "America/Detroit"],
            ["name" => "Minnesota", "code" => "MN", "time_zone" => "America/Chicago"],
            ["name" => "Mississippi", "code" => "MS", "time_zone" => "America/Chicago"],
            ["name" => "Missouri", "code" => "MO", "time_zone" => "America/Chicago"],
            ["name" => "Montana", "code" => "MT", "time_zone" => "America/Denver"],
            ["name" => "Nebraska", "code" => "NE", "time_zone" => "America/Chicago"],
            ["name" => "Nevada", "code" => "NV", "time_zone" => "America/Los_Angeles"],
            ["name" => "New Hampshire", "code" => "NH", "time_zone" => "America/New_York"],
            ["name" => "New Jersey", "code" => "NJ", "time_zone" => "America/New_York"],
            ["name" => "New Mexico", "code" => "NM", "time_zone" => "America/Denver"],
            ["name" => "New York", "code" => "NY", "time_zone" => "America/New_York"],
            ["name" => "North Carolina", "code" => "NC", "time_zone" => "America/New_York"],
            ["name" => "North Dakota", "code" => "ND", "time_zone" => "America/North_Dakota/Center"],
            ["name" => "Ohio", "code" => "OH", "time_zone" => "America/New_York"],
            ["name" => "Oklahoma", "code" => "OK", "time_zone" => "America/Chicago"],
            ["name" => "Oregon", "code" => "OR", "time_zone" => "America/Los_Angeles"],
            ["name" => "Pennsylvania", "code" => "PA", "time_zone" => "America/New_York"],
            ["name" => "Rhode Island", "code" => "RI", "time_zone" => "America/New_York"],
            ["name" => "South Carolina", "code" => "SC", "time_zone" => "America/New_York"],
            ["name" => "South Dakota", "code" => "SD", "time_zone" => "America/Chicago"],
            ["name" => "Tennessee", "code" => "TN", "time_zone" => "America/Chicago"],
            ["name" => "Texas", "code" => "TX", "time_zone" => "America/Chicago"],
            ["name" => "Utah", "code" => "UT", "time_zone" => "America/Denver"],
            ["name" => "Vermont", "code" => "VT", "time_zone" => "America/New_York"],
            ["name" => "Virginia", "code" => "VA", "time_zone" => "America/New_York"],
            ["name" => "Washington", "code" => "WA", "time_zone" => "America/Los_Angeles"],
            ["name" => "West Virginia", "code" => "WV", "time_zone" => "America/New_York"],
            ["name" => "Wisconsin", "code" => "WI", "time_zone" => "America/Chicago"],
            ["name" => "Wyoming", "code" => "WY", "time_zone" => "America/Denver"]
        ];

        DB::table('states')->insert($usStates);
    }
}
