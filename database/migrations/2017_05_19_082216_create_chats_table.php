<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chats', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('first_person')->unsigned();
            $table->index('first_person');
            $table->foreign('first_person')->references('id')->on('Members')->onDelete('cascade');
            $table->integer('second_person')->unsigned();
            $table->index('second_person');
            $table->foreign('second_person')->references('id')->on('Members')->onDelete('cascade');
            $table->string('chat');
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
        Schema::dropIfExists('chats');
    }
}
