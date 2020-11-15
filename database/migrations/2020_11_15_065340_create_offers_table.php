<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->id();
            $table->date('required_date');
            $table->enum('type',['region','local']);
            $table->string('location');
            $table->string('destination');
            $table->string('measure');
            $table->string('mass');
            $table->string('description');
            $table->string('image')->nullable(true);
            $table->enum('status',['open','gained','closed'])->nullable(true);
            $table->unsignedBigInteger('success_bid_id')->nullable(true);
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('offers');
    }
}
