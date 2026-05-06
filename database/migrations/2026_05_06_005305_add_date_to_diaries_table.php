<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * 投稿日の実装
     */
    public function up(): void
    {
        Schema::table('diaries', function (Blueprint $table) {
            Schema::table('diaries', function (Blueprint $table) {
                $table->date('date')->nullable();
            });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('diaries', function (Blueprint $table) {
            //
        });
    }
};
