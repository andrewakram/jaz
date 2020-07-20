<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Notifications extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('worker_id')->unsigned();
            $table->bigInteger('order_id');
            $table->string('ar_message');
            $table->string('en_message');
            $table->string('image')->nullable();
            $table->enum('send_to',['user','worker']);
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
        Schema::dropIfExists('notifications');
    }
}
