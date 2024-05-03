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
        Schema::create('hir_archivs', function (Blueprint $table) {
            $table->foreignId('hir')->references('hir_id')->on('hirs');
            $table->dateTime('csere');
            $table->primary(array('hir','csere'));
            $table->dateTime('ervenyesseg');
            $table->string('cim');
            $table->string('tartalom');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hir_archivs');
    }
};
