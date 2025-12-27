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
        Schema::table('bookings', function (Blueprint $table) {
            // Menambahkan kolom user_id
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('set null')->after('room_id');

            // HAPUS BARIS INI KARENA KOLOM 'STATUS' SUDAH ADA
            // $table->string('status')->default('pending')->after('check_out');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
            // HAPUS BARIS INI KARENA DROP 'STATUS' TIDAK DILAKUKAN DI SINI
            // $table->dropColumn('status');
        });
    }
};