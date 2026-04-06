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
        Schema::create('loan_detail', function (Blueprint $table) {
            $table->integer('id',20)->primary();
            $table->Integer('loans_id');
            $table->foreign('loans_id')
                ->references('id')
                ->on('loans')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->Integer('books_id');
            $table->foreign('books_id')
                ->references('id')
                ->on('books')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->boolean('is_return');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loan_detail');
    }
};