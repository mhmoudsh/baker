<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('sub_number');
            $table->text('sub_address');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('counter_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            $table->foreign('counter_id')->references('id')->on('counters')->onDelete('cascade');
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
        Schema::dropIfExists('subscriptions');
    }
};
