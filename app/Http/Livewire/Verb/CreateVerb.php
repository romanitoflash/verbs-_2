<?php

namespace App\Http\Livewire\Verb;

use App\Models\Verb;


use Livewire\Component;


class CreateVerb extends Component
{
    
    
    public $simpler_fom,$type_verb,$third_person,$simple_past,$past_participle,$gerund,$meaning;
    protected $rules =[
        'simpler_fom' => 'required|convertirAMayusculas',
        'type_verb' => 'required|convertirAMayusculas',        
        'third_person' => 'required|convertirAMayusculas',
        'simple_past' => 'required|convertirAMayusculas',
        'past_participle' => 'required|convertirAMayusculas',
        'gerund' => 'required|convertirAMayusculas',
        'meaning' => 'required'
    ];
    protected $messages = [
        
        'convertir_a_mayusculas' => 'The Field :attribute must be uppercase',
    ];
    
    public function render()
    {
        return view('livewire.verb.create-verb');
    }
    public function refreshInputs(){
        $this->resetValidation();
        $this->simpler_fom="";
        $this->type_verb="";
        $this->third_person="";
        $this->simple_past="";
        $this->past_participle="";
        $this->gerund="";
        $this->meaning="";
        $this->emit('hideModal');

    }

    public function addVerb(){

        // Convertir los valores a mayúsculas antes de guardar
        $this->simpler_fom = strtoupper($this->simpler_fom);
        $this->type_verb = strtoupper($this->type_verb);
        $this->third_person = strtoupper($this->third_person);
        $this->simple_past = strtoupper($this->simple_past);
        $this->past_participle = strtoupper($this->past_participle);
        $this->gerund = strtoupper($this->gerund);
        $this->validate();
        Verb::create([
            'type_verb'=> $this->type_verb,
            'simpler_fom'=> $this->simpler_fom,
            'third_person'=>$this->third_person,
            'simple_past'=>$this->simple_past,	
            'past_participle'=>$this->past_participle,	
            'gerund'=>$this->gerund,	
            'meaning'=>$this->meaning
        ]);
        $this->refreshInputs();
        
        $this->emitTo('verb.show-posts','render');
        $this->emit('verbAdded');
        
        

    }
}
