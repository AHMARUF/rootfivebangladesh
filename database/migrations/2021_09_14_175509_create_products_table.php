<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('product_Name')->nullable();
            $table->string('product_slug')->nullable();
            $table->string('product_code')->nullable();
            $table->Integer('cat_id')->nullable();
            $table->Integer('sub_cat_id')->nullable();
            $table->Integer('brand_id')->nullable();
            $table->Integer('PC_builder')->nullable();
            $table->text('Key_Features')->nullable();
            $table->text('Specification')->nullable();
            $table->text('Description')->nullable();
           /* $table->text('latest_price')->nullable();*/
            $table->Integer('quantity')->nullable();
            $table->string('Price')->nullable();
            $table->string('Regular_Price')->nullable();
            $table->string('image')->nullable();
            $table->Integer('status')->default(1);
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
