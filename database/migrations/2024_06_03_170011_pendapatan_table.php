<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('pendapatan', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_pendapatan');
            $table->string('sumber_pendapatan');
            $table->text('deskripsi_pendapatan');
            $table->decimal('jumlah_pendapatan', 15, 2);
            $table->unsignedBigInteger('created_by')->default(1); // setting a default value, e.g., 1 for the admin
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendapatan');
    }
};
