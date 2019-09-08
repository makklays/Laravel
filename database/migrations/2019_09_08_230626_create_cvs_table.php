<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCvsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cvs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->string('title',500)->nullable();
            $table->string('lang',2)->default('en');
            $table->string('firstname',255);
            $table->string('lastname',255);
            $table->string('gender',5);
            $table->integer('birthday');

            $table->string('email',255)->nullable();
            $table->string('phone',255)->nullable();
            $table->string('city',255)->nullable();
            $table->string('site',255)->nullable();
            $table->string('citizenship',255)->nullable();
            $table->integer('typejob')->nullable();
            $table->integer('otrasl')->nullable();
            $table->integer('salary')->nullable();
            $table->string('currency',3)->default('USD');
            $table->text('about')->nullable();
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
        Schema::dropIfExists('cvs');
    }
}
