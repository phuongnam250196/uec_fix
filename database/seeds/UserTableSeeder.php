<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        $data = [
                'user_name' => 'A123456',
                'password' => bcrypt(123456),
                'user_address' => '250 Kim Giang',
                'user_mail' => 'phuongnam250196@gmail.com',
                'user_phone' => '01654524503',
                'user_level' => 1,
        ];
        DB::table('uec_user')->insert($data);
    }
}
