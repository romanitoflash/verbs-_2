<div>
    {{-- In work, do what you enjoy. --}}
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="text-center h1 fw-bold"> List Adjetives.</h1>
            </div>
        </div>        
    </div>
    @can('create articles')
        @livewire('adjetive.create-adjetive')
    @endcan

    <div class="container">
        <div class="row pb-3">
            <div class="col-lg-12">
                <div class="mb-3">
                     <x-jet-input type="text" class=" mr-3 form-control text-uppercase" placeholder="Search Adjetive" wire:model="search" />
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-lg-12">
               
                @if(count($adjetives))
                 <table class="table table-striped">
                    <thead class="table-dark text-uppercase">
                        <tr>
                            <th>#</th>
                            <th>Positive Adejtive</th>
                            <th>Comparative</th>
                            <th>Superlative</th>
                            <th>Meaning</th>
                            <th></th>
                        </tr>
                    </thead>
                    @foreach ($adjetives as $index => $item ) 
                     <tr>
                         <td>{{$item->id_adj }}</td>
                         <td>{{$item->Adjetivo_positivo }}</td>
                         <td>{{$item->Comparativo }}</td>
                         <td>{{$item->Superlativo }}</td>
                         <td>{{$item->Traduccion }}</td>
                         <td>
                            @can('delete articles')
                                <a class="btn text-warning" wire:click="$emit('deleteAdjetive',{{$item->id_adj }})">
                                    <i class="fa-solid fa-trash"></i>
                                </a>
                            @endcan
                            @can('edit articles')
                                <a class="btn btn-green" wire:click="editAdjetive({{ $item }})">
                                    <i class="fas fa-edit"></i>
                                </a>
                            @endcan
                         </td>
                     </tr>                        
                    @endforeach
                 </table>
                  @if ($adjetives->hasPages())
                    <div class="col-12"  id="pagination-links" >
                        {{$adjetives->links()}}
                    </div>
                  @endif                    
                @else
                     <h4 class="text-center h4 fw-bold"> Sin resultados. </h4>
                @endif
            </div>
        </div>
    </div>
    
    <x-jet-dialog-modal wire:model="open_edit">
        <x-slot name="title">  
            Edit Adjetive             
        </x-slot>
        <x-slot name="content">
            <div class="mb-4">
                <x-jet-label value="Adjetive" />
                <x-jet-input type="text" class="w-full"  wire:model="adjetive.Adjetivo_positivo" />
                @error('adjetive.Adjetivo_positivo') 
                    <div class="alert alert-danger mt-2" role="alert">
                        {{ $message }}
                    </div> 
                @enderror
                               
            </div>
            <div class="mb-4">
                <x-jet-label value="Comparative" />
                <x-jet-input type="text" class="w-full"  wire:model="adjetive.Comparativo" />
                @error('adjetive.Comparativo') 
                    <div class="alert alert-danger mt-2" role="alert">
                        {{ $message }}
                    </div> 
                @enderror
                              
            </div>
            <div class="mb-4">
                <x-jet-label value="Superlative" />
                <x-jet-input type="text" class="w-full"  wire:model="adjetive.Superlativo" />
                @error('adjetive.Superlativo') 
                    <div class="alert alert-danger mt-2" role="alert">
                        {{ $message }}
                    </div> 
                @enderror
                             
            </div>
            <div class="mb-4">
                <x-jet-label value="Meaning" />
                <x-jet-input type="text" class="w-full"  wire:model="adjetive.Traduccion" />
                @error('adjetive.Traduccion') 
                    <div class="alert alert-danger mt-2" role="alert">
                        {{ $message }}
                    </div> 
                @enderror
                                
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('open_edit',false)">
                Cancelar
            </x-jet-secondary-button>
            <x-jet-danger-button wire:click="update" wire:loading.attr="disabled" class="disabled:opacity-25">
                Actualizar
            </x-jet-danger-button>
        </x-slot>
  </x-jet-dialog-modall>
    
     <!--- codigo para eliminar adjetive  -->
     <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
     <script>
        document.addEventListener('DOMContentLoaded', function () {

            Livewire.on('verbEdit', function() {
                
                Swal.fire({
                title: "Good job!",
                text: "You clicked the button!",
                icon: "success"
                });
             });
             Livewire.on('alertUpdate', function() {
                
                Swal.fire({
                title: "Good job!",
                text: "You clicked the button!",
                icon: "success"
                });
             });
            Livewire.on('deleteAdjetive',adjId =>{
                Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    console.log('vammos bien en delete adj');
               if (result.isConfirmed) {
                    Livewire.emitTo('adjetive.show-adjetive','delete',adjId );
                    Swal.fire({
                    title: "Deleted!",
                    text: "Your file has been deleted.",
                    icon: "success"
                    });
                }
            })
        });

        });
     </script>    
</div>
