<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDtbJobApply extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dtb_jobs_applies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email');
            $table->string('file');
            $table->text('recommend')->nullable();
            $table->timestamps();
        });

        Schema::table('dtb_jobs_applies', function ($table) {
            $table->integer('jobs_id')->unsigned();
            $table->foreign('jobs_id')->references('id')->on('dtb_jobs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dtb_jobs_applies');
    }
}
