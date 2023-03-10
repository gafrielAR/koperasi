<?php

use Brick\Math\BigInteger;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\MultipleInstanceManager;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loans', function (Blueprint $table) {
            $table->id();
            $table->string('prefix');
            $table->string('loan_number');
            $table->date('date');
            $table->unsignedBigInteger('member');
            $table->bigInteger('loan');
            $table->bigInteger('interest');
            $table->integer('term');
            $table->bigInteger('installment');
            $table->timestamps();

            $table->foreign('member')->references('id')->on('members');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('loans');
    }
};
