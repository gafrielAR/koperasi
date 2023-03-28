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
        Schema::create('savings', function (Blueprint $table) {
            $table->id();
            $table->string('prefix');
            $table->string('transaction_number')->unique();
            $table->date('date');
            $table->unsignedBigInteger('member');
            $table->bigInteger('principal_saving');
            $table->bigInteger('mandatory_saving');
            $table->bigInteger('voluntary_saving');
            $table->timestamps();

            $table->foreign('member')->references('id')->on('members')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('savings');
    }
};
