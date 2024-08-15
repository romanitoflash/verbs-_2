<?php

namespace App\Http\Livewire\Verb;

use Livewire\Component;
use App\Models\Verb;
use Livewire\WithPagination;


class ShowVerb extends Component
{
    public $cant=10;
    public $direction="asc";
    public $sort="id_verb";
    public  $search="";
    public $bg="bg-danger";
    public $verb; 
    public $selectedRow = null;     
   

    use WithPagination; 

    public $formEdit=false;
    public $colorChanged = false;
    protected $queryString= [
        
        'search'=>['except' =>'']
       ];
    
    protected $rules =[
        'verb.simpler_fom' => 'required|convertirAMayusculas',
        'verb.type_verb' => 'required|convertirAMayusculas',
        'verb.simpler_fom' => 'required|convertirAMayusculas',
        'verb.third_person' => 'required|convertirAMayusculas',
        'verb.simple_past' => 'required|convertirAMayusculas',
        'verb.past_participle' => 'required|convertirAMayusculas',
        'verb.gerund' => 'required|convertirAMayusculas',
        'verb.meaning' => 'required'
    ];

    protected $messages = [
        
        'convertir_a_mayusculas' => 'The Field :attribute must be uppercase',
    ];

    protected $listeners =['render','delete'];

    public function mount(){          
        $this->verb =new Verb();
   }
    public function render()
    {
        $verbs = Verb::where('simpler_fom','like','%'.$this->search.'%')            
        ->orderBy($this->sort,$this->direction)
        ->paginate($this->cant);  

        return view('livewire.verb.show-verb', compact('verbs'));
    }
    public function resetSelectedRow()
    {
        // Restablece el estado del <td> seleccionado
        $this->selectedRow = null;
    }

    public function editVerb( Verb $verb, $index){
        $this->verb=$verb;
        $this->formEdit=true; 
        $this->selectedRow = $index;  
        $this->resetValidation(); 
       
    }
    public function updatingSearch(){
        $this->resetPage();
    }
    public function update(){
       
        
        // Convertir los valores a mayúsculas antes de guardar
        $this->verb->simpler_fom = strtoupper($this->verb->simpler_fom);
        $this->verb->type_verb = strtoupper($this->verb->type_verb);
        $this->verb->third_person = strtoupper($this->verb->third_person);
        $this->verb->simple_past = strtoupper($this->verb->simple_past);
        $this->verb->past_participle = strtoupper($this->verb->past_participle);
        $this->verb->gerund = strtoupper($this->verb->gerund);
        $this->validate();

        $this->verb->save();
        $this->reset(['formEdit']);
        $this->resetValidation();
        $this->emit('verbEdit');

    }
    public function delete( Verb $verb){
        $this->search="";
        $verb->delete();
    }
}
