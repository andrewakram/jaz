<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ActiveRequests extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('active_requests', function (Blueprint $table) {
            $table->bigInteger('id');
            $table->bigInteger('order_id')->unsigned();
            $table->bigInteger('worker_id')->unsigned();
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
        Schema::dropIfExists('active_requests');
    }
}
