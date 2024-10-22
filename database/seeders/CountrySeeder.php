<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $country = File::get(path:'database/json/countries.json');
        $countries = collect(json_decode($country));
        $countries->each(function($countries){
            Country::create([
                'country_name' => $countries->country_name,
                'region_id' => $countries->region_id 
            ]);
        });
    }
}
