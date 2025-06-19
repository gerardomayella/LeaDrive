<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // Import the HasFactory trait untuk buat data dummy
use Illuminate\Database\Eloquent\Model; // Import the Model class

class Instruktur extends Model
{
    use HasFactory;

    protected $table = 'Instruktur'; // Nama tabel
    protected $fillable = ['email', 'no_hp', 'nama', 'jam_pengajar', 'image_url']; // Kolom yang dapat diisi
}