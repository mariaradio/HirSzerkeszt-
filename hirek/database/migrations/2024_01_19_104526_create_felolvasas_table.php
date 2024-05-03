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
        Schema::create('felolvasas', function (Blueprint $table) {
            $table->foreignId('hir')->references('hir_id')->on('hirs');
            $table->dateTime('felolvasas_datuma')->default(now());
            $table->primary(array('hir','felolvasas_datuma'));
            $table->foreignId('felolvaso')->references('felhasznalo_id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('felolvasas');
    }
};
