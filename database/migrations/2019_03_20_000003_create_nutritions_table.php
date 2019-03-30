<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNutritionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nutritions', function (Blueprint $table) {
            $table->increments('nutrition_id');
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
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nutritions');
    }
}
