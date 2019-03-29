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
            $table->string('item_id');
            $table->string('item_name');
            $table->double('serving', 8, 2);
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
        Schema::dropIfExists('consumable_items');
    }
}
