<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSampleRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sample_rooms', function (Blueprint $table) {
            $table->id();
            $table->json('name')->nullable();
            $table->boolean('isActive')->default(false);
            $table->json('type')->nullable();
            $table->integer('capacity');
            $table->float('price');
            $table->string('image');
            $table->json('description')->nullable();
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
        Schema::dropIfExists('sample_rooms');
    }
}
