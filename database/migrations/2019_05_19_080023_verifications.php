<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Verifications extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('verifications', function (Blueprint $table){
           $table->bigIncrements('id');
           $table->enum('role', ['user', 'worker']);
           $table->enum('type', ['activate', 'reset']);
           $table->string('phone');
           $table->string('code');
           $table->timestamp('expire_at');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('verifications');
    }
}
