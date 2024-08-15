<?php

namespace App\Http\Livewire;

use App\Models\Adjetive;
use Livewire\Component;
use Livewire\WithPagination;




class ShowAdjective extends Component

{
    public $sort="id_adj";
    public $search='';
    public $direction="asc";
    public $cant ='10';
    public $open_edit = false;
    public $adj;
   use WithPagination;
   protected $listeners =['render','tabChanged'];
   protected $queryString=[ 
    'search'=>['except' =>'']
    ];

    public function tabChanged()
    {
        // Coloca aquí cualquier lógica que necesites ejecutar al cambiar de pestaña

        // Llama al método refresh para forzar una actualización del componente
        $this->search="";

        $this->resetPage();
    }
    public function mount(){

        $this->adj= new Adjetive();
    }
    /// funcion para redenrizar la página cada vez que busca algo
    public function updatingSearch(){
        $this->resetPage();
    }
    public function render()
    {
        $adjs = Adjetive::where('Adjetivo_positivo','like','%'.$this->search.'%')
        ->orderBy($this->sort,$this->direction)
        ->paginate($this->cant); 
        return view('livewire.show-adjective', compact('adjs'));
    }
    public function viewAdj(Adjetive $adj){
        $this->adj= $adj;
        $this->open_edit=true;

    }
}
