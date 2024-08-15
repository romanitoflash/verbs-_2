<?php

namespace App\Http\Livewire\Adjetive;

use App\Models\Adjetive;
use Livewire\Component;


class CreateAdjetive extends Component
{
    public $open=false;
    public $show = false;
    public $Adjetivo_positivo, $Comparativo, $Superlativo, $Traduccion;

    protected $rules = [
        'Adjetivo_positivo' => 'required', 
        'Comparativo' =>'required', 
        'Superlativo' => 'required',
        'Traduccion' =>'required'

    ];
    public function render()
    {
        return view('livewire.adjetive.create-adjetive');
    }
    public function save (){
        $this->validate();
        Adjetive::create([
            'Adjetivo_positivo' =>$this->Adjetivo_positivo,
            'Comparativo' =>$this->Comparativo,
            'Superlativo' =>$this->Superlativo,
            'Traduccion' => $this->Traduccion

        ]);
        $this->reset([

            'Adjetivo_positivo','Comparativo','Superlativo','Traduccion'

        ]);
        $this->emitTo('adjetive.show-adjetive','render');
        $this->open=false; 
         
        $this->emit('alertCreate');
       
    }
    public function updatingOpen(){

        if($this->open===false){
            $this->reset([

                'Adjetivo_positivo','Comparativo','Superlativo','Traduccion'
    
            ]);
        }
    }

    
    
}
