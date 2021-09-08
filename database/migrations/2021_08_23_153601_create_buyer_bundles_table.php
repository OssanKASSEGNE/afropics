<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuyerBundlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buyer_bundles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('buyer_id')->references('id')->on('users');
            $table->foreignId('bundle_id')->references('id')->on('bundles');
            $table->foreignId('card_id')->references('id')->on('cards');
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
        Schema::dropIfExists('buyer_bundles');
    }
}
