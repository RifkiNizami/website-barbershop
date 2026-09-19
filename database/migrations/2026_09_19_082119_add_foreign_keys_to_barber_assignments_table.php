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
        Schema::table('barber_assignments', function (Blueprint $table) {
            $table->foreign(['booking_id'], 'barber_assignments_ibfk_1')->references(['booking_id'])->on('bookings')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['barber_id'], 'barber_assignments_ibfk_2')->references(['barber_id'])->on('barbers')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['assigned_by'], 'barber_assignments_ibfk_3')->references(['user_id'])->on('users')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('barber_assignments', function (Blueprint $table) {
            $table->dropForeign('barber_assignments_ibfk_1');
            $table->dropForeign('barber_assignments_ibfk_2');
            $table->dropForeign('barber_assignments_ibfk_3');
        });
    }
};
