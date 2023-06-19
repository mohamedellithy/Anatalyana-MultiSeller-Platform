<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgencyJoinTermsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agency_join_terms', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('join_request_id')->required();
            $table->foreign('join_request_id')->references('id')->on('agency_join_requests')->onDelete('cascade');
            $table->unsignedBigInteger('agency_term_id')->nullable();
            $table->foreign('agency_term_id')->references('id')->on('agency_terms')->onDelete('set null');
            $table->text('term_name')->required();
            $table->text('term_value')->required();
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
        Schema::dropIfExists('agency_join_terms');
    }
}
