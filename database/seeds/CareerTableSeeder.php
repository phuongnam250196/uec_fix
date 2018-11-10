<?php

use Illuminate\Database\Seeder;

class CareerTableSeeder extends Seeder
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
            DB::table('uec_career')->insert([
                'career_name' => $faker->title,
                'career_describe' => $faker->paragraph,
                'career_slug' => str_slug($faker->title)
            ]);
        }
    }
}
