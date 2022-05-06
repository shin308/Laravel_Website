<?php

use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data=[
        	[	
        		'name' => 'Võ Quốc Nhật',
        		'email' => 'thanhchau2279@gmail.com',
        		'password' => bcrypt('123456'),
        		'level' => '1'
        	],
        	[	
        		'name' => 'Quốc Nhật Võ',
        		'email' => 'vqnhat.18it3@sict.udn.vn',
        		'password' => bcrypt('123'),
        		'level' => '1'
        	]
        ];
        DB::table('admin')->insert($data);
    }
}
