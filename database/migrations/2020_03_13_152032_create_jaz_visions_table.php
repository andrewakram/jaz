<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class
CreateJazVisionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jaz_visions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('body_en');
            $table->longText('body_ar');
            $table->longText('vision1_en');
            $table->longText('vision1_ar');
            $table->longText('vision2_en');
            $table->longText('vision2_ar');
            $table->longText('vision3_en');
            $table->longText('vision3_ar');
            $table->longText('vision4_en');
            $table->longText('vision4_ar');
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
        Schema::dropIfExists('jaz_visions');
    }
}
