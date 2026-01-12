<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('email_logs', function (Blueprint $table) {
            $table->id();
            $table->string('recipient');
            $table->string('subject');
            $table->text('body');
            $table->enum('type', ['student_confirmation', 'teacher_notification', 'follow_up', 'reminder']);
            $table->string('status')->default('pending'); // pending, sent, failed
            $table->foreignId('complaint_id')->nullable()->constrained()->onDelete('cascade');
            $table->text('error_message')->nullable();
            $table->timestamps();
            $table->index(['status', 'type']);
        });
        
        Schema::create('email_errors', function (Blueprint $table) {
            $table->id();
            $table->string('recipient');
            $table->string('type');
            $table->text('error');
            $table->json('metadata')->nullable();
            $table->timestamp('sent_at')->useCurrent();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('email_errors');
        Schema::dropIfExists('email_logs');
    }
};