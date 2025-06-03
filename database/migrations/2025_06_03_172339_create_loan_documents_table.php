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
        Schema::create('loan_documents', function (Blueprint $table) {
            $table->id();

            // Связь с заявкой
            $table->foreignId('loan_application_id')->constrained()->onDelete('cascade');

            $table->string('file_path'); // Путь к файлу
            $table->string('original_name'); // Имя файла, как загружено пользователем

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loan_documents');
    }
};
