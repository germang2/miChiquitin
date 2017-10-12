<?php

use Illuminate\Database\Seeder;

class Root extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table("users")->insert(
        		[
        			['name' => 'Root', 'email' => 'root@gmail.com', 'password' => '$2y$10$9oVfPuDMCmqmLi1OxNVVOuUdDlylq5Kj3lro8r4dB5g1EF.r4WeCO']
        		]
        	);
    }
}
