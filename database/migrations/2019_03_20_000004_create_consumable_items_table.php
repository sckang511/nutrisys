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
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('user_id')->on('users');
            $table->string('item_id');
            $table->string('item_name');
            $table->double('serving_qty', 8, 2)->nullable();
            $table->string('serving_unit')->nullable();
            $table->double('calorie', 8, 2)->nullable();
            $table->double('total_fat', 8, 2)->nullable();
            $table->double('saturated_fat', 8, 2)->nullable();
            $table->double('cholesterol', 8, 2)->nullable();
            $table->double('sodium', 8, 2)->nullable();
            $table->double('carbohydrate', 8, 2)->nullable();
            $table->double('dietary_fiber', 8, 2)->nullable();
            $table->double('sugar', 8, 2)->nullable();
            $table->double('protein', 8, 2)->nullable();
            $table->double('potassium', 8, 2)->nullable();
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
        Schema::dropIfExists('consumable_items');
    }
}
