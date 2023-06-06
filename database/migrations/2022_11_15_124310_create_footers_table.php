<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFootersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->integer('street_num');
            $table->string('street_name');
            $table->string('zip');
            $table->string('city_name');
            $table->string('country');
            $table->timestamps();
            $table->boolean('isActive')->default(false);
        });
        Schema::create('footers', function (Blueprint $table) {
            $table->id();
            $table->boolean('isActive')->default(false);
            $table->integer('phone_number');
            $table->string('mail');
            $table->string('logo');
            $table->integer('address_id')->unsigned();
            $table->timestamps();
            $table->foreign('address_id')
                ->references('id')
                ->on('addresses')
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

        Schema::dropIfExists('footers');
        Schema::dropIfExists('addresses');
    }
}
