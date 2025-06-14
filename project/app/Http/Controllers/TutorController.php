<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tutor;

class TutorController extends Controller
{
    public function index()
    {
        $tutors = Tutor::all();
        return view('kelolaTutor', compact('tutors'));
    }

    public function create()
    {
        return view('tutor.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
        ]);

        Tutor::create($request->all());
        return redirect()->route('tutor.index')->with('success', 'Tutor berhasil ditambahkan');
    }

    public function edit($id)
    {
        $tutor = Tutor::findOrFail($id);
        return view('tutor.edit', compact('tutor'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
        ]);

        $tutor = Tutor::findOrFail($id);
        $tutor->update($request->all());
        return redirect()->route('tutor.index')->with('success', 'Tutor berhasil diperbarui');
    }

    public function destroy($id)
    {
        $tutor = Tutor::findOrFail($id);
        $tutor->delete();
        return redirect()->route('tutor.index')->with('success', 'Tutor berhasil dihapus');
    }
}