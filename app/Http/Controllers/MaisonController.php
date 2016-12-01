<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Maison;
use App\ImageMaison;
use App\Ville;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;


class MaisonController extends Controller
{
    public function index()
    {
        $maisons = Maison::all();
        return view('maisons.index', compact('maisons'));
    }

    public function details($id)
    {
        $maison = Maison::findOrFail($id);
        $gallery_pictures = $maison->images;
        return view('maisons.detail', compact('maison', 'gallery_pictures'));
    }

    public function create()
    {
        $villes = Ville::all();
        return view('maisons.new', compact('villes'));
    }

    public function store(Request $request)
    {
        $folderName = 'images/maisons/Maison@' . uniqid() . '/';

        $main_img = $request->file('img');
        $main_img_fileName = uniqid() . $main_img->getClientOriginalName();
        $main_img->move($folderName, $main_img_fileName);
        
        $request->offsetSet('main_picture', $folderName . $main_img_fileName);
        $request->offsetSet('folder', $folderName);
        $nouvelle_maison = Maison::create($request->except('img'));


        $gallerie = $request->file('file');
        if (is_array($gallerie) || is_object($gallerie))
        {
            foreach ($gallerie as $img){
                $gallery_img_fileName = uniqid() . $img->getClientOriginalName();
                $img->move($folderName . 'gallerie/', $gallery_img_fileName);
                ImageMaison::create(array('maison_id' => $nouvelle_maison->id,  'path' => $folderName . 'gallerie/' . $gallery_img_fileName));
            }
        }

        return Redirect::to('houses');
    }

    public function edit($id)
    {
        $villes = Ville::all();
        $maison = Maison::find($id);
        $gallery_pictures = $maison->images;
        return view('maisons.edit', compact('villes', 'maison', 'gallery_pictures'));
    }

    public function confirmEdit($Request $request)
    {
        //here We edit everyThing...
        dd($request);
    }

    public function findAll()
    {
        $maison = Maison::get();
        return response()->json($maison);
    }

    public function findByVille($ville_id)
    {
        $maisons = DB::table('maisons')
                ->join('villes', function ($join) {
                    $join->on('maisons.ville_id', '=', 'villes.id');
                })
                ->get()->where('ville_id', $ville_id);
        return response()->json($maisons);
    }

    public function deleteMainImage($id)
    {
        $maison = Maison::findOrFail($id);
        \File::Delete($maison->main_picture);

        return response()->json([
          'data' => [
            'success' => $maison->update(array('main_picture' => 'images/default-house.jpg')),
          ]
        ]);

    }

    public function deleteImageGallery($id)
    {
        $img = ImageMaison::findOrFail($id);
        \File::Delete($img->path);

        return response()->json([
          'data' => [
            'success' => $img->destroy($id),
          ]
        ]);

    }

    public function selectedForHome()
    {
        //$maison = Maison::get()->('selected', true);
        //return response()->json($maison);
    }

    public function getFavorites($user)
    {
        //$maison = Maison::get()->('selected', true);
        //return response()->json($maison);
    }

    public function findOne($ville_id, $maison_id)
    {
        $maisons = DB::table('maisons')
                ->join('villes', function ($join) {
                    $join->on('maisons.ville_id', '=', 'villes.id');
                })
                ->select('maisons.id', 'maisons.name', 'maisons.presentation', 'maisons.services', 'maisons.longitude', 'maisons.latitude', 'maisons.contact', 'maisons.created_at', 'maisons.updated_at', 'maisons.ville_id', 'villes.name')
                ->get()->where('id', $maison_id)->where('ville_id', $ville_id);
        return response()->json($maisons);
    }

    public function destroy($id)
    {
        $maison = Maison::findOrFail($id);
        $success = \File::deleteDirectory($maison->folder);

        return response()->json([
          'data' => [
            'success' => $maison->destroy($id),
          ]
        ]);
    }
}