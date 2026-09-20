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
            $table->string('booking_code')->nullable();
            $table->string('nama_pelanggan');
            $table->string('no_whatsapp');
            $table->string('layanan');
            $table->string('barber')->nullable();
            $table->date('tanggal');
            $table->string('jam');
            $table->text('catatan')->nullable();
            $table->integer('harga')->default(0);
            $table->string('status', 30)->default('confirmed');
            $table->integer('user_id')->nullable();
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
