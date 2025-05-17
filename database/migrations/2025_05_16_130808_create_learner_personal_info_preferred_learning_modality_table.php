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
        Schema::create('learner_personal_info_preferred_learning_modality', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('learner_personal_info_id');
            $table->foreign('learner_personal_info_id', 'lp_info_modality_lp_info_fk')
                ->references('id')
                ->on('learner_personal_infos')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->unsignedBigInteger('preferred_learning_modality_id');
            $table->foreign('preferred_learning_modality_id', 'lp_info_modality_modality_fk')
                ->references('id')
                ->on('preferred_learning_modalities')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('learner_personal_info_preferred_learning_modality');
    }
};
