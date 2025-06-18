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
        'jam_pengajar',
        'lokasi',
    ];

    public $timestamps = false;
    protected $primaryKey = 'id_jadwal'; // Gunakan id_jadwal sebagai primary key
    public $incrementing = true; // Primary key menggunakan auto-increment
    protected $keyType = 'int';
}