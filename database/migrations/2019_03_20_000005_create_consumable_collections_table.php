<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConsumableCollectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consumable_collections', function (Blueprint $table) {
            $table->increments('consumable_collection_id');
            $table->integer('food_collection_mapping_id')->unsigned();
            $table->foreign('food_collection_mapping_id')->references('food_collection_mapping_id')->on('food_collection_mappings');
            $table->integer('consumable_item_mapping_id')->unsigned();
            $table->foreign('consumable_item_mapping_id')->references('consumable_item_mapping_id')->on('consumable_item_mappings');
            $table->string('consumable_type');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('consumable_collections');
    }
}
