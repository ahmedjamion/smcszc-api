<?php

namespace Database\Seeders;

use App\Models\PreferredLearningModality;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PreferredLearningModalitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $modalities = [
            'Blended',
            'Educational Television',
            'Home Schooling',
            'Modular Digital',
            'Modular Print',
            'Online',
            'Radio-Based',
        ];

        foreach ($modalities as $name) {
            PreferredLearningModality::firstOrCreate(['learning_modality' => $name]);
        }
    }
}
