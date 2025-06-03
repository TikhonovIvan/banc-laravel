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
        Schema::create('loan_applications', function (Blueprint $table) {
            $table->id();

            // Связь с пользователем
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            $table->decimal('amount', 15, 2); // Желаемая сумма кредита
            $table->integer('term_months');   // Срок кредита (в месяцах)

            $table->boolean('income_proof'); // Подтверждение дохода (да/нет)

            $table->string('credit_purpose'); // Кредит для покупки

            $table->text('comment')->nullable(); // Комментарий

            $table->enum('status', ['в обработке', 'одобрено'])->default('в обработке'); // Статус заявки

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loan_applications');
    }
};
