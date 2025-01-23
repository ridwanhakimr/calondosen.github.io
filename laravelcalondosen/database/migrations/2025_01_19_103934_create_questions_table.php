<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Judul pertanyaan
            $table->text('content'); // Isi pertanyaan
            $table->string('category'); // Kategori pelajaran
            $table->unsignedBigInteger('user_id'); // ID user yang menulis
            $table->timestamps(); // Waktu dibuat dan diperbarui

            $table->foreign('user_id')->references('id_user')->on('tb_login')->onDelete('cascade');
        });
    }

};
