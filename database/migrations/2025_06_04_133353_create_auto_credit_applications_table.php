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
        Schema::create('auto_credit_applications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            $table->decimal('loan_amount', 15, 2);
            $table->string('car_make_model');
            $table->year('car_year');
            $table->enum('car_type', ['новый', 'с пробегом']);
            $table->decimal('car_price', 15, 2);
            $table->decimal('initial_payment', 15, 2);
            $table->integer('term_months');
            $table->string('purpose');
            $table->decimal('interest_rate', 5, 2)->nullable(); // 👈 добавлено
            $table->text('comment')->nullable();

            $table->enum('status', ['в обработке', 'одобрено', 'отклонено', 'ожидает документов'])->default('в обработке');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('auto_credit_applications');
    }
};
