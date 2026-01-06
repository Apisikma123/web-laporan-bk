<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('complaints', function (Blueprint $table) {
            // Pastikan student_class sama tipe data dengan school_classes.class_name
            $table->string('student_class', 20)->change();
            
            // Tambah foreign key constraint (optional)
            // $table->foreign('student_class')->references('class_name')->on('school_classes');
        });
    }

    public function down(): void
    {
        Schema::table('complaints', function (Blueprint $table) {
            // $table->dropForeign(['student_class']);
        });
    }
};