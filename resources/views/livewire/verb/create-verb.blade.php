<div> 
    {{-- Be like water. --}}
    <div class="row pt-4 ">
        <div class="col-lg-12 float-end mb-3 ">
            <div class="float-end">
                
              <button type="button" class="btn btn-lg btn-info text-white" data-bs-toggle="modal" data-bs-target="#ModalInsert" >Add Verb</button>
            </div>            
        </div>
    </div>

    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="ModalInsert" tabindex="-1"   data-bs-backdrop="static" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-2 fw-bold " id="exampleModalLabel">Add Verb</h1>                
              </div>
              <div class="modal-body">
                  <div class="row">
                      <div class="col">
                          <label for="simpler_fom_c" class="form-label">Simple Form</label>
                          <x-jet-input type="text" id="simpler_fom_create"  class="form-control text-uppercase " wire:model="simpler_fom"  />
                          @error('simpler_fom') 
                                <div class="alert alert-danger mt-2" role="alert">
                                    {{ $message }}
                                </div> 
                          @enderror
                      </div>
                      <div class="col">
                        <label for="type_verb_c" class="form-label">Type</label>                  
                        <select class="form-select form-select-lg mb-3 text-uppercase"   wire:model="type_verb" >
                          <option >Select type verb</option>
                          <option value="I">Irregular</option>
                          <option    value="R" >Regular</option>                    
                        </select>
                        @error('type_verb') 
                              <div class="alert alert-danger mt-2" role="alert">
                                  {{ $message }}
                              </div> 
                        @enderror
                      
                      </div>
                      <div class="col">
                          <label for="third_person_c" class="form-label">Third Person</label>                    
                          <x-jet-input type="text" id="third_person_create" wire:model="third_person"   class="form-control text-uppercase" />
                          @error('third_person') 
                                  <div class="alert alert-danger mt-2" role="alert">
                                      {{ $message }}
                                  </div> 
                          @enderror
                      </div>
                  </div>
                  <div class="row pt-4 mb-1">
                      <div class="col">
                        <label for="simple_past_c" class="form-label">Simple Past</label>
                        <x-jet-input type="text"  id="simple_past_create" wire:model="simple_past"  class="form-control text-uppercase" />
                        @error('simple_past') 
                                  <div class="alert alert-danger mt-2" role="alert">
                                      {{ $message }}
                                  </div> 
                        @enderror
                    
                      </div>
                      <div class="col">
                        <label for="past_participle_c" class="form-label">Past Participle</label>
                        <x-jet-input type="text" id="past_participle_create"   wire:model="past_participle" @keyup="convertirMayusculas_create($event.target.value,$event.target.id)" class="form-control text-uppercase" />
                        @error('past_participle') 
                                  <div class="alert alert-danger mt-2" role="alert">
                                      {{ $message }}
                                  </div> 
                          @enderror
                      </div>
                      <div class="col">
                        <label for="gerund_c" class="form-label">Gerund</label>
                        <x-jet-input type="text" id="gerund_create"  wire:model="gerund"    class="form-control text-uppercase" />
                        @error('gerund') 
                            <div class="alert alert-danger mt-2" role="alert">
                                {{ $message }}
                            </div> 
                        @enderror
                      </div>
                      <div class="col">
                        <label for="meaning_c" class="form-label">Meaning</label>
                        <x-jet-input type="text"  wire:model="meaning"  class="form-control" />
                        @error('meaning') 
                              <div class="alert alert-danger mt-2" role="alert">
                                  {{ $message }}
                              </div> 
                          @enderror
                      </div>
                  </div>          
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" wire:click="refreshInputs()" >Close</button>              
                <input type="button"  wire:click="addVerb" wire:loading.attr="disabled" class=" disabled:btn-outline-secondary  btn btn-info text-white fw-bold" value="Save">

              </div>
            </div>
          </div>      
    </div>
    
      <script>
           document.addEventListener('livewire:load', function () {
            Livewire.on('hideModal', function () {
                // Cerrar el modal
                var modal = document.getElementById('ModalInsert');
                var modalInstance = bootstrap.Modal.getInstance(modal);
                if (modalInstance) {
                    modalInstance.hide();
                }
            });
            Livewire.on('verbAdded', function () {
                // Muestra la alerta SweetAlert
                Swal.fire({
                    title: 'Good job!',
                    text: 'Verb had been added correctly',
                    icon: 'success',
                    confirmButtonText: 'Accept'
                });
            });
        });        
      </script>
   
</div>
