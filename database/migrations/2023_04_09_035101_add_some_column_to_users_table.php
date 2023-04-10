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
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('expert_active')->default(false);
            $table->longText('avatar')->nullable();
            $table->string('username')->nullable();
            $table->string('google_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('expert_active')->default(false);
            $table->longText('avatar')->nullable();
            $table->string('username')->nullable();
            $table->string('google_id')->nullable();
        });
    }
};
