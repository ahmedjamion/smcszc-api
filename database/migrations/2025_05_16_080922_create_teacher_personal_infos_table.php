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
        Schema::create('teacher_personal_infos', function (Blueprint $table) {
            $table->id();

            $table->foreignId('teacher_id')->constrained()->onDelete('cascade');

            $table->string('first_name');
            $table->string('last_name');
            $table->string('middle_name')->nullable();
            $table->string('extension_name')->nullable();
            $table->date('birth_date')->nullable();
            $table->integer('age')->nullable();
            $table->enum('sex', ['male', 'female', 'other']);
            $table->string('place_of_birth')->nullable();
            $table->string('religion')->nullable();
            $table->string('civil_status')->nullable();
            $table->string('contact_number')->nullable();
            $table->text('educational_background')->nullable();
            $table->integer('years_of_experience')->nullable();
            $table->string('specialization')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teacher_personal_infos');
    }
};
