<?php

use App\Models\User;
use App\Models\Question;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('answer_from_users', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Question::class);
            $table->longText('image_answers');
            $table->foreignIdFor(User::class);
            $table->boolean('is_true')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('answer_from_users');
    }
};
