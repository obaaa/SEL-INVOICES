<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIncomesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incomes', function (Blueprint $table) {
            $table->increments('id');
            //user_id
            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
            //income_categorie_id
            $table->integer('income_categorie_id')->unsigned()->nullable();
            $table->foreign('income_categorie_id')
                ->references('id')->on('income_categories')
                ->onDelete('cascade')->default('1');
            //invoice_id
            $table->integer('invoice_id')->unsigned()->nullable();
            $table->foreign('invoice_id')
                ->references('id')->on('invoices')
                ->onDelete('cascade');
            //note
            $table->text('note')->nullable();
            //account_no
            $table->integer('account_no')->references('account')->on('customers')->onDelete('cascade');
            //
            $table->date('entry_date')->nullable();
            $table->decimal('amount',15,2)->nullable();
            //
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
        Schema::dropIfExists('incomes');
    }
}
