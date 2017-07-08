<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBillItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bill_items', function (Blueprint $table) {
            $table->increments('id');
            //bill_id
            $table->integer('bill_id')->unsigned()->nullable();
            $table->foreign('bill_id')
                ->references('id')->on('bills')
                ->onDelete('cascade');
            // item_id
            $table->integer('item_id')->unsigned()->nullable();
            $table->foreign('item_id')
                ->references('id')->on('items')
                ->onDelete('cascade');
            // item_package_id
            $table->integer('item_package_id')->unsigned()->nullable();
            $table->foreign('item_package_id')
                ->references('id')->on('item_packages')
                ->onDelete('cascade');
            // quantity
            $table->bigInteger('quantity')->nullable();
            // amount
            $table->decimal('amount',15,2)->nullable();
            //quantity_remain
            $table->bigInteger('quantity_remain')->nullable();
            // expir_date
            $table->date('expir_date')->nullable();
            //status['active','finished'];
            $table->enum('status',['1','0'])->default('1');

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
        Schema::dropIfExists('bill_items');
    }
}
