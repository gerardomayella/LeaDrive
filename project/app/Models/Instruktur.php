<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instruktur extends Model
{
    use HasFactory;

    protected $table = 'Instruktur'; // Nama tabel
    protected $fillable = ['email', 'no_hp', 'nama', 'jam_pengajar', 'image_url']; // Kolom yang dapat diisi
}