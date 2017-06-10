<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id'); //pk
            $table->string('judul');
            $table->integer('harga');
            $table->string('penerbit');
            $table->string('description');
            $table->integer('kuantitas');
            $table->integer('category')->unsigned(); //fk
            $table->index('category');
            $table->foreign('category')->references('id')->on('Categories')->onDelete('cascade');
            $table->integer('status')->unsigned();
            $table->index('status');
            $table->foreign('status')->references('id')->on('product__statuses')->onDelete('cascade');
            $table->integer('tahun_terbit');
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
        Schema::dropIfExists('products');
    }
}
