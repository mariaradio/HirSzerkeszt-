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
        Schema::create('korlatoks', function (Blueprint $table) {
            $table->dateTime('beallitas_kezdete')->primary();
            $table->integer('admin');
            $table->integer('cim_hossza');
            $table->integer('tartalom_hossza');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('korlatoks');
    }
};
