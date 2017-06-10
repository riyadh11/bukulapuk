<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShippingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shippings', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id'); //pk
            $table->integer('order')->unsigned();
            $table->index('order');
            $table->foreign('order')->references('id')->on('Orders')->onDelete('cascade');
            $table->integer('methods')->unsigned();
            $table->index('methods');
            $table->foreign('methods')->references('id')->on('shipping__methods')->onDelete('cascade');
            $table->integer('address')->unsigned();
            $table->index('address');
            $table->foreign('address')->references('id')->on('Member__addresses')->onDelete('cascade');
            $table->string('resi');
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
        Schema::dropIfExists('shippings');
    }
}
