<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model; // Import the Model class
use Illuminate\Database\Eloquent\Factories\HasFactory; // Import the HasFactory trait untuk buat data dummy

class Jadwal extends Model
{
    use HasFactory;
    protected $table = 'Jadwal'; // Nama tabel
    protected $fillable = ['tanggal', 'jam_mulai', 'jam_selesai', 'id_instruktur', 'id_mobil', 'lokasi'];
}
