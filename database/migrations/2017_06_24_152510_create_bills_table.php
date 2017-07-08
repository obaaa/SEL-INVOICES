<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bills', function (Blueprint $table) {
            //id
            $table->increments('id');
            //user_id
            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
            //supplier_id
            $table->integer('supplier_id')->unsigned()->nullable();
            $table->foreign('supplier_id')
                ->references('id')->on('suppliers')
                ->onDelete('cascade');
            //total_cost
            $table->decimal('total_amount',15,2)->nullable();
            //amount_remain
            $table->decimal('amount_remain',15,2)->nullable();
            //amount_recipient
            $table->decimal('amount_recipient',15,2)->nullable();
            //status['initial','active','finished'];
            $table->enum('status',['1','0'])->default('0');
            // entry_date
            $table->date('entry_date')->nullable();
            //note
            $table->text('note')->nullable();
            $table->text('invoice_no')->nullable();
            //
            $table->softDeletes();
            $table->timestamps();
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
        Schema::dropIfExists('bills');
    }
}
