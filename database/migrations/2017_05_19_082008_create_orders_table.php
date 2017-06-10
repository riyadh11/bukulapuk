<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id'); //pk
            $table->integer('member')->unsigned(); //fk
            $table->index('member');
            $table->foreign('member')->references('id')->on('Members')->onDelete('cascade');
            $table->integer('status')->unsigned(); //fk
            $table->index('status');
            $table->foreign('status')->references('id')->on('Order__Statuses')->onDelete('cascade');
            $table->integer('payment')->unsigned(); //fk
            $table->index('payment');
            $table->foreign('payment')->references('id')->on('Payments')->onDelete('cascade');
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
        Schema::dropIfExists('orders');
    }
}
