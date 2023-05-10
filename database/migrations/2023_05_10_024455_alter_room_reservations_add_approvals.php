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
        Schema::table('room_reservations', function (Blueprint $table) {
            $table->boolean('approved_by_himpunan');
            $table->dateTime('approved_by_himpunan_at');
            $table->boolean('approved_by_bem');
            $table->dateTime('approved_by_bem_at');
            $table->boolean('approved_by_kepala_jurusan');
            $table->dateTime('approved_by_kepala_jurusan_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('RoomReservation', function (Blueprint $table) {
            $table->dropColumn('approved_by_himpunan');
            $table->dropColumn('approved_by_bem');
            $table->dropColumn('approved_by_kepala_jurusan');
        });
    }
};
