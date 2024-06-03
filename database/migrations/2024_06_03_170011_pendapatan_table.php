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
        Schema::create('Pendapatan', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_pendapatan');
            $table->string('sumber_pendapatan');
            $table->text('deskripsi_pendapatan'); 
            $table->decimal('jumlah_pendapatan', 15, 2); 
            $table->string('created_by');
            $table->string('updated_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Pendapatan');
    }
};
