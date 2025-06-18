<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mobil extends Model
{
    use HasFactory;

    protected $table = 'Mobil'; // Nama tabel
    protected $fillable = ['transmisi']; // Kolom yang dapat diisi
}