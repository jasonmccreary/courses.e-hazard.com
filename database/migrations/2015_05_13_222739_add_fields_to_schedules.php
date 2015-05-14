<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsToSchedules extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('schedules', function(Blueprint $table)
		{
			$table->integer('schedule_status_id');
            $table->string('url');
            $table->boolean('has_sponsor');
            $table->string('sponsor_name')->nullable();
            $table->string('sponsor_url')->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('schedules', function(Blueprint $table)
		{
            $table->dropColumn('schedule_status_id');
            $table->dropColumn('url');
            $table->dropColumn('has_sponsor');
            $table->dropColumn('sponsor_name');
            $table->dropColumn('sponsor_url');
		});
	}

}
