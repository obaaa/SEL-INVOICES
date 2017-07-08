<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('address')->nullable();
            $table->integer('phone')->nullable();
            // $table->string('image')->nullable();
            $table->string('email')->nullable();
            $table->integer('account')->unique();
            //note
            $table->text('note')->nullable();
            $table->enum('active',['1','0'])->default('1');
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
        Schema::dropIfExists('customers');
    }
}
