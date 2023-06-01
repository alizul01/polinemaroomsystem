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
            $table->integer('approved_by_himpunan')->nullable()->default(0);
            $table->dateTime('approved_by_himpunan_at')->nullable();
            $table->integer('approved_by_bem')->nullable()->default(0);
            $table->dateTime('approved_by_bem_at')->nullable();
            $table->integer('approved_by_kepala_jurusan')->nullable()->default(0);
            $table->dateTime('approved_by_kepala_jurusan_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('room_reservations', function (Blueprint $table) {
            $table->dropColumn('approved_by_himpunan');
            $table->dropColumn('approved_by_bem');
            $table->dropColumn('approved_by_kepala_jurusan');
        });
    }
};
