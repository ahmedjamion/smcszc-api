<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\GradeLevel;

class GradeLevelSeeder extends Seeder
{
    public function run(): void
    {
        $grades = [
            ['name' => 'Grade 1', 'description' => 'First Grade Level', 'level_order' => 1],
            ['name' => 'Grade 2', 'description' => 'Second Grade Level', 'level_order' => 2],
            ['name' => 'Grade 3', 'description' => 'Third Grade Level', 'level_order' => 3],
            ['name' => 'Grade 4', 'description' => 'Fourth Grade Level', 'level_order' => 4],
            ['name' => 'Grade 5', 'description' => 'Fifth Grade Level', 'level_order' => 5],
            ['name' => 'Grade 6', 'description' => 'Sixth Grade Level', 'level_order' => 6],
        ];

        foreach ($grades as $grade) {
            GradeLevel::firstOrCreate(
                ['name' => $grade['name']],
                ['description' => $grade['description'], 'level_order' => $grade['level_order']]
            );
        }
    }
}
