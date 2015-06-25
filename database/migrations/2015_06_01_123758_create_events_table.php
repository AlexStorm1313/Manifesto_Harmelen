<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->string('artiest');
            $table->string('naam');
            $table->dateTime('begintijd');
            $table->dateTime('eindtijd');
            $table->date('datum')->default('2015-06-26');
            $table->string('zaal');
            $table->integer('zaalid');
            $table->boolean('hidden')->default(false);
            $table->boolean('speciaalevenement')->default(false);
            $table->integer('aantalkaarten');

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
        Schema::drop('events');
    }

}
