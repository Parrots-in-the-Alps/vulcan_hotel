<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHeroesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('heroes', function (Blueprint $table) {
            $table->id('hero_id');
            $table->string('image');
            $table->string('slogan_fr');
            $table->string('slogan_en');
            $table->string('logo');
            $table->timestamps();
            $table->unsignedInteger('call_to_action_id')->nullable();
            $table->foreign('call_to_action_id')
                    ->references('id')
                    ->on('call_to_actions')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('heroes');
    }
}
