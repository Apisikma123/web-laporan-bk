<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('classes', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100)->unique(); // Nama kelas doang
            $table->string('description')->nullable(); // Keterangan opsional
            $table->timestamps();
        });
        
        // Optional: Drop table lama kalo mau
        // Schema::dropIfExists('school_classes');
    }

    public function down()
    {
        Schema::dropIfExists('classes');
    }
};