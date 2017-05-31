<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCulturalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dtb_cultural', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('title');
            $table->text('description');
            $table->string('image_1', 100)->nullable();
            $table->string('image_2', 100)->nullable();
            $table->string('image_3', 100)->nullable();
            $table->string('image_4', 100)->nullable();
            $table->string('image_5', 100)->nullable();
            $table->string('image_6', 100)->nullable();
            $table->string('image_7', 100)->nullable();
            $table->integer('del_flg')->default(0);
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
        Schema::dropIfExists('dtb_cultural');
    }
}
