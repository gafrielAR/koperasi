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
            $table->string('prefix')->default('SV');
            $table->date('date');
            $table->unsignedBigInteger('member_id');
            $table->bigInteger('principal_saving');
            $table->bigInteger('mandatory_saving');
            $table->bigInteger('voluntary_saving');
            $table->timestamps();

            $table->foreign('member_id')->references('id')->on('members')->onDelete('CASCADE');
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
