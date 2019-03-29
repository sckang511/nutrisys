<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('user_id');
            $table->string('username');
            $table->string('password');
            $table->string('phone')->nullable();
            $table->string('email', 250)->unique();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('user_type')->default('standard');
            $table->string('profile_picture')->nullable();
            $table->boolean('is_active')->default(true);
            $table->double('weight', 8, 2)->nullable();
            $table->double('height', 8, 2)->nullable();
            $table->string('birthdate')->nullable();
            $table->string('gender')->nullable();
            $table->string('activity_level')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
