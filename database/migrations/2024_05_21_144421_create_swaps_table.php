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
        Schema::create('swaps', function (Blueprint $table) {
            $table->id();
            $table->enum('status', ['requested', 'accepted', 'done', 'cancelled'])->default('requested');

            $table->unsignedBigInteger('book_id');
            $table->foreign('book_id')->on('books')->references('id')->onDelete('cascade')->onUpdate('cascade');

            $table->unsignedBigInteger('requester_id');
            $table->foreign('requester_id')->on('users')->references('id')->onDelete('cascade')->onUpdate('cascade');


            $table->unsignedBigInteger('owner_id');
            $table->foreign('owner_id')->on('users')->references('id')->onDelete('cascade')->onUpdate('cascade');

            $table->timestamp('accepted_at');
            $table->timestamp('completed_at');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('swaps');
    }
};
