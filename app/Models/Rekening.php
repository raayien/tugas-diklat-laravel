<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Rekening extends Model
{
    protected $table = 'rekening';

    protected $primaryKey = 'id_karyawan';

    public $incrementing = false;

    protected $fillable = ['id_karyawan', 'no_rekening'];

    public function karyawan(): BelongsTo
    {
        return $this->belongsTo(Karyawan::class, 'id_karyawan');
    }
}
