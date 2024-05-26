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
        Schema::create('discussions', function (Blueprint $table) {
            $table->id();
            $table->enum('status', ['requested', 'accepted', 'cancelled'])->default('requested');

            $table->unsignedBigInteger('book_id');
            $table->foreign('book_id')->on('books')->references('id')->onDelete('cascade')->onUpdate('cascade');

            $table->unsignedBigInteger('first_user_id');
            $table->foreign('first_user_id')->on('users')->references('id')->onDelete('cascade')->onUpdate('cascade');

            $table->unsignedBigInteger('second_user_id');
            $table->foreign('second_user_id')->on('users')->references('id')->onDelete('cascade')->onUpdate('cascade');

            $table->unsignedBigInteger('swap_id');
            $table->foreign('swap_id')->on('swaps')->references('id')->onDelete('cascade')->onUpdate('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('discussions');
    }
};
