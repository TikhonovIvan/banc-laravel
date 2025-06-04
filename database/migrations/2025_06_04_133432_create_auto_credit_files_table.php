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
        Schema::create('auto_credit_files', function (Blueprint $table) {
            $table->id();
            $table->foreignId('auto_credit_application_id')->constrained()->onDelete('cascade');
            $table->string('file_path');
            $table->string('original_name'); // добавляем поле для исходного имени файла
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('auto_credit_files');
    }
};
