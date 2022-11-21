<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id('room_id');
            $table->string('name_fr');
            $table->string('name_en');
            $table->integer('number');
            $table->string('type_fr');
            $table->string('type_en');
            $table->integer('capacity');
            $table->float('price');
            $table->string('status_fr');
            $table->string('status_en');
            $table->string('image');
            $table->string('description_fr');
            $table->string('description_en');
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
        Schema::dropIfExists('rooms');
    }
}
