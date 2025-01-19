<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('answers', function (Blueprint $table) {
            $table->id();
            $table->text('content'); // Isi jawaban
            $table->unsignedBigInteger('question_id'); // ID pertanyaan yang dijawab
            $table->unsignedBigInteger('user_id'); // ID user yang menjawab
            $table->timestamps(); // Waktu dibuat dan diperbarui

            $table->foreign('question_id')->references('id')->on('questions')->onDelete('cascade');
            $table->foreign('user_id')->references('id_user')->on('tb_login')->onDelete('cascade');
        });
    }

};
