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
        Schema::create('pengirimen', function (Blueprint $table) {
            $table->id(); // ID sebagai primary key
            $table->unsignedBigInteger('material_id'); // Menggunakan unsignedBigInteger untuk foreign key material_id
            $table->date('tanggal_kirim'); // Tanggal kirim
            $table->date('tanggal_selesai'); // Tanggal selesai
            $table->integer('estimasi'); // Estimasi dalam satuan hari atau waktu
            $table->enum('status_pengiriman', ['proses', 'dikirim', 'diterima', 'batal']); // Status pengiriman
            $table->unsignedBigInteger('order_id'); // Order ID sebagai foreign key
            $table->timestamps(); // Menyimpan created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengirimen');
    }
};
