<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OrderImages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_images', function (Blueprint $table){
            $table->bigIncrements('id');
            $table->bigInteger('order_id')->unsigned();
            $table->enum('type',['image','video']);
            $table->string('media')->comment('images, video');

            if(Schema::hasTable('orders'))
            {
                $table->foreign('order_id')->references('id')->on('orders');
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
        Schema::dropIfExists('order_images');
    }
}
