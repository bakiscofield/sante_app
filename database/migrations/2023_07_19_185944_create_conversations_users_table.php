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
        Schema::create('conversations_users', function (Blueprint $table) {
            $table->bigInteger('conversation_id');
            $table->bigInteger('user_id');
            $table->timestamps();
            $table->foreign('conversation_id')->references('conversation_id')->on('conversations')->nullOnDelete()->onUpdate('cascade');
            $table->foreign('user_id')->references('user_id')->on('users')->nullOnDelete()->onUpdate('cascade');
            $table->primary(['conversation_id', 'user_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('conversations_users');
    }
};
