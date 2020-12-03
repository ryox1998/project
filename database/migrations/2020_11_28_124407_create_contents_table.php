<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()

    {
        Schema::create('contents', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('detail');
            $table->string('ampher');
            $table->string('type');
            $table->string('people');
            $table->string('day');
            $table->string('lat');
            $table->string('long');
            $table->string('image');
            $table->timestamps();
        });


        Schema::create('images', function (Blueprint $table) {
            $table->id('image_id');
            $table->string('image_name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contents');
    }
}
