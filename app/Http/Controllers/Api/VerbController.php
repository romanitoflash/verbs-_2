<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Verb;
use Illuminate\Http\Request;

use Illuminate\Database\Eloquent\ModelNotFoundException;

class VerbController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $messages = [
        
        'convertir_a_mayusculas' => 'The Field :attribute must be uppercase',
    ];
    public function index()
    {
        
        $verbs  = Verb::paginate(10);
        return [            
            "status" => 1,
            "data" => $verbs
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
            'simpler_fom' => 'required|convertirAMayusculas',
            'type_verb' => 'required|convertirAMayusculas',        
            'third_person' => 'required|convertirAMayusculas',
            'simple_past' => 'required|convertirAMayusculas',
            'past_participle' => 'required|convertirAMayusculas',
            'gerund' => 'required|convertirAMayusculas',
            'meaning' => 'required'
        ]);
 
        $verb = Verb::create($request->all());
        return [
            "status" => 1,
            "msg" => "Verb created successfully",
            "data" => $verb
        ];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Verb  $verb
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $request->validate([
            'simpler_fom' => 'required|string'
        ]);

        $simpler_fom = strtoupper($request->input('simpler_fom'));
        $results = Verb::where('simpler_fom', 'like', '%' . $simpler_fom . '%')->get();

        return [
            "status" => 1,
            "data" => $results
        ];
    }
    
    public function show($verb)
    {
        //

        $existingVerb = Verb::find($verb);
        if (is_object($existingVerb)) {
          /// $existingVerb->delete();
            return [
                "status" => 1,
                
                "data" => $existingVerb
            ];
        } else {
            return [
                "status" => 0,
                "msg" => "Error: Verb not found show verb"
            ];
        }   


        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Verb  $verb
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $verb)
    {
        //
        $existingVerb = Verb::find($verb);
        if (is_object($existingVerb)) {
            $request->validate([
                'simpler_fom' => 'required|convertirAMayusculas',
                'type_verb' => 'required|convertirAMayusculas',        
                'third_person' => 'required|convertirAMayusculas',
                'simple_past' => 'required|convertirAMayusculas',
                'past_participle' => 'required|convertirAMayusculas',
                'gerund' => 'required|convertirAMayusculas',
                'meaning' => 'required'
            ]);
     
            $existingVerb->update($request->all());
     
            return [
                "status" => 1,
                "data" => $existingVerb,
                "msg" => "Verb updated successfully"
            ];
        } else {

            return [
                "status" => 0,                
                "msg" => "Error: Failed to updated successfull"
            ];
        }
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Verb  $verb
     * @return \Illuminate\Http\Response
     */
    public function destroy($verb)
    {           

        $existingVerb = Verb::find($verb);
        if (is_object($existingVerb)) {
           $existingVerb->delete();
            return [
                "status" => 1,
                "msg" => "Verb deleted successfully ".$existingVerb
            ];
        } else {
            return [
                "status" => 0,
                "msg" => "Error: Failed to delete the verb"
            ];
        }       
       
    }

     
}
