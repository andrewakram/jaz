<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Workers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->enum('role',['worker','company']);
            $table->string('jwt');
            $table->tinyInteger('active')->default('0');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone')->unique();
            $table->string('password');
            $table->string('cat_id');
            $table->string('address');
            $table->string('lat');
            $table->string('lng');
            $table->bigInteger('city_id')->unsigned();
            $table->tinyInteger('accept')->default('0')->comment('accept from admin');
            $table->tinyInteger('busy')->default('0');
            $table->tinyInteger('online')->default('1');
            $table->string('token')->nullable();
            $table->string('id_image');
            $table->string('contract')->nullable()->comment('worker sign contract then upload');
            $table->string('image')->nullable();
            $table->float('rate',10,1)->default('0');
            $table->string('description')->nullable();

            $table->softDeletes();
            $table->timestamps();

//            if(Schema::hasTable('categories'))
//            {
//                $table->foreign('cat_id')
//                    ->references('id')
//                    ->on('categories');
//            }

            if(Schema::hasTable('cities'))
            {
                $table->foreign('city_id')
                    ->references('id')
                    ->on('cities');
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
        Schema::dropIfExists('workers');
    }
}
