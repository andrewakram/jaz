<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Messages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('worker_id')->unsigned();
            $table->text('body');
            $table->enum('send',['user','worker']);
            $table->timestamps();

            if(Schema::hasTable('users'))
            {
                $table->foreign('user_id')->references('id')->on('users');
            }

            if(Schema::hasTable('workers'))
            {
                $table->foreign('worker_id')->references('id')->on('workers');
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('messages');
    }
}
