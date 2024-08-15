<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Adjetive;
use Illuminate\Http\Request;

class AdjetiveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $adjetives  = Adjetive::paginate(10);
        return [            
            "status" => 1,
            "data" => $adjetives
        ];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'Adjetivo_positivo' => 'required',
            'Comparativo' => 'required',        
            'Superlativo' => 'required',
            'Traduccion' => 'required'
            
        ]);
 
        $adjetive = Adjetive::create($request->all());
        return [
            "status" => 1,
            "msg" => "Adjetive created successfully",
            "data" => $adjetive
        ];
    }
     public function search(Request $request)
    {
        $request->validate([
            'adjetivo_positivo' => 'required|string' 
        ]); 

        $Adjetivo_positivo = $request->input('adjetivo_positivo'); 
        $results = Adjetive::where('Adjetivo_positivo', 'like', '%' .$Adjetivo_positivo. '%')->get();

        return [
            "status" => 1,
            "data" => $results
        ];
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Adjetive  $adjetive
     * @return \Illuminate\Http\Response
     */
    public function show( $adjetive)
    {
       
        $existingAdjetive = Adjetive::find($adjetive);
        if (is_object($existingAdjetive)) {
          /// $existingVerb->delete();
            return [
                "status" => 1,
                
                "data" => $existingAdjetive
            ];
        } else {
            return [
                "status" => 0,
                "msg" => "Error: Adjetive not found"
            ];
        }   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Adjetive  $adjetive
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $adjetive)
    {
        //
        $existingAdejtive = Adjetive::find($adjetive);
        if (is_object($existingAdejtive)) {
            # code...
            $request->validate([
                'Adjetivo_positivo' => 'required',
                'Comparativo' => 'required',        
                'Superlativo' => 'required',
                'Traduccion' => 'required'
                
            ]); 
     
            $existingAdejtive->update($request->all());
            return [
                "status" => 1,
                "msg" => "Adjetive updated successfully",
                "data" => $existingAdejtive
            ];
        } else {
            return [
                "status" => 0,
                "msg" => " Error: Failed to updated successfully"                
            ];
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Adjetive  $adjetive
     * @return \Illuminate\Http\Response
     */
    public function destroy($adjetive)
    {
        $existingAdejtive = Adjetive::find($adjetive);
        if (is_object($existingAdejtive)) {
           $existingAdejtive->delete();
            return [
                "status" => 1,
                "msg" => "Adjetive deleted successfully ".$existingAdejtive
            ];
        } else {
            return [
                "status" => 0,
                "msg" => "Error: Failed to delete the adjetive"
            ];
        }       
       
    }
}
