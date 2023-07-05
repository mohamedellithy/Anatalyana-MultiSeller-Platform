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
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->Integer('shop_id')->unsigned();
            $table->string('title')->required();
            $table->text('description')->nullable();
            $table->string('date')->required();
            $table->string('start_at')->required();
            $table->string('end_at')->required();
            $table->string('host_name')->nullable();
            $table->integer('status')->default(1);

            $table->foreign('shop_id')->references('id')->on('shops')->onDelete('cascade');
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
        Schema::dropIfExists('appointments');
    }
};
