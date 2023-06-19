<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgencyTermsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agency_terms', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('agency_country_id')->required();
            $table->foreign('agency_country_id')->references('id')->on('agency_countries')->onDelete('cascade');
            $table->text('name')->required();
            $table->integer('is_must')->default(0);
            $table->string('type_field')->nullable();
            $table->integer('attachment_id')->nullable();
            $table->foreign('attachment_id')->references('id')->on('uploads')->onDelete('set null');
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
        Schema::dropIfExists('agency_terms');
    }
}
