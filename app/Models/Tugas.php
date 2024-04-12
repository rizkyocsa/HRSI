<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tugas extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'nip',
        'nama_project',
        'nama_modul',
        'date_start',
        'date_end',
        'jam_kerja',
        'value',
        'bonus',
        'catatan',
        'status',
        'status_penyelesaian',
    ];
}
