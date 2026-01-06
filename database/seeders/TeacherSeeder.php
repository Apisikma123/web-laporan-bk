<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class TeacherSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Guru Admin',
            'email' => 'guru@sekolah.id',
            'password' => Hash::make('password123'),
            'role' => 'teacher',
        ]);
        
        echo "Akun guru berhasil dibuat!\n";
        echo "Email: guru@sekolah.id\n";
        echo "Password: password123\n";
    }
}