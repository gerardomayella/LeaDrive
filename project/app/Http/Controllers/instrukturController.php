<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Instruktur;

class instrukturController extends Controller
{
    public function index(){
        $instrukturs = Instruktur::all(); // Mengambil semua data instruktur dari model Instruktur
        return view('dashboard', compact('instrukturs')); // Mengirim data instruktur ke view 'dashboard'
    }
}
