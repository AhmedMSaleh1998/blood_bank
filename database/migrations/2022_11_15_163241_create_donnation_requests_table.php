<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonnationRequestsTable extends Migration {

	public function up()
	{
		Schema::create('donnation_requests', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('patient_name');
			$table->string('patient_phone');
			$table->string('hospital_name');
			$table->integer('blood_type_id')->unsigned();
			$table->string('bags_num');
			$table->text('details');
			$table->decimal('longitude', 10,8);
			$table->decimal('lattitude', 10,8);
			$table->integer('client_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('donnation_requests');
	}
}
