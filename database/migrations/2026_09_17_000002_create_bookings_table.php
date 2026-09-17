<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('booking_code')->unique();
            $table->string('nama_pelanggan');
            $table->string('no_whatsapp');
            $table->string('layanan');
            $table->string('barber');
            $table->date('tanggal');
            $table->string('jam');
            $table->text('catatan')->nullable();
            $table->integer('harga')->default(0);
            $table->string('status')->default('confirmed'); // confirmed, pending, completed, cancelled
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
