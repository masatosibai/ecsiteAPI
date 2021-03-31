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
            $table->integer("user_id")->unsigned();
            $table->foreign("user_id")->references("id")->on("users")->cascadeOnDelete();
            $table->integer("shop_id")->unsigned();
            $table->foreign("shop_id")->references("id")->on("shops")->cascadeOnDelete();
            $table->string('date');
            $table->string('time');
            $table->integer('user_num')->length(30);
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
        Schema::dropIfExists('reservations');
    }
}
