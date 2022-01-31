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
            $table->string('name');
            $table->text('description');
            $table->text('style');
            $table->text('brand');
            $table->string('url');
            $table->string('product_type');
            $table->decimal('shipping_price', 10, 2)->unsigned();
            $table->text('note');

            $table->foreignId('user_id')
                ->references('id')
                ->on('users');

            $table->timestamps();

            $table->index('url');
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
