<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Keahlian extends Model
{
    protected $table = 'keahlian';

    protected $fillable = ['nama_keahlian'];

    public function karyawan(): BelongsToMany
    {
        return $this->belongsToMany(Karyawan::class, 'keahlian_karyawan', 'id_keahlian', 'id_karyawan');
    }
}
