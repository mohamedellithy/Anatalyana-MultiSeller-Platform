<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgencyJoinRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agency_join_requests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('agency_country_id')->required();
            $table->foreign('agency_country_id')->references('id')->on('agency_countries')->onDelete('cascade');
            $table->unsignedInteger('customer_id')->nullable();
            $table->foreign('customer_id')->references('id')->on('users')->onDelete('set null');
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('phone')->nullable();
            $table->string('postal_code')->nullable();
            $table->text('address')->nullable();
            $table->string('status')->default('pending')->comment('pending,accepted,refused');
            $table->string('payment_status')->defualt('unpaid')->comment('unpaid,paid');
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
        Schema::dropIfExists('agency_join_requests');
    }
}
