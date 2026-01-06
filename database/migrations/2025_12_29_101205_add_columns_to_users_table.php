<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Cek dulu apakah kolom sudah ada
            if (!Schema::hasColumn('users', 'teacher_id')) {
                $table->string('teacher_id')->unique()->nullable()->after('email');
            }
            
            if (!Schema::hasColumn('users', 'subject')) {
                $table->string('subject')->nullable()->after('teacher_id');
            }
            
            if (!Schema::hasColumn('users', 'role')) {
                $table->enum('role', ['teacher', 'admin'])->default('teacher')->after('subject');
            }
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Hanya drop jika kolom ada
            if (Schema::hasColumn('users', 'teacher_id')) {
                $table->dropColumn('teacher_id');
            }
            
            if (Schema::hasColumn('users', 'subject')) {
                $table->dropColumn('subject');
            }
            
            if (Schema::hasColumn('users', 'role')) {
                $table->dropColumn('role');
            }
        });
    }
};