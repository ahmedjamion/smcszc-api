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
        Schema::create('learner_personal_infos', function (Blueprint $table) {
            $table->id();

            $table->string('psa_birth_certificate_no')->nullable();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('middle_name')->nullable();
            $table->string('extension_name')->nullable();
            $table->date('birth_date');
            $table->integer('age');
            $table->enum('sex', ['male', 'female', 'other']);
            $table->string('place_of_birth');
            $table->string('religion')->nullable();
            $table->string('mother_tongue')->nullable();

            $table->boolean('is_indigenous_community_member')->default(false);
            $table->string('community')->nullable();

            $table->boolean('is_4ps_beneficiary')->default(false);
            $table->string('household_no')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('learner_personal_infos');
    }
};
