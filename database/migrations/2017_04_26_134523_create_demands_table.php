<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDemandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('demands', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('subject');
            $table->string('email');
            $table->text('doubt');
            $table->integer('mentor')->nullable();
            $table->text('file')->nullable();
            $table->string('status')->default(1);
            $table->string('student');
            $table->text('answer')->nullable();

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');




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
        Schema::drop('demands');
    }
}
