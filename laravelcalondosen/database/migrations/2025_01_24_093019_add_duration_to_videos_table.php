<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('videos', function (Blueprint $table) {
            $table->string('duration')->nullable()->after('video_path'); // Kolom durasi setelah video_path
        });
    }
    
    public function down()
    {
        Schema::table('videos', function (Blueprint $table) {
            $table->dropColumn('duration'); // Hapus kolom durasi jika di-rollback
        });
    }
};
