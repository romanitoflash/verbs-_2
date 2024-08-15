<?php

namespace App\Http\Livewire\Adjetive;

use Livewire\Component;
use App\Models\Adjetive;
use Livewire\WithPagination;

class ShowAdjetive extends Component
{
    public $adjetive;
    public $search="";
    public $sort="id_adj";
    public $direction="asc";
    public $cant=10;
    public $open_edit = false;
    use WithPagination; 
    protected $queryString= [
        
        'search'=>['except' =>'']
    ];
    protected $listeners =['render','delete'];
    protected $rules = [
        'adjetive.Adjetivo_positivo' => 'required', 
        'adjetive.Comparativo' =>'required', 
        'adjetive.Superlativo' => 'required',
        'adjetive.Traduccion' =>'required'

    ];

    public function  mount(){
        $this->adjetive = new Adjetive();
    }
    public function render()
    {   $adjetives= Adjetive::where('Adjetivo_positivo','like','%'.$this->search.'%')
        ->orderBy($this->sort,$this->direction)
        ->paginate($this->cant);
        return view('livewire.adjetive.show-adjetive', compact('adjetives'));
    }
    

    public function updatingSearch(){
        $this->resetPage();
    }
    public function delete(Adjetive $adjetive ){
        $this->search="";
        $adjetive->delete();

    }
    public function editAdjetive(Adjetive $adjetive){
        $this->adjetive = $adjetive;
        $this->open_edit = true;

    }
    public function update(){
        $this->validate();
        $this->adjetive->save();
       
        $this->open_edit = false;
        $this->emit('alertUpdate');

    }
}
