<div>
    {{-- The Master doesn't talk, he acts. --}}
    <div class="container">
        <div class="row pt-5 pb-4 ">
          <div class="col-lg-12 border-bottom">
            <h1 class="text-center fs-1 fw-bold"> List Verbs regular and irregular.</h1>
          </div>
        </div>
    </div>
    <div class="container pt-2 mb-4">
        <div class="row">
            <div class="col-lg-12 ">
                <x-jet-input type="text" class="form w-100" placeholder="search verb " wire:model="search" /> 
            </div>
        </div>
    </div>
    <div class=" container pt-3 pb-5 mb-3">
       
        @if (count($verbs))
         <table class="table table-striped">
            <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Type</th>
                  <th scope="col">Simple Form</th>
                  <th scope="col">Meaning</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
              
                @foreach ($verbs as $item)
                <tr>
                    <th scope="row">{{ $item->id_verb  }}</th>
                    <td>{{ $item->type_verb }}</td>
                    <td>{{ $item->simpler_fom }}</td>
                    <td>{{ $item->meaning }}</td>
                    <td> 
                        <a  class="btn btn-outline-danger" wire:click="viewVerb ( {{ $item }} )"> 
                         View
                        </a> 
                    </td>
                  </tr>
                    
                @endforeach
              </tbody>
             
         </table>
         @if ($verbs->hasPages())
                <div class="col-12">
                {{$verbs->links()}}
                </div>
            @endif
        @else 
            no hay registros
        @endif

    </div>

    <x-jet-dialog-modal wire:model="open_edit">
        <x-slot name="title">
            <h2 class="fs-4  fw-bold" >Verb: {{ $verb['simpler_fom'] }}    </h2>
        </x-slot>
        <x-slot name="content">
            <div class="card">
                <div class="card-body">               
                   <ul class="list-group list-group-flush">
                        <li class="list-group-item "> <strong class="text-uppercase"> Simple Form : {{ $verb['simpler_fom'] }}   </strong> </li>
                        <li class="list-group-item"><strong class="text-uppercase"> Type :  {{ $verb['type_verb'] }} </strong></li>
                        <li class="list-group-item"><strong class="text-uppercase"> THIRD PERSON:  {{ $verb['third_person'] }}  </strong></li>
                        <li class="list-group-item"><strong class="text-uppercase"> Simple past :  {{ $verb['simple_past'] }}  </strong></li>
                        <li class="list-group-item"> <strong class="text-uppercase"> Past Participle:  {{ $verb['past_participle'] }}  </strong> </li>
                        <li class="list-group-item"> <strong class="text-uppercase"> Gerund:  {{ $verb['gerund'] }}  </strong> </li>
                        <li class="list-group-item"> <strong class="text-uppercase"> Meaning:   {{ $verb['meaning'] }}  </strong> </li>
                    </ul>
                </div>
              </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-danger-button wire:click="$set('open_edit',false)"  wire:confirm="Are you sure you want to delete this post?">
                Cerrar
            </x-jet-danger-button>
        </x-slot>

     </x-jet-dialog-modal>
     
</div>
