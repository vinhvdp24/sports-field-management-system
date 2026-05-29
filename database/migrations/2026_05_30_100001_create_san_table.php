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
        Schema::create('san', function (Blueprint $table) {
            $table->string('MaSan', 50)->primary();
            $table->string('TenSan', 100);
            $table->decimal('GiaThue', 12, 2);
            $table->string('TinhTrang', 30)->nullable();
            $table->string('MoTa', 500)->nullable();
            $table->string('MaLoai', 10);
            $table->foreign('MaLoai')->references('MaLoai')->on('loaisan')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('san');
    }
};
