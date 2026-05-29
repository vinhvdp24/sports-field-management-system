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
        Schema::create('pitches', function (Blueprint $table) {
            $table->string('code', 50)->primary();
            $table->string('name', 100);
            $table->decimal('price', 12, 2);
            $table->string('status', 30)->nullable();
            $table->string('description', 500)->nullable();
            $table->string('pitch_type_code', 10);
            $table->foreign('pitch_type_code')->references('code')->on('pitch_types')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pitches');
    }
};
