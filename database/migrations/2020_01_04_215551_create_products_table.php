<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->text('title');
            $table->text('title_ar');
            $table->longText('description');
            $table->longText('description_ar');
            $table->integer('number_of_container')->dafault(1);
            $table->integer('price');
            $table->text('container');
            $table->bigInteger('product_categories_id')->default(1);
            $table->bigInteger('product_subcategories_id')->default(1);
            $table->text('images')->nullable();
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
        Schema::dropIfExists('products');
    }
}
