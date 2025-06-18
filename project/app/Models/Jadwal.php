<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;

    protected $table = 'Jadwal'; // Nama tabel di database

    // Kolom yang dapat diisi secara massal
    protected $fillable = [
        'tanggal',
        'jam',
        'lokasi',
    ];
}