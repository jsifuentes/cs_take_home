<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')
                ->references('id')
                ->on('products');
            $table->foreignId('inventory_id')
                ->references('id')
                ->on('inventory');
            $table->string('street_address');
            $table->string('apartment');
            $table->string('city');
            $table->string('state');
            $table->string('country_code');
            $table->string('zip');
            $table->string('phone_number');
            $table->string('email');
            $table->string('name');
            $table->string('order_status');
            $table->string('payment_ref')->nullable();
            $table->string('transaction_id')->nullable();
            $table->decimal('payment_amount', 10, 2)->unsigned();
            $table->decimal('ship_charge', 10, 2)->unsigned();
            $table->decimal('ship_cost', 10, 2)->unsigned();
            $table->decimal('subtotal', 10, 2)->unsigned();
            $table->decimal('total', 10, 2)->unsigned();
            $table->string('shipper_name');
            $table->timestamp('paid_at')->nullable();
            $table->timestamp('shipped_at')->nullable();
            $table->string('tracking_number')->nullable();
            $table->decimal('tax_total', 10, 2)->unsigned();
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
        Schema::dropIfExists('orders');
    }
}
