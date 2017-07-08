<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->increments('id');
            $table->string('USK')->nullable();
            $table->string('barcode')->nullable();
            $table->string('name')->unique();
            $table->string('image')->nullable();
            $table->bigInteger('quantity')->nullable();
            $table->decimal('price',15,2)->nullable();
            $table->enum('active',['1','0'])->default('1');
            //
            $table->integer('supplier_id')->unsigned()->nullable();
            $table->foreign('supplier_id')
                ->references('id')->on('suppliers')
                ->onDelete('cascade');
            //
            $table->integer('item_categorie_id')->unsigned()->nullable();
            $table->foreign('item_categorie_id')
                ->references('id')->on('item_categories')
                ->onDelete('cascade');
            //
            $table->integer('item_attribute_id')->unsigned()->nullable();
            $table->foreign('item_attribute_id')
                ->references('id')->on('item_attributes')
                ->onDelete('cascade');
            //note
            $table->text('note')->nullable();
            //critical_quantity
            $table->integer('critical_quantity')->nullable();
            //
            $table->timestamps();
            $table->softDeletes();
            $table->index(['deleted_at']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
}
