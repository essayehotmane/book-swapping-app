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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->unsignedInteger('price');
            $table->enum('reason', ['swapp', 'sell', 'donation']);

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->on('users')->references('id')->onDelete('cascade')->onUpdate('cascade');

            $table->unsignedBigInteger('author_id');
            $table->foreign('author_id')->on('authors')->references('id')->onDelete('cascade')->onUpdate('cascade');

            $table->unsignedBigInteger('condition_id');
            $table->foreign('condition_id')->on('conditions')->references('id')->onDelete('cascade')->onUpdate('cascade');

            $table->unsignedBigInteger('language_id');
            $table->foreign('language_id')->on('languages')->references('id')->onDelete('cascade')->onUpdate('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
