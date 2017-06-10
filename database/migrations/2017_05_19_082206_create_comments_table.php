<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id'); //pk
            
            $table->integer('member')->unsigned(); //fk
            $table->index('member');
            $table->foreign('member')->references('id')->on('Members')->onDelete('cascade');
            $table->integer('product')->unsigned(); //fk
            $table->index('product');
            $table->foreign('product')->references('id')->on('Products')->onDelete('cascade');
            $table->integer('status')->unsigned(); //fk
            $table->index('status');
            $table->foreign('status')->references('id')->on('Comment__statuses')->onDelete('cascade');
            $table->string('commentary');

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
        Schema::dropIfExists('comments');
    }
}
