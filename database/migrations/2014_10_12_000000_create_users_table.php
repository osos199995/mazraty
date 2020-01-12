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
            $table->increments('id');
            $table->string('f_name');
            $table->string('l_name');
            $table->string('email')->unique();
            $table->string('password');
             $table->bigInteger('mobile_number')->default('011111111');
            $table->integer('role_id')->default(0);
            $table->integer('gender_id')->default(0);
            $table->boolean('status')->default(0);
            $table->text('governerate')->nullable();
            $table->text('area')->nullable();
            $table->text('street')->nullable();
            $table->text('building')->nullable();
            $table->text('floor')->nullable();
            $table->text('flat_number')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
