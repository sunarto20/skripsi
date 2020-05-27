<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminAccount extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Administrator',
            'username' => 'admin',
            'password' => bcrypt('admin'),
            'role' => 'admin'
        ]);
    }
}
