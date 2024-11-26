<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Location; // Make sure to import the Location model

class LocationSeeder extends Seeder
{
    public function run()
    {
        Location::create(['LocationName' => 'Comlab1']);
        Location::create(['LocationName' => 'Comlab2']);
    }
}
