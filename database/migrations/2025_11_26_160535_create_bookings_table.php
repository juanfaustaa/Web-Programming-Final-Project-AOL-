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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();

            // relasi ke users & courts
            $table->foreignId('user_id')
                ->constrained()
                ->onDelete('cascade');

            $table->foreignId('court_id')
                ->constrained()
                ->onDelete('cascade');

            $table->date('booking_date');      // tanggal main
            $table->time('start_time');        // jam mulai
            $table->time('end_time');          // jam selesai

            // durasi (jam), misal 1.5 jam
            $table->decimal('duration_hour', 4, 2);

            // total harga (duration * price_per_hour)
            $table->decimal('total_price', 10, 2);

            // status booking
            $table->enum('status', [
                'pending',    // baru booking, menunggu approval/pembayaran
                'approved',   // disetujui admin (opsional)
                'rejected',   // ditolak admin
                'paid',       // sudah bayar
                'completed',  // sudah selesai main
                'cancelled',  // dibatalkan
            ])->default('pending');

            $table->text('notes')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
