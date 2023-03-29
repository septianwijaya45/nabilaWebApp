<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJawabanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jawaban', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('member_id');
            $table->integer('soal1')->nullable();
            $table->integer('soal2')->nullable();
            $table->integer('soal3')->nullable();
            $table->integer('soal4')->nullable();
            $table->integer('soal5')->nullable();
            $table->integer('soal6')->nullable();
            $table->integer('soal7')->nullable();
            $table->integer('soal8')->nullable();
            $table->integer('soal9')->nullable();
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
        Schema::dropIfExists('jawaban');
    }
}
