<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaintenancesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('maintenances', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer('maintenance_id');
            $table->string('name');
            $table->string('description');
            $table->time('duration');
            $table->integer('time_before');
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
		Schema::drop('maintenances');
	}

}
