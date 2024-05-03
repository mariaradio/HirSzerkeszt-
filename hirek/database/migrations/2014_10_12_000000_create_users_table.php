<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id('felhasznalo_id');
            $table->string('felhasznalo_nev');
            $table->string('password');
            $table->string('email')->unique();
            $table->boolean('admin');
            $table->boolean('szerkeszto');
            $table->boolean('olvaso');
            $table->rememberToken();
            $table->timestamps();

        });
        User::create([
            'felhasznalo_nev'=>"DK",
            'password'=>Hash::Make("Aa123456@"),
            'email'=>"sd@gmail.com",
            'admin'=>1,
            'szerkeszto'=>1,
            'olvaso'=>1
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
