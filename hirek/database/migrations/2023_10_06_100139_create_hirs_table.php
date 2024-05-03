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
        Schema::create('hirs', function (Blueprint $table) {
            $table->id('hir_id');
            $table->foreignId("szerkeszto")->references('felhasznalo_id')->on('users');
            $table->string("cim");
            $table->string("tartalom",6000);
            $table->dateTime("letrehozas");
            $table->dateTime("utolso_szerkesztes");
            $table->integer("felolvasasok_szama")->default('0');
            $table->dateTime("ervenyesseg");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hirs');
    }
};
