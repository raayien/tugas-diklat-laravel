<?php

namespace App\Filament\Resources\Karyawans\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class KaryawanInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Data Karyawan')
                    ->schema([
                        TextEntry::make('nik')->label('NIK'),
                        TextEntry::make('name')->label('Nama'),
                        TextEntry::make('long_name')->label('Nama Lengkap'),
                        TextEntry::make('alamat')->label('Alamat'),
                    ])
                    ->columns(2),

                Section::make('Departemen & Rekening')
                    ->schema([
                        TextEntry::make('departemen.nama_departemen')->label('Departemen'),
                        TextEntry::make('rekening.no_rekening')->label('No. Rekening'),
                    ])
                    ->columns(2),

                Section::make('Keahlian')
                    ->schema([
                        TextEntry::make('keahlian.nama_keahlian')->label('Keahlian')->badge(),
                    ]),
            ]);
    }
}
