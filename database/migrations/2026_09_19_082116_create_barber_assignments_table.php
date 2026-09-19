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
        Schema::create('barber_assignments', function (Blueprint $table) {
            $table->integer('assignment_id', true);
            $table->integer('booking_id')->nullable()->index('booking_id');
            $table->integer('barber_id')->nullable()->index('barber_id');
            $table->integer('assigned_by')->nullable()->index('assigned_by');
            $table->timestamp('assigned_at')->nullable();
            $table->string('assignment_status', 30)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barber_assignments');
    }
};
