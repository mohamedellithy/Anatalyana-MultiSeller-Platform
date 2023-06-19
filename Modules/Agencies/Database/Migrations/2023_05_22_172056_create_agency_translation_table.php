<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgencyTranslationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agency_translation', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('agency_id')->required();
            $table->foreign('agency_id')->references('id')->on('agencies')->onDelete('cascade');
            $table->text('name')->required();
            $table->text('bio')->required();
            $table->text('services')->nullable();
            $table->text('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->integer('meta_image')->nullable();
            $table->foreign('meta_image')->references('id')->on('uploads')->onDelete('set null');
            $table->integer('campany_image')->nullable();
            $table->foreign('campany_image')->references('id')->on('uploads')->onDelete('set null');
            $table->integer('identity_file')->nullable();
            $table->foreign('identity_file')->references('id')->on('uploads')->onDelete('set null');
            $table->integer('products_file')->nullable();
            $table->foreign('products_file')->references('id')->on('uploads')->onDelete('set null');
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
        Schema::dropIfExists('agency_translation');
    }
}
