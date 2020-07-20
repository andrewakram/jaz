<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJazBenefitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jaz_benefits', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('title1_en');
            $table->text('title1_ar');
            $table->longText('body1_en');
            $table->longText('body1_ar');
            $table->text('title2_en');
            $table->text('title2_ar');
            $table->longText('body2_en');
            $table->longText('body2_ar');
            $table->text('title3_en');
            $table->text('title3_ar');
            $table->longText('body3_en');
            $table->longText('body3_ar');
            $table->text('title4_en');
            $table->text('title4_ar');
            $table->longText('body4_en');
            $table->longText('body4_ar');
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
        Schema::dropIfExists('jaz_benefits');
    }
}
