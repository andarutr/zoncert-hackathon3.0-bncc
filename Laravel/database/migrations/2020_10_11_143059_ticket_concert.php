<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TicketConcert extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ticket_concerts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('consert_id');
            $table->integer('cost_id');
            $table->string('status', 50);
            $table->string('receipt', 50);
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
        Schema::dropIfExists('ticket_concerts');
    }
}
