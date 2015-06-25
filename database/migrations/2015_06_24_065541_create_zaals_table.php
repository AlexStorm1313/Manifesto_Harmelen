<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateZaalsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('zaals', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('zaal_naam');
            $table->integer('max_bezoekers');
            $table->date('laatste_schoonmaak');
            $table->date('laatste_mechanische');
            $table->date('laatste_visuele');
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
		Schema::drop('zaals');
	}

}
