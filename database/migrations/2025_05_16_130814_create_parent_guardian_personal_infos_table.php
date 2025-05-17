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
        Schema::create('parent_guardian_personal_infos', function (Blueprint $table) {
            $table->id();

            $table->foreignId('learner_personal_info_id')->constrained()->onDelete('cascade');
            $table->foreignId('parent_guardian_id')->constrained()->onDelete('cascade');

            $table->string('last_name');
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('contact_number')->nullable();

            $table->enum('type', ['mother', 'father', 'guardian']);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parent_guardian_personal_infos');
    }
};
