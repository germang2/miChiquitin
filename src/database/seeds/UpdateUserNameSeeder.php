<?php

use Illuminate\Database\Seeder;

class UpdateUserNameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->where('email', 'wdarce@utp.edu.co')->update(['name' => 'Wilson Arce']);
    }
}
