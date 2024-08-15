<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Verb;
use Livewire\WithPagination;

  
class ShowVerb extends Component
{
   
    public $sort="id_verb";
    public $search='';
   public $direction="asc";
   public $cant ='10';
   public $open_edit = false;
   public $verb;
   use WithPagination;
   protected $listeners =['render','tabChanged2'];
   protected $queryString=[ 
    'search'=>['except' =>'']
    ];

    public function tabChanged2()
    {
        // Coloca aquí cualquier lógica que necesites ejecutar al cambiar de pestaña
    
        // Llama al método refresh para forzar una actualización del componente
        
        $this->search="";
        $this->resetPage();
        //$this->updatingSearch();
    }
   
   /// metodo mount es muy importante aqui inicio el objeto verbo para poder mandarlo al  view 
    public function mount(){       

         $this->verb =new Verb();

    }
    public function updatingSearch(){
        $this->resetPage();
    }
    public function render()
    {
        
        $verbs = Verb::where('simpler_fom','like','%'.$this->search.'%')            
        ->orderBy($this->sort,$this->direction)
        ->paginate($this->cant);        
        return view('livewire.show-verb',compact('verbs'));
    }
    /// metodo para ver el detalle del verbo 
    public function viewVerb(Verb $verb){
        $this->verb = $verb;        
        $this->open_edit = true;
        

    }
}
