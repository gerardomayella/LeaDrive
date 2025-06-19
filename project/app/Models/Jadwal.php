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
        'nama_instruktur', // Tambahkan nama instruktur
        'jam_pengajar',
        'tanggal',
        'metode_pembayaran', 
        'harga', // Tambahkan harga
        'user_id', // Tambahkan user_id
    ];

    public $timestamps = false;
    protected $primaryKey = 'id_jadwal'; // Gunakan id_jadwal sebagai primary key
    public $incrementing = true; // Primary key menggunakan auto-increment
    protected $keyType = 'int';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}