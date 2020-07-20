<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Orders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->enum('type', ['urgent', 'scheduled']);

            $table->bigInteger('cat_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('worker_id')->unsigned();

            $table->Integer('order_action')
                ->default('0')
                ->comment('1 completed,2 canceled,3 rejected	');
            $table->string('cancel_reason')->nullable();
            $table->string('canceled_by')->nullable();

            $table->string('address')->nullable();
            $table->string('lat')->nullable();
            $table->string('lng')->nullable();
            $table->string('description')->nullable();

//            $table->tinyInteger('hours')
//                ->nullable()
//                ->comment('How many hours?! where category type = 3');
            $table->date('date')->nullable();
            $table->time('time')->nullable();

//            $table->enum('payment', ['online', 'cash']);
            $table->enum('order_status', ['','accept_order', 'on_way', 'finish_order']);

            $table->float('rate', 10, 1)->default('0');
            $table->double('order_total',10,1)->default('0');

            $table->softDeletes();
            $table->timestamps();

            if(Schema::hasTable('categories'))
            {
                $table->foreign('cat_id')->references('id')->on('categories');
            }

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
        Schema::dropIfExists('orders');
    }
}
