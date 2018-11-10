<?php

use Illuminate\Database\Seeder;

class AreaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $limit = 10;

        for ($i = 0; $i < $limit; $i++) {
            DB::table('uec_area')->insert([
                'area_name' => $faker->city,
                'area_describe' => $faker->address,
                'area_slug' => str_slug('area_name'),
            ]);
        }
    }
}
