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
            $table->longText('supplier_ids');
            $table->string('product_code', 50);
            $table->string('product_name', 50);
            $table->longText('description');
            $table->decimal('standard_cost', 19, 4);
            $table->decimal('list_price', 19, 4);
            $table->integer('reorder_level');
            $table->integer('target_level');
            $table->string('quantity_per_unit', 50);
            $table->tinyInteger('discontinued');
            $table->integer('minimum_reorder_quantity');
            $table->string('category', 50);
            $table->binary('attachments');
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
