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
        Schema::create('payment', function (Blueprint $table) {
            $table->integer('payment_id', true);
            $table->integer('booking_id')->nullable()->index('booking_id');
            $table->string('payment_method', 20)->nullable();
            $table->decimal('amount', 12)->nullable();
            $table->string('payment_status', 20)->nullable();
            $table->timestamp('payment_date')->nullable();
            $table->string('transaction_code', 100)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment');
    }
};
