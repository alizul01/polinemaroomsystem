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
        Schema::table('approvals', function (Blueprint $table) {
            $table->bigInteger('jurusan_approved_by')->unsigned()->nullable();
            $table->foreign('jurusan_approved_by')->references('id')->on('users');
            $table->bigInteger('bem_approved_by')->unsigned()->nullable();
            $table->foreign('bem_approved_by')->references('id')->on('users');
            $table->bigInteger('himpunan_approved_by')->unsigned()->nullable();
            $table->foreign('himpunan_approved_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('approvals', function (Blueprint $table) {
            //
        });
    }
};
