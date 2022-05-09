<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cards', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255);
            $table->string('description', 255);
            $table->timestamps();
            $table->unsignedBigInteger('executor_id')->nullable();
            $table->unsignedBigInteger('author_id');
        });
        
        Schema::table('cards', function (Blueprint $table) {
            $table->foreign('executor_id')->references('id')->on('users');
            $table->foreign('author_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cards');
    }
}
