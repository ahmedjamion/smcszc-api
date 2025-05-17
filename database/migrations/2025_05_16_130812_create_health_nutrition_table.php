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
        Schema::create('health_nutrition', function (Blueprint $table) {
            $table->id();

            $table->float('weight')->nullable();
            $table->float('height')->nullable();
            $table->float('height_squared')->nullable();
            $table->float('bmi')->nullable();
            $table->enum('bmi_category', ['Severely Underweight', 'Underweight', 'Normal', 'Overweight', 'Obese'])->nullable();
            $table->string('height_for_age')->nullable();
            $table->text('remarks')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('health_nutrition');
    }
};
