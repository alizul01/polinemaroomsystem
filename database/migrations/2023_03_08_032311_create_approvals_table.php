z<?php

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
        Schema::create('approvals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('request_id')->constrained();
            $table->boolean('jurusan_approved')->default(false);
            $table->dateTime('jurusan_approved_at');
            $table->boolean('bem_approved')->default(false);
            $table->dateTime('bem_approved_at');
            $table->boolean('himpunan_approved')->default(false);
            $table->dateTime('himpunan_approved_at');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('approvals');
    }
};
