<?php

namespace App\Filament\Resources\Karyawans\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\Select;
use Filament\Schemas\Components\Section;

class KaryawanForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nik')
                    ->label('NIK')
                    ->required()
                    ->length(5)
                    ->unique(ignoreRecord: true),

                TextInput::make('name')
                    ->label('Nama')
                    ->required()
                    ->maxLength(50),

                TextInput::make('long_name')
                    ->label('Nama Lengkap')
                    ->required()
                    ->maxLength(100),

                Textarea::make('alamat')
                    ->label('Alamat')
                    ->required(),

                Select::make('id_departemen')
                    ->label('Departemen')
                    ->relationship('departemen', 'nama_departemen')
                    ->required(),

                CheckboxList::make('keahlian')
                    ->label('Keahlian')
                    ->relationship('keahlian', 'nama_keahlian')
                    ->columns(3),

                Section::make('Rekening')
                    ->relationship('rekening')
                    ->schema([
                        TextInput::make('no_rekening')
                            ->label('No. Rekening')
                            ->required()
                            ->regex('/^[0-9]+$/'),
                    ]),
            ]);
    }
}
