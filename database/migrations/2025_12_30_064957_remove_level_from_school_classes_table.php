<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('school_classes', function (Blueprint $table) {
            // Hapus kolom level
            $table->dropColumn('level');
        });
    }

    public function down()
    {
        Schema::table('school_classes', function (Blueprint $table) {
            // Tambah kembali kolom level jika rollback
            $table->string('level', 255)->nullable();
        });
    }
};