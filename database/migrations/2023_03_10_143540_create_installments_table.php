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
        Schema::create('installments', function (Blueprint $table) {
            $table->id();
            $table->string('prefix');
            $table->string('transsaction_number');
            $table->date('date');
            $table->unsignedBigInteger('member');
            $table->unsignedBigInteger('loan')->nullable();
            $table->bigInteger('ammount');
            $table->timestamps();

            $table->foreign('member')->references('id')->on('members');
            $table->foreign('loan')->references('id')->on('loans');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('installments');
    }
};
