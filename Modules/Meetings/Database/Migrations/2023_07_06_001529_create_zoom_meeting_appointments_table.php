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
        Schema::create('zoom_meeting_appointments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('booked_id');
            $table->foreign('booked_id')->references('id')->on('booking_appointments')->onDelete('set null');
            $table->text('start_url')->nullable();
            $table->text('join_url')->nullable();
            $table->string('password')->nullable();
            $table->bigInteger('meeting_id')->nullable();
            $table->string('host_id')->nullable();
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
        Schema::dropIfExists('zoom_meeting_appointments');
    }
};
