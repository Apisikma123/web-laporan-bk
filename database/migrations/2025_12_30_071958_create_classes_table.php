<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        // Drop if exists to avoid error
        Schema::dropIfExists('classes');
        
        Schema::create('classes', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kelas', 100)->unique();
            $table->string('kode_kelas', 20)->nullable()->unique(); // Optional: auto-generated code
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            $table->softDeletes();
            
            $table->index(['nama_kelas', 'is_active']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('classes');
    }
};