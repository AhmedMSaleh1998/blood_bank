<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration {

	public function up()
	{
		Schema::create('clients', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('name');
			$table->string('email');
			$table->date('d_o_b');
			$table->integer('blood_type_id')->unsigned();
			$table->date('last_donnation_date');
			$table->integer('city_id')->unsigned();
			$table->string('phone');
			$table->string('api_token', 60)->nullable();
			$table->string('password');
		});
	}

	public function down()
	{
		Schema::drop('clients');
	}
}
