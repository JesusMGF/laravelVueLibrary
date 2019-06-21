<?php

namespace App\Http\Controllers\Api;

use App\Item;
use Illuminate\Http\Request;
use App;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;


class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $items = Item::all();

            if ($items){
                return response()->json($items, Response::HTTP_OK);
            }

            return response()->json(['message' => 'No items'], Response::HTTP_NO_CONTENT);
            
        }catch (\Exception $e){
            return response()->json(['message' => $e->getMessage()], Response::HTTP_BAD_REQUEST);
        }
        
    }

    public function itemById($id)
    {
        try {
            $item = Item::where('categorie_id','=', $id)->get();

            if ($item) {
                return response()->json($item, Response::HTTP_OK);
            }

            return response()->json(['message' => 'No item'], Response::HTTP_NO_CONTENT);
            
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
            $newItem = new Item;
            $newItem->name = $request->name;
            $newItem->categorie_id = $request->category;
            $newItem->description = $request->description;
            $newItem->save();

            if ($newItem) {
                return response()->json($newItem, Response::HTTP_OK);
            }

            return response()->json(['message' => 'No item saved'], Response::HTTP_NO_CONTENT);
            
        }catch (\Exception $e){
            return response()->json(['message' => $e->getMessage()], Response::HTTP_BAD_REQUEST);
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $item = Item::find($id);
            $item->name = $request->name;
            $item->description = $request->description;
            $item->save();

            if ($item) {
                return response()->json($item, Response::HTTP_OK);
            }

            return response()->json(['message' => 'No item updated'], Response::HTTP_NO_CONTENT);
            
        }catch (\Exception $e){
            return response()->json(['message' => $e->getMessage()], Response::HTTP_BAD_REQUEST);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        try {
            $item = Item::find($id);

            if ($item) {
                $item->delete();
                return response()->json(['message' => 'Item deleted'], Response::HTTP_OK);
            }

            return response()->json(['message' => 'No item'], Response::HTTP_NO_CONTENT);
            
        }catch (\Exception $e){
            return response()->json(['message' => $e->getMessage()], Response::HTTP_BAD_REQUEST);
        }



    }
}
