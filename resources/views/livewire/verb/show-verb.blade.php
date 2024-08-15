<div>
    {{-- Care about people's approval and you will be their prisoner. --}}
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="text-center h1 fw-bold"> List Verbs.</h1>
            </div>
        </div>
        
    </div>
    @can('create articles')
        @livewire('verb.create-verb')
     @endcan
    @if ($formEdit)
        <div class="container pt-5 mb-5">            
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="h4 fw-bold text-center">Editar Verb.</h4>
                </div>
            </div>
            
            <div class="row">
                <div class="col">
                    <label for="exampleInputEmail1" class="form-label">Simple Form</label>
                    <x-jet-input type="text" id="simpler_fom"   class="form-control text-uppercase"  wire:model="verb.simpler_fom"  />
                    @error('verb.simpler_fom') 
                        <div class="alert alert-danger mt-2" role="alert">
                            {{ $message }}
                        </div> 
                    @enderror

                </div>
                <div class="col">
                  <label for="exampleInputEmail1" class="form-label">Type</label>                  
                  <select class="form-select form-select-lg mb-3"   wire:model="verb.type_verb">
                    <option >Select type verb</option>
                    <option @if ($verb['type_verb']=='I') selected @endif value="I">Irregular</option>
                    <option  @if ($verb['type_verb']=='R') selected @endif  value="R" >Regular</option>                    
                  </select>
                  @error('verb.type_verb') 
                        <div class="alert alert-danger mt-2" role="alert">
                            {{ $message }}
                        </div> 
                    @enderror
                </div>
                <div class="col">
                    <label for="exampleInputEmail1" class="form-label">Third Person</label>                    
                    <x-jet-input type="text" id="third_person" wire:model="verb.third_person"  class="form-control text-uppercase" />
                    @error('verb.third_person') 
                        <div class="alert alert-danger mt-2" role="alert">
                            {{ $message }}
                        </div> 
                    @enderror
                </div>
            </div>
            <div class="row pt-4 mb-1">
                <div class="col">
                   <label for="exampleInputEmail1" class="form-label">Simple Past</label>
                   <x-jet-input type="text"  id="simple_past"  wire:model="verb.simple_past" class="form-control text-uppercase " />
                   @error('verb.simple_past') 
                        <div class="alert alert-danger mt-2" role="alert">
                            {{ $message }}
                        </div> 
                    @enderror
                </div>
                <div class="col">
                   <label for="exampleInputEmail1" class="form-label">Past Participle</label>
                   <x-jet-input type="text" id="past_participle"  wire:model="verb.past_participle" class="form-control text-uppercase" />
                   @error('verb.past_participle') 
                        <div class="alert alert-danger mt-2" role="alert">
                            {{ $message }}
                        </div> 
                    @enderror
                </div>
                <div class="col">
                   <label for="exampleInputEmail1" class="form-label">Gerund</label>
                   <x-jet-input type="text" id="gerund"    wire:model="verb.gerund" class="form-control text-uppercase" />
                   @error('verb.gerund') 
                        <div class="alert alert-danger mt-2" role="alert">
                            {{ $message }}
                        </div> 
                    @enderror
                </div>
                <div class="col">
                   <label for="exampleInputEmail1" class="form-label">Meaning</label>
                   <x-jet-input type="text"  wire:model="verb.meaning" class="form-control" />
                   @error('verb.meaning') 
                        <div class="alert alert-danger mt-2" role="alert">
                            {{ $message }}
                        </div> 
                    @enderror
                </div>
            </div>
            <div class="row pt-4 mb-2" >
                <div class="col-6">
                     <input type="button"  wire:click="update" wire:loading.attr="disabled" class=" disabled:btn-outline-secondary form-control btn btn-info btn-lg text-white fw-bold" value="Save">

                </div>
                <div class="col-6">
                    <input type="button"  value="Cancel"  wire:click="$set('formEdit',false)" class="form-control btn btn-danger btn-lg text-white fw-bold ">
                 </div>
            </div>
        </div>      
    @endif
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="mb-3">
                     <x-jet-input type="text" class=" mr-3 form-control text-uppercase" placeholder="Search verb" wire:model="search" />
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                @if (count($verbs))
                <table class="table table-striped">
                    <thead class="table-dark text-uppercase">
                            <tr>
                                 <th>#</th>
                                 <th> Type</th>
                                 <th> Simple form</th>
                                 <th> Third person </th>
                                 <th> simple past</th>
                                 <th> past participle</th>
                                 <th>gerund</th>
                                 <th> meaning</th>
                                 <th></th>
                            </tr>
                    </thead>
                    @foreach ($verbs as $index => $item)
                     <tr>
                         <td id="td_{{ $loop->index }}" class="{{ $selectedRow === $index ? $bg : '' }}">{{ $item->id_verb }}</td>
                         <td >{{ $item->type_verb }}</td>
                         <td >{{ $item->simpler_fom }}</td>
                         <td >{{ $item->third_person }}</td>
                         <td >{{ $item->simple_past }}</td>
                         <td >{{ $item->past_participle }}</td>
                         <td >{{ $item->gerund }}</td>
                         <td >{{ $item->meaning }}</td>
                         <td >
                            @can('edit articles')
                                <a class=" btn text-danger " wire:click="editVerb({{ $item }} , {{ $index }})">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                            @endcan
                            @can('delete articles')
                            <a class=" btn text-warning" wire:click="$emit('deleteVerb',{{$item->id_verb }})">
                                <i class="fa-solid fa-trash"></i>
                            </a>
                            @endcan
                         </td>
                     </tr>                        
                    @endforeach
                </table> 
                @if ($verbs->hasPages())
                    <div class="col-12"  id="pagination-links" >
                    {{$verbs->links()}}
                    </div>
                @endif                   
                @else
                    <h4 class="text-center h4 fw-bold"> Sin resultados. </h4>
                @endif
            </div>
        </div>
    </div> 
    <script>
        // Tu código JavaScript aquí
       
    </script>
    
  
    
     <!--- codigo para eliminar verb -->
     <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        
        // Ejecuta el script después de que el contenido DOM haya sido cargado completamente
        document.addEventListener('livewire:load', function () {
            // Obtiene el índice del <td> seleccionado almacenado en la propiedad de Livewire
            var selectedRow = @json($selectedRow);
    
            // Si hay un <td> seleccionado, aplica la clase a ese <td>
            if (selectedRow !== null) {
                var td = document.getElementById('td_' + selectedRow);
                
                td.classList.add('{{ $bg }}');
            }
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Obtén los enlaces de paginación
            var paginationLinks = document.getElementById('pagination-links').getElementsByTagName('a');
    
            // Agrega un evento de clic a cada enlace de paginación
            for (var i = 0; i < paginationLinks.length; i++) {
                paginationLinks[i].addEventListener('click', function (event) {
                    // Evita la acción predeterminada del enlace
                    event.preventDefault();
    
                    // Limpia el estado del <td> seleccionado usando Livewire
                    Livewire.emit('resetSelectedRow');
                    console.log("vamos  en el for ");
                });
            }
            Livewire.on('deleteVerb',verbId =>{
                Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    console.log('vammos bien en delete');
               if (result.isConfirmed) {
                    Livewire.emitTo('verb.show-verb','delete',verbId );
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
