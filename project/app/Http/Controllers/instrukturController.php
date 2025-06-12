<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Instruktur;

class instrukturController extends Controller
{
    public function index(){
        $instrukturs = Instruktur::all();
        return view('dashboard', compact('instrukturs'));
    }
}
