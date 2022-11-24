<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActualitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actualities', function (Blueprint $table) {
            $table->id();
            $table->json('title')->nullable();
            $table->string('image');
            $table->json('description')->nullable();
            $table->boolean('isActive')->default(false);//gere l'affichage dans la landing page
            $table->timestamp('start_date');
            $table->timestamp('end_date');
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
        Schema::dropIfExists('actualities');
    }
}
