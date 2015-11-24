<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentInfo extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('student_record', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('stud_num',120);
            $table->string('fname',120);
            $table->string('lname',120);
            $table->string('address',120);
            $table->string('zip',120);
            $table->string('city',120);
            $table->string('state',120);
            $table->string('phone',120);
            $table->string('mobile',120);
            $table->string('email',120);
            $table->string('year_lvl',120);
            $table->string('section',120);
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('student_record');
	}

}
