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
        Schema::create('special_needs', function (Blueprint $table) {
            $table->id();

            $table->foreignId('learner_personal_info_id')->constrained()->onDelete('cascade');

            $table->boolean('is_under_special_needs_program')->default(false)->nullable();
            $table->string('with_diagnosis')->nullable();
            $table->string('with_manifestations')->nullable();
            $table->string('with_chronic_disease')->nullable();
            $table->string('with_visual_impairment')->nullable();
            $table->boolean('has_pwd_id')->default(false)->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('special_needs');
    }
};
