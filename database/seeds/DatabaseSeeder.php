<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		//insert user account
		DB::table('users')->insert([
            'username' => 'admin',
            'password' => bcrypt('admin'),
            'isAdmin' => 1,
        ]);

		//insert year level
        DB::table('fm_year')->insert([
            'description' => '1st Year',
        ]);

        DB::table('fm_year')->insert([
         'description' => '2nd Year',
        ]);

        DB::table('fm_year')->insert([
         'description' => '3rd Year',
        ]);

        DB::table('fm_year')->insert([
         'description' => '4th Year',
        ]);

        //insert state
        DB::table('fm_state')->insert([
         'state' => 'California',
        ]);

        //insert state
        DB::table('fm_section')->insert([
         'year_id' => '1',
         'description' => 'Saint Francis',
        ]);
        
        DB::table('fm_section')->insert([
         'year_id' => '2',
         'description' => 'Saint Paul',
        ]);
        
        DB::table('fm_section')->insert([
         'year_id' => '3',
         'description' => 'Saint Therese',
        ]);
        
        DB::table('fm_section')->insert([
         'year_id' => '4',
         'description' => 'Saint John',
        ]);

        //insert city
        DB::table('fm_city')->insert([
         'city' => 'Chicago',
        ]);
	}
}
