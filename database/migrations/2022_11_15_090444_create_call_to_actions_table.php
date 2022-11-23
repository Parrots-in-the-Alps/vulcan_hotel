<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCallToActionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('call_to_actions', function (Blueprint $table) {
            $table->id();
            $table->json('title')->nullable();
            $table->json('modal_title')->nullable();
            $table->json('modal_content')->nullable();
            $table->timestamps();
            $table->unsignedInteger('hero_id')->nullable();
            $table->foreign('hero_id')
                    ->references('id')
                    ->on('heroes')
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
        Schema::dropIfExists('call_to_actions');
    }
}
