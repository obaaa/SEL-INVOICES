<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expenses', function (Blueprint $table) {
            // id
            $table->increments('id');
            //user_id
            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
            //expense_categorie_id
            $table->integer('expense_categorie_id')->unsigned()->nullable();
            $table->foreign('expense_categorie_id')
                ->references('id')->on('expense_categories')
                ->onDelete('cascade');
            //bill_id
            $table->integer('bill_id')->unsigned()->nullable();
            $table->foreign('bill_id')
                ->references('id')->on('bills')
                ->onDelete('cascade');
            //account_no
            $table->integer('account')->references('account')->on('suppliers')->onDelete('cascade');
            //entry_date
            $table->date('entry_date')->nullable();
            //amount
            $table->decimal('amount',15,2)->nullable();
            //note
            $table->text('note')->nullable();
            //timestamps
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
        Schema::dropIfExists('expenses');
    }
}
