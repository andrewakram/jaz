<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->enum('role', ['user', 'company']);
            $table->string('jwt');
            $table->tinyInteger('active')->default('0');

            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();

            $table->string('lat')->nullable();
            $table->string('lng')->nullable();
            $table->string('address')->nullable();
            $table->bigInteger('city_id')->unsigned()->nullable();
            $table->string('commercial_register')->nullable()->comment('commercial register for companies');
            $table->string('token')->nullable();
            $table->string('image')->nullable()->default('default_admin.png');

            $table->rememberToken();
            $table->softDeletes();
            $table->timestamps();

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
        Schema::dropIfExists('users');
    }
}
