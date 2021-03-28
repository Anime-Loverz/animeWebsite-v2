<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('animes', function (Blueprint $table) {
            $table->id();
            $table->integer('status')->nullable()->default(0);
            $table->string('score')->nullable()->default(0);
            $table->string('title')->unique();
            $table->string('genre');
            $table->string('link')->nullable()->default('https://otakudesu.tv');
            $table->unsignedBigInteger('user_id');
            $table->string('motivasi')->nullable();
            $table->string('sinopsis')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('animes');
    }
}
