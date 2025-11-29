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
        Schema::create('courts', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            // jenis lapangan: bisa kamu tambah kalau perlu
            $table->enum('type', ['badminton', 'tenis', 'padel','pickleball', 'lainnya'])->default('badminton');
            $table->string('location', 255)->nullable();
            $table->text('description')->nullable();
            $table->decimal('price_per_hour', 10, 2)->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courts');
    }
};
