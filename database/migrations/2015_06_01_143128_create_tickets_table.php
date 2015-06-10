<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('klantid');
            $table->integer('eventid');
            $table->float('prijs');
            $table->integer('reserved')->default(0);
            $table->string('ticket_number');
            $table->dateTime('date_reserved')->default('0000-00-00');
            $table->dateTime('date_passed')->default('0000-00-00');

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
        Schema::drop('tickets');
    }

}
