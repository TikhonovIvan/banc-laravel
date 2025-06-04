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
        Schema::create('mortgage_applications', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            $table->decimal('loan_amount', 15, 2);
            $table->integer('term_years');

            $table->enum('property_type', ['Квартира', 'Частный дом', 'Студия']);
            $table->string('region');
            $table->decimal('property_value', 15, 2);
            $table->decimal('initial_payment', 15, 2);

            $table->string('purpose');
            $table->decimal('interest_rate', 5, 2)->nullable();
            $table->text('comment')->nullable();

            // Обновлённый список статусов заявки
            $table->enum('status', [
                'в обработке',
                'одобрено',
                'отклонено',
                'ожидает документов',
                'завершено'
            ])->default('в обработке');

            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mortgage_applications');
    }
};
