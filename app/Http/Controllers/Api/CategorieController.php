<?php

namespace App\Http\Controllers\Api;

use App\Categorie;
use App\Item;
use Illuminate\Http\Request;
use App;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $categories = Categorie::all();

            if ($categories){
                return response()->json($categories, Response::HTTP_OK);
            }

            return response()->json(['message' => 'No categories'], Response::HTTP_NO_CONTENT);
            
        }catch (\Exception $e){
            return response()->json(['message' => $e->getMessage()], Response::HTTP_BAD_REQUEST);
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        try {
            $newCategorie = new Categorie;
            $newCategorie->name = $request->name;
            $newCategorie->save();

            if ($newCategorie){
                return response()->json($newCategorie, Response::HTTP_OK);
            }

            return response()->json(['message' => 'No category'], Response::HTTP_NO_CONTENT);
            
        }catch (\Exception $e){
            return response()->json(['message' => $e->getMessage()], Response::HTTP_BAD_REQUEST);
        }
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        try {
            $categorie = Categorie::find($id);
            $categorie->name = $request->name;
            $categorie->save();

            if ($categorie){
                return response()->json($categorie, Response::HTTP_OK);
            }

            return response()->json(['message' => 'No category updated'], Response::HTTP_NO_CONTENT);
            
        }catch (\Exception $e){
            return response()->json(['message' => $e->getMessage()], Response::HTTP_BAD_REQUEST);
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categorie $categorie)
    {
        try {
            $categorie = Categorie::find($id);

            if ($categorie){
                $categorie->delete();
                return response()->json(['message' => 'Categorie deleted'], Response::HTTP_OK);
            }

            return response()->json(['message' => 'No category'], Response::HTTP_NO_CONTENT);
            
        }catch (\Exception $e){
            return response()->json(['message' => $e->getMessage()], Response::HTTP_BAD_REQUEST);
        }

        $categorie = Categorie::find($id);
        $categorie->delete();
    }
}
