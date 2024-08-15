<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    <div class="container">
        <div class="row pt-5 pb-4 ">
          <div class="col-lg-12 border-bottom">
            <h1 class="text-center fs-1 fw-bold"> List Adjetives.</h1>
          </div>
        </div>
    </div>
    <div class="container pt-2 mb-4">
        <div class="row">
            <div class="col-lg-12 ">
                <x-jet-input type="text" class="form w-100" placeholder="search adjetive " wire:model="search" /> 
            </div>
        </div>
    </div>
    <div class="container pt-3 mb-4">
        @if (count($adjs))
        <table class="table table-striped">
            <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Adjetive</th>
                  <th scope="col">Meaning</th>
                  <th scope="col"></th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                 @foreach ($adjs as $item)
                 <tr>
                     <td>{{$item ->id_adj }}</td>
                     <td>{{$item ->Adjetivo_positivo }}</td>
                     <td>{{$item ->Traduccion }}</td>
                     <td>
                        <a  class="btn btn-outline-danger" wire:click="viewAdj ( {{ $item }} )"> 
                            View
                           </a> 
                     </td>
                 </tr>                     
                 @endforeach
              </tbody>
        </table>
            @if ($adjs->hasPages())
                <div class="col-lg-12">
                    {{ $adjs->links()}} 
                </div>            
            @endif            
        @else
         no hay registros
        @endif

    </div>
    <x-jet-dialog-modal wire:model="open_edit">
        <x-slot name="title">
            <h2 class="fs-4  fw-bold" >Adjetive: {{ $adj['Adjetivo_positivo'] }}    </h2>
        </x-slot>
        <x-slot name="content">
            <div class="card">
                <div class="card-body">               
                   <ul class="list-group list-group-flush">
                        <li class="list-group-item "> <strong class="text-uppercase"> Comparativo: {{ $adj['Comparativo'] }}   </strong> </li>
                        <li class="list-group-item"><strong class="text-uppercase"> Superlativo :  {{ $adj['Superlativo'] }} </strong></li>
                        <li class="list-group-item"><strong class="text-uppercase"> Traducción:  {{ $adj['Traduccion'] }}  </strong></li>
                        
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
