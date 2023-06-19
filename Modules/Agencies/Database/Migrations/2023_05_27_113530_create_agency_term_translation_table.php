<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgencyTermTranslationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agency_term_translation', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('agency_term_id')->required();
            $table->foreign('agency_term_id')->references('id')->on('agency_terms')->onDelete('cascade');
            $table->text('name')->required();
            $table->integer('is_must')->default(0);
            $table->string('type_field')->nullable();
            $table->integer('attachment_id')->nullable();
            $table->foreign('attachment_id')->references('id')->on('uploads')->onDelete('set null');
            $table->string('lang')->required();
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
        Schema::dropIfExists('agency_term_translation');
    }
}
