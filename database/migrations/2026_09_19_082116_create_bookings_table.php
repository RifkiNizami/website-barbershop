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
            $table->integer('booking_id', true);
            $table->integer('user_id')->nullable()->index('user_id');
            $table->integer('service_id')->nullable()->index('service_id');
            $table->date('booking_date')->nullable();
            $table->time('booking_time')->nullable();
            $table->integer('queue_number')->nullable();
            $table->string('status', 30)->nullable();
            $table->timestamp('created_at')->nullable();
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
