<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class WorkerNotifications extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('worker_notifications', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('order_id')->unsigned();
            $table->bigInteger('worker_id')->unsigned();
            $table->string('ar_name');
            $table->string('en_name');

            $table->timestamps();

            if(Schema::hasTable('orders'))
            {
                $table->foreign('order_id')->references('id')->on('orders');
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
        Schema::dropIfExists('worker_notifications');
    }
}
