<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JurnalKegiatan extends Model
{
    use HasFactory;

    protected $fillable = [
        'tempat',
        'tanggal',
        'mulai_pukul',
        'selesai_pukul',
        'kegiatan',
    ];
}
