<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('transactionID');
            $table->unsignedBigInteger('productID');
            $table->integer('quantity');
            $table->foreign('transactionID')->references('id')->on('transactions')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('productID')->references('id')->on('products')->onUpdate('cascade')->onDelete('cascade');
            $table->double('price');
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
        Schema::dropIfExists('transaction_details');
    }
}
