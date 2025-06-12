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
        Schema::create('results', function (Blueprint $table) {
            $table->id('result_id');
            $table->unsignedBigInteger('test_id');
            $table->unsignedBigInteger('student_id');
            $table->decimal('score', 5, 2);
            $table->timestamp('completed_at')->nullable();
            $table->timestamps();

            $table->foreign('test_id')->references('test_id')->on('tests')->onDelete('cascade');
            $table->foreign('student_id')->references('user_id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('results');
    }
};
