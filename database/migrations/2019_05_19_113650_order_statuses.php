<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OrderStatuses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_statuses', function (Blueprint $table){
            $table->bigIncrements('id');
            $table->bigInteger('order_id')->unsigned();
            $table->bigInteger('worker_id')->unsigned();
            $table->float('salary',10,1);
            $table->tinyInteger('user_status')
                ->default('0')
                ->comment('0 waiting user, 1 accept , 2 reject');
            $table->enum('payment', ['','online', 'cash']);
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
        Schema::dropIfExists('order_statuses');
    }
}
