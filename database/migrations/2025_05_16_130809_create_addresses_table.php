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
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();

            $table->string('house_no')->nullable();
            $table->string('street_name')->nullable();
            $table->string('barangay');
            $table->string('municipality_city');
            $table->string('province');
            $table->string('country')->default('Philippines');
            $table->string('zip_code')->nullable();

            $table->enum('type', ['current', 'permanent']);

            $table->morphs('addressable');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
};
