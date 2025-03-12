<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use App\Models\Alumne;
use Illuminate\Http\Request;

class ClasseController extends Controller
{
    public function index()
    {
        $classes = Classe::with('alumnes')->get();
        return response()->json($classes);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'grup' => 'required|string|max:255',
            'tutor' => 'required|string|max:255',
        ]);

        $classe = Classe::create([
            'grup' => $validated['grup'],
            'tutor' => $validated['tutor'],
        ]);

        return response()->json($classe, 201);
    }


    public function show($id)
    {
        $classe = Classe::with('alumnes')->findOrFail($id);
        return response()->json($classe);
    }

    public function addAlumne(Request $request, $id)
    {
        $classe = Classe::findOrFail($id);
        $alumne = new Alumne($request->only('nom', 'cognom', 'data_naixement', 'nif'));
        $classe->alumnes()->save($alumne);
        return response()->json($alumne, 201);
    }

    public function getAlumnes($id)
    {
        $classe = Classe::findOrFail($id);
        return response()->json($classe->alumnes);
    }
}
