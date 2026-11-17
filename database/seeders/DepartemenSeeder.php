<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartemenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = ['IT', 'HR', 'Keuangan', 'Operasional', 'Pemasaran'];

        foreach ($data as $nama) {
            \App\Models\Departemen::create(['nama_departemen' => $nama]);
        }
    }
}
