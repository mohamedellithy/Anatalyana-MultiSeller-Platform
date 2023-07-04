<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointment_languages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('appointment_id')->required();
            $table->foreign('appointment_id')->references('id')->on('appointments')->onDelete('cascade');
            $table->string('language')->required();
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
        Schema::dropIfExists('appointment_languages');
    }
};
