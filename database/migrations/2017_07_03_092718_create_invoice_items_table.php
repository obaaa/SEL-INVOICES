<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoiceItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice_items', function (Blueprint $table) {
          $table->increments('id');
          //invoice_id
          $table->integer('invoice_id')->unsigned()->nullable();
          $table->foreign('invoice_id')
              ->references('id')->on('invoices')
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
        Schema::dropIfExists('invoice_items');
    }
}
