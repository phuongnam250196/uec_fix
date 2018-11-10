<?php

use Illuminate\Database\Seeder;

class YearofexpTableSeeder extends Seeder
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
    			'yearofexp_name'=>'Hơn 2 năm',
    			'yearofexp_describe'=>'kinh nghiệm làm việc nhiều hơn 2 năm',
    			'yearofexp_slug'=>str_slug('Hơn 2 năm'),
    		],
    		[
    			'yearofexp_name'=>'Không kinh nghiệm',
    			'yearofexp_describe'=>'Không yêu cầu kinh nghiệm làm việc',
    			'yearofexp_slug'=>str_slug('Không kinh nghiệm'),
    		],
    	];
        DB::table('uec_yearofexp')->insert($data);
    }
}
