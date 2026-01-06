<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Hapus tabel lama jika ada
        Schema::dropIfExists('complaints');
        
        // Buat tabel baru untuk konseling
        Schema::create('complaints', function (Blueprint $table) {
            $table->id();
            $table->string('unique_code')->unique();
            $table->string('student_name');
            $table->string('student_email');
            $table->string('student_class');
            $table->string('counseling_type'); // Ganti dari complaint_type
            $table->text('description');
            $table->string('status')->default('pending');
            $table->string('priority_level')->default('medium');
            $table->text('counselor_response')->nullable(); // Ganti dari teacher_response
            $table->dateTime('session_date')->nullable();
            $table->text('follow_up_plan')->nullable();
            $table->string('attachment')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('complaints');
    }
};