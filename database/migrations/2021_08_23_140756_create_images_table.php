<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('artiste_id')->references('id')->on('users');
            $table->string('image_name');
            $table->string('image_path_full');
            $table->string('image_path_snippet');
            $table->enum('image_status',['published','analyzing']);
            $table->double('image_price',5,2);
            $table->text('image_description');
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
        Schema::dropIfExists('images');
    }
}
