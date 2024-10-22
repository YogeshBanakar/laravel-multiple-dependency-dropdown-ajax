<?php

namespace Database\Seeders;

use App\Models\Region;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $region = File::get(path:'database/json/regions.json');
        $regions = collect(json_decode($region));
        $regions->each(function($regions){
            Region::create([
                'region_name' => $regions->region_name
            ]);
        });
    }
}
