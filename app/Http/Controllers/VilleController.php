<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ville;

class VilleController extends Controller
{
    public function index()
    {
        $villes = Ville::all();
        return view('villes.index', compact('villes'));
    }
    
    public function create(Request $request)
    {
        Ville::create($request->all());
        $villes = Ville::all();
        return view('villes.index', compact('villes'));
    }

    public function findAll()
    {
        $ville = Ville::get();
        return response()->json($ville);
    }

    public function destroy($id)
    {
        $ville = Ville::findOrFail($id);

        return response()->json([
          'data' => [
            'success' => $ville->destroy($id),
          ]
        ]);
    }
}
