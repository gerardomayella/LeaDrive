<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instruktur extends Model
{
    use HasFactory;

    protected $table = 'Instruktur'; // Specify the table name

    protected $fillable = [
        'email', // Allow mass assignment for email
        'no_hp', // Allow mass assignment for no_hp
    ];
}
