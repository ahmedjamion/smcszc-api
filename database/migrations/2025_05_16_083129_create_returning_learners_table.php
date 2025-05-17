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
        Schema::create('returning_learners', function (Blueprint $table) {
            $table->id();

            $table->foreignId('learner_personal_info_id')->constrained()->onDelete('cascade');

            $table->string('last_grade_level_completed')->nullable();
            $table->string('last_school_attended')->nullable();
            $table->string('last_school_year_completed')->nullable();
            $table->unsignedBigInteger('school_id')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('returning_learners');
    }
};
