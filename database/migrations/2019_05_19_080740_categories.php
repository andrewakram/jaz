<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Categories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->tinyInteger('type')->comment('1 main, 2 sub, 3 third');
            $table->integer('parent_id')->nullable();
            $table->bigInteger('main_cat');
            $table->tinyInteger('has_period')->nullable();

            $table->string('ar_name')->unique();
            $table->string('en_name')->unique();

            $table->string('image')->nullable();
            $table->tinyInteger('active');
            $table->float('price')->nullable();

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
        Schema::table('categories', function (Blueprint $table) {
            //
        });
    }
}
