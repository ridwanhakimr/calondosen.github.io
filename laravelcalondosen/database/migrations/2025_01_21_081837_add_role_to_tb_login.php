<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('tb_login', function (Blueprint $table) {
            $table->string('role')->default('user'); // Nilai default adalah 'user'
        });
    }

    public function down()
    {
        Schema::table('tb_login', function (Blueprint $table) {
            $table->dropColumn('role');
        });
    }

};
