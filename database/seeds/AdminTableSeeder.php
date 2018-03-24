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
        DB::table('admin')->insert([
        	'username' => 'Admin',
        	'email' => 'regasyahfika96@gmail.com',
        	'password' => bcrypt('rega123')
        ]);
    }
}
