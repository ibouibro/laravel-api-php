<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\publication;
use App\Produit;
use App\Article;
use Validator;

class apicontroller extends Controller
{
    //
    public function store(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'prix' => 'required',
            'image' => 'required',
            'description' => 'required',
            'date' => 'required'
        ]);

        if ($validator->fails()) {
            $response = [
                'success' => false,
                'data' => 'Validation Error.',
                'message' => $validator->errors()
            ];
            return response()->json($response, 404);
        }

        $publication = publication::create($input);
        
        $data = $publication->toArray();

        $response = [
            'success' => true,
            'data' => $data,
            'message' => 'publication stored successfully.'
        ];

        return response()->json($response, 200);
    }

    public function index()
    {
       // $publications = DB::table('publications')->get();
       $publications = publication::all();
       $data = $publications->toArray();
        

        $response = [
            'success' => true,
            'data' => $data,
            'message' => 'publications retrieved successfully.'
        ];

        return response()->json($data, 200);
    }



    public function getProduits()
    {
      $produits = Produit::all();

 
      $data = $produits->toArray();
 
        return response()->json($data, 200);
    }


    public function update(Request $request, $id)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'prix' => 'required',
            'image' => 'required',
            'description' => 'required',
            'date' => 'required'
        ]);

        if ($validator->fails()) {
            $response = [
                'success' => false,
                'data' => 'Validation Error.',
                'message' => $validator->errors()
            ];
            return response()->json($response, 404);
        }

        $publication = Publication::find($id);

        $publication->prix = $input['prix'];
        $publication->description = $input['description'];
        $publication->image = $input['image'];
        $publication->date = $input['date'];
        
        $publication->save();

        $data = $publication->toArray();

        $response = [
            'success' => true,
            'data' => $data,
            'message' => 'Book updated successfully.'
        ];

        return response()->json($response, 200);
    }

   

}
