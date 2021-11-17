<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDatabaseStructure extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('warehouse', function (Blueprint $table) {
            $table->id();
            $table->string('location', 100);
            $table->timestamps();
        });

        Schema::create('store', function (Blueprint $table) {
            $table->id();
            $table->string('name', 30);
            $table->string('location', 100);
            $table->unsignedBigInteger('supplying_warehouse_id');
            $table->timestamps();

            $table->foreign('supplying_warehouse_id')->references('id')->on('warehouse');
        });

        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name', 30);
            $table->double('price', 8, 2);
            $table->string('size', 11);
            $table->double('weight', 5, 2);
            $table->timestamps();
        });

        Schema::create('warehouse_managers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('warehouse_id');
            $table->unsignedBigInteger('manager_id');
            $table->timestamps();

            $table->foreign('warehouse_id')->references('id')->on('warehouse');
            $table->foreign('manager_id')->references('id')->on('users');
        });

        Schema::create('store_managers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('store_id');
            $table->unsignedBigInteger('manager_id');
            $table->timestamps();

            $table->foreign('store_id')->references('id')->on('store');
            $table->foreign('manager_id')->references('id')->on('users');
        });

        Schema::create('warehouse_stock', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('warehouse_id');
            $table->unsignedBigInteger('product_id');
            $table->integer('product_count');
            $table->timestamps();

            $table->foreign('warehouse_id')->references('id')->on('warehouse');
            $table->foreign('product_id')->references('id')->on('products');
        });

        Schema::create('store_stock', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('store_id');
            $table->unsignedBigInteger('product_id');
            $table->integer('product_count');
            $table->timestamps();

            $table->foreign('store_id')->references('id')->on('store');
            $table->foreign('product_id')->references('id')->on('products');
        });

        Schema::create('shipments_to_store', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('warehouse_id');
            $table->unsignedBigInteger('store_id');
            $table->unsignedBigInteger('shipped_product_id');
            $table->integer('shipped_product_count');
            $table->timestamps();

            $table->foreign('warehouse_id')->references('id')->on('warehouse');
            $table->foreign('store_id')->references('id')->on('store');
            $table->foreign('shipped_product_id')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('shipments_to_store');
        Schema::dropIfExists('store_stock');
        Schema::dropIfExists('warehouse_stock');
        Schema::dropIfExists('store_managers');
        Schema::dropIfExists('warehouse_managers');
        Schema::dropIfExists('warehouse');
        Schema::dropIfExists('store');
        Schema::dropIfExists('products');
        Schema::enableForeignKeyConstraints();
    }
}
