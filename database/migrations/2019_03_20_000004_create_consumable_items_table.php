<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConsumableItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consumable_items', function (Blueprint $table) {
            $table->increments('consumable_item_id');
            $table->unsignedInteger('consumable_collection_id');
            $table->foreign('consumable_collection_id')->references('consumable_collection_id')->on('consumable_collections');
            $table->unsignedInteger('nutrition_id');
            $table->foreign('nutrition_id')->references('nutrition_id')->on('nutritions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('consumable_items');
    }
}
