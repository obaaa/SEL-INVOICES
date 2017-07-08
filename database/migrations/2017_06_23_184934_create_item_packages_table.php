<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemPackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_packages', function (Blueprint $table) {
            $table->increments('id');
            //
            $table->string('name');
            //
            $table->integer('item_id')->unsigned()->nullable();
            $table->foreign('item_id')
                ->references('id')->on('items')
                ->onDelete('cascade');
            //
            $table->bigInteger('quantity')->nullable();
            //
            $table->decimal('discount',15,2)->nullable()->default('0');
            //note
            $table->text('note')->nullable();
            //
            $table->enum('active',['1','0'])->default('1');
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
        Schema::dropIfExists('item_packages');
    }
}
