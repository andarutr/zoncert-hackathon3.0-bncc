<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DiscussionRoom extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discussion_rooms', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('consert_id');
            $table->text('text');
            $table->string('image', 50);
            $table->text('reply');
            $table->integer('like');
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
        Schema::dropIfExists('discussion_rooms');
    }
}
