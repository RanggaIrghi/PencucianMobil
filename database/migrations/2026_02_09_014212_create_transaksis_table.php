<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // database/migrations/xxxx_xx_xx_create_transaksis_table.php

    public function up()
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            
            $table->string('no_invoice')->unique();
            
            $table->foreignId('kendaraan_id')->constrained('kendaraans');
            $table->foreignId('layanan_id')->constrained('layanans');
            
            $table->date('tanggal_booking');
            $table->dateTime('waktu_transaksi')->useCurrent();
            
            $table->enum('status', ['Queue', 'Washing', 'Finished', 'Taken'])->default('Queue');
            
            $table->string('metode_pembayaran');
            $table->decimal('total_harga', 10, 2);
            $table->string('tipe_pemesanan')->default('Offline');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};
