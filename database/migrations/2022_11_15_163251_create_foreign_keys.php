<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;

class CreateForeignKeys extends Migration {

	public function up()
	{
		Schema::table('clients', function(Blueprint $table) {
			$table->foreign('blood_type_id')->references('id')->on('blood_types')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('clients', function(Blueprint $table) {
			$table->foreign('city_id')->references('id')->on('cities')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('cities', function(Blueprint $table) {
			$table->foreign('governorate_id')->references('id')->on('governorates')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('posts', function(Blueprint $table) {
			$table->foreign('category_id')->references('id')->on('categories')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('client_post', function(Blueprint $table) {
			$table->foreign('post_id')->references('id')->on('posts')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('client_post', function(Blueprint $table) {
			$table->foreign('client_id')->references('id')->on('clients')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('donnation_requests', function(Blueprint $table) {
			$table->foreign('blood_type_id')->references('id')->on('blood_types')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('donnation_requests', function(Blueprint $table) {
			$table->foreign('client_id')->references('id')->on('clients')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('notifications', function(Blueprint $table) {
			$table->foreign('donnation_request_id')->references('id')->on('donnation_requests')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('client_notification', function(Blueprint $table) {
			$table->foreign('notification_id')->references('id')->on('notifications')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('client_notification', function(Blueprint $table) {
			$table->foreign('client_id')->references('id')->on('clients')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('client_governorate', function(Blueprint $table) {
			$table->foreign('governorate_id')->references('id')->on('governorates')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('client_governorate', function(Blueprint $table) {
			$table->foreign('client_id')->references('id')->on('clients')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('blood_type_client', function(Blueprint $table) {
			$table->foreign('blood_type_id')->references('id')->on('blood_types')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('blood_type_client', function(Blueprint $table) {
			$table->foreign('client_id')->references('id')->on('clients')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('contacts', function(Blueprint $table) {
			$table->foreign('client_id')->references('id')->on('clients')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
	}

	public function down()
	{
		Schema::table('clients', function(Blueprint $table) {
			$table->dropForeign('clients_blood_type_id_foreign');
		});
		Schema::table('clients', function(Blueprint $table) {
			$table->dropForeign('clients_city_id_foreign');
		});
		Schema::table('cities', function(Blueprint $table) {
			$table->dropForeign('cities_governorate_id_foreign');
		});
		Schema::table('posts', function(Blueprint $table) {
			$table->dropForeign('posts_category_id_foreign');
		});
		Schema::table('client_post', function(Blueprint $table) {
			$table->dropForeign('client_post_post_id_foreign');
		});
		Schema::table('client_post', function(Blueprint $table) {
			$table->dropForeign('client_post_client_id_foreign');
		});
		Schema::table('donnation_requests', function(Blueprint $table) {
			$table->dropForeign('donnation_requests_blood_type_id_foreign');
		});
		Schema::table('donnation_requests', function(Blueprint $table) {
			$table->dropForeign('donnation_requests_client_id_foreign');
		});
		Schema::table('notifications', function(Blueprint $table) {
			$table->dropForeign('notifications_donnation_request_id_foreign');
		});
		Schema::table('client_notification', function(Blueprint $table) {
			$table->dropForeign('client_notification_notification_id_foreign');
		});
		Schema::table('client_notification', function(Blueprint $table) {
			$table->dropForeign('client_notification_client_id_foreign');
		});
		Schema::table('client_governorate', function(Blueprint $table) {
			$table->dropForeign('client_governorate_governorate_id_foreign');
		});
		Schema::table('client_governorate', function(Blueprint $table) {
			$table->dropForeign('client_governorate_client_id_foreign');
		});
		Schema::table('blood_type_client', function(Blueprint $table) {
			$table->dropForeign('blood_type_client_blood_type_id_foreign');
		});
		Schema::table('blood_type_client', function(Blueprint $table) {
			$table->dropForeign('blood_type_client_client_id_foreign');
		});
		Schema::table('contacts', function(Blueprint $table) {
			$table->dropForeign('contacts_client_id_foreign');
		});
	}
}
