<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Karyawan extends Model
{
    protected $table = 'karyawan';

    protected $fillable = ['id_departemen', 'nik', 'name', 'long_name', 'alamat'];

    public function departemen(): BelongsTo
    {
        return $this->belongsTo(Departemen::class, 'id_departemen');
    }

    public function rekening(): HasOne
    {
        return $this->hasOne(Rekening::class, 'id_karyawan');
    }

    public function keahlian(): BelongsToMany
    {
        return $this->belongsToMany(Keahlian::class, 'keahlian_karyawan', 'id_karyawan', 'id_keahlian');
    }
}
