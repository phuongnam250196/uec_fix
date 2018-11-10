<?php

use Illuminate\Database\Seeder;

class EducationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $data = [
    		[
    			'education_name'=>'Đại học',
    			'education_describe'=>'Học để đi làm',
    			'education_slug'=>str_slug('Đại học'),
    		],
    		[
    			'education_name'=>'Cao đẳng',
    			'education_describe'=>'Học để đi làm',
    			'education_slug'=>str_slug('Cao đẳng'),
    		],
    	];
        DB::table('uec_education')->insert($data);
    }
}
