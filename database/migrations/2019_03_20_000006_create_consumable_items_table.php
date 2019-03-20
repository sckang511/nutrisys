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
            $table->unsignedInteger('consumable_item_mapping_id');
            $table->foreign('consumable_item_mapping_id')->references('consumable_item_mapping_id')->on('consumable_item_mappings');
            $table->string('item_id');
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
