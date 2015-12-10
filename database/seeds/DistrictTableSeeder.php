<?php

use Illuminate\Database\Seeder;
use App\district;

class DistrictTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //clear table
        DB::table('districts')->delete();
        //add 1st row
        district::create(
            [
                'district_name' => 'Ampara',
            ]
        );
        district::create(
            [
                'district_name' => 'Anuradhapura',
            ]
        );
        district::create(
            [
                'district_name' => 'Badulla',
            ]
        );
        district::create(
            [
                'district_name' => 'Batticaloa',
            ]
        );
        district::create(
            [
                'district_name' => 'Colombo',
            ]
        );
        district::create(
            [
                'district_name' => 'Galle',
            ]
        );
        district::create(
            [
                'district_name' => 'Gampaha',
            ]
        );
        district::create(
            [
                'district_name' => 'Hambantota',
            ]
        );
        district::create(
            [
                'district_name' => 'Jaffna',
            ]
        );
        district::create(
            [
                'district_name' => 'Kalutara',
            ]
        );
        district::create(
            [
                'district_name' => 'Kandy',
            ]
        );
        district::create(
            [
                'district_name' => 'Kegalle',
            ]
        );
        district::create(
            [
                'district_name' => 'Kurunegala',
            ]
        );
        district::create(
            [
                'district_name' => 'Mannar',
            ]
        );
        district::create(
            [
                'district_name' => 'Matara',
            ]
        );
        district::create(
            [
                'district_name' => 'Moneragala',
            ]
        );
        district::create(
            [
                'district_name' => 'Mullaitivu',
            ]
        );
        district::create(
            [
                'district_name' => 'Nuwara Eliya',
            ]
        );
        district::create(
            [
                'district_name' => 'Polonnaruwa',
            ]
        );
        district::create(
            [
                'district_name' => 'Puttalam',
            ]
        );
        district::create(
            [
                'district_name' => 'Ratnapura',
            ]
        );
        district::create(
            [
                'district_name' => 'Trincomalee',
            ]
        );
        district::create(
            [
                'district_name' => 'Vavuniya',
            ]
        );

    }
}
