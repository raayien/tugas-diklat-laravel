<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KeahlianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = ['Data Science', 'Data Analysis', 'Data Visualization', 'Data Engineering', 'Data Mining', 'Machine Learning', 'Deep Learning', 'Natural Language Processing', 'Computer Vision', 'Big Data', 'Data Warehousing', 'Data Governance', 'Data Quality Management', 'Data Security and Privacy', 'Data Ethics and Compliance'];

        foreach ($data as $nama) {
            \App\Models\Keahlian::create(['nama_keahlian' => $nama]);
        }
    }
}
