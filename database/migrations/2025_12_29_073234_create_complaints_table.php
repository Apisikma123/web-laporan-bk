<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('complaints', function (Blueprint $table) {
            $table->id();
            $table->string('unique_code', 20)->unique();
            $table->string('student_name', 100);
            $table->string('student_email', 100);
            $table->string('student_class', 20);
            $table->string('counseling_type', 50);
            $table->text('description');
            $table->string('status', 20)->default('pending');
            $table->string('priority_level', 20)->default('medium');
            $table->text('counselor_response')->nullable();
            $table->dateTime('session_date')->nullable();
            $table->text('follow_up_plan')->nullable();
            $table->string('attachment')->nullable();
            $table->timestamps();
            
            $table->index('student_class');
            $table->index('status');
            $table->index('priority_level');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('complaints');
    }
};