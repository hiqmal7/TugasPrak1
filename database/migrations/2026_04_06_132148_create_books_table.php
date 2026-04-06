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
            $table->integer('id',20)->primary();
            $table->string('title');
            $table->string('author');
            $table->year('year');
            $table->string('publisher');
            $table->string('city');
            $table->string('cover');
            $table->Integer('bookshelfs_id');
            $table->foreign('bookshelfs_id')
                ->references('id')
                ->on('bookshelfs')
                ->onDelete('cascade')
                ->onUpdate('cascade');
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