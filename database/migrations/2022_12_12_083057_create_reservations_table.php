<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->dateTime('entryDate');
            $table->dateTime('exitDate');
            $table->unsignedInteger('user_id')->constrained();
            $table->boolean('isDue')->default(true);
            $table->timestamps();
            $table->unsignedInteger('room_id')->constrained();
            $table->json('service_id')->nullable();
            $table->dateTime('checked_in')->nullable();
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('room_id')
                ->references('id')
                ->on('rooms')
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
        Schema::dropIfExists('reservations');
    }
}
