<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('media', function (Blueprint $table) {
            $table->id();

            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->text('description')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('img')->nullable();
            $table->string('phone',20)->unique()->nullable();
            $table->string('telegram')->unique()->nullable();
            $table->string('whats',20)->unique()->nullable();
            $table->string('viber',20)->unique()->nullable();
            $table->string('facebook')->unique()->nullable();
            $table->string('vk')->unique()->nullable();
            $table->string('instagram')->unique()->nullable();
            $table->string('twitter')->unique()->nullable();
            $table->string('slug')->unique()->nullable();
            $table->string('in')->unique()->nullable();

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');


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
        Schema::dropIfExists('social');
    }
}
