<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class CiteisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $city = File::get(path:'database/json/cities.json');
        $cities = collect(json_decode($city));
        $cities->each(function($cities){
            City::create([
                'city_name' => $cities->city_name,
                'region_id' => $cities->region_id,
                'country_id' => $cities->country_id
            ]);
        });
    }
}
