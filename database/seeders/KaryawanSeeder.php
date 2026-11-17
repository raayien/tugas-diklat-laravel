<?php

namespace Database\Seeders;

use App\Models\Departemen;
use App\Models\Karyawan;
use App\Models\Keahlian;
use Illuminate\Database\Seeder;

class KaryawanSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'nik' => '20001',
                'name' => 'Andi',
                'long_name' => 'Andi Pratama',
                'alamat' => 'Jl. Merdeka No. 10, Jakarta',
                'departemen' => 'IT',
                'rekening' => '0123456789',
                'keahlian' => ['Data Engineering', 'Big Data'],
            ],
            [
                'nik' => '20002',
                'name' => 'Siti',
                'long_name' => 'Siti Rahmawati',
                'alamat' => 'Jl. Sudirman No. 5, Bandung',
                'departemen' => 'HR',
                'rekening' => '1122334455',
                'keahlian' => ['Data Analysis'],
            ],
            [
                'nik' => '20003',
                'name' => 'Rudi',
                'long_name' => 'Rudi Hartono',
                'alamat' => 'Jl. Pahlawan No. 3, Surabaya',
                'departemen' => 'Keuangan',
                'rekening' => '9876543210',
                'keahlian' => ['Data Visualization', 'Data Analysis'],
            ],
            [
                'nik' => '20004',
                'name' => 'Dewi',
                'long_name' => 'Dewi Lestari',
                'alamat' => 'Jl. Diponegoro No. 8, Semarang',
                'departemen' => 'IT',
                'rekening' => '5566778899',
                'keahlian' => ['Machine Learning', 'Deep Learning', 'Computer Vision'],
            ],
            [
                'nik' => '20005',
                'name' => 'Eko',
                'long_name' => 'Eko Saputra',
                'alamat' => 'Jl. Gajah Mada No. 12, Yogyakarta',
                'departemen' => 'Operasional',
                'rekening' => '3344556677',
                'keahlian' => ['Data Governance', 'Data Quality Management'],
            ],
        ];

        foreach ($data as $item) {
            // 1. Simpan karyawan
            $karyawan = Karyawan::create([
                'id_departemen' => Departemen::where('nama_departemen', $item['departemen'])->value('id'),
                'nik'           => $item['nik'],
                'name'          => $item['name'],
                'long_name'     => $item['long_name'],
                'alamat'        => $item['alamat'],
            ]);

            // 2. Simpan rekening lewat relasi hasOne
            $karyawan->rekening()->create(['no_rekening' => $item['rekening']]);

            // 3. Simpan keahlian ke tabel pivot lewat relasi belongsToMany
            $karyawan->keahlian()->attach(
                Keahlian::whereIn('nama_keahlian', $item['keahlian'])->pluck('id')
            );
        }
    }
}
