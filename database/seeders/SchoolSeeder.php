<?php

namespace Database\Seeders;

use App\Models\School;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SchoolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        School::create([
            'school_name' => 'Sta. Maria Central School',
            'school_id' => '126220',
            'district' => 'Sta. Maria',
            'region' => 'Region IX',
            'division' => 'Zamboanga City',
        ]);
    }
}
