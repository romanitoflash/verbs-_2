<div>
    {{-- The best athlete wants his opponent at his best. --}}
    <div class="row pb-3 mt-4">
        <div class="col-lg-12 col-sm-12 ">
            <div class="float-end">
                <x-jet-danger-button wire:click="$set('open',true)">
                    Add adjetive
                </x-jet-danger-button>
            </div>           
        </div>
    </div>  
    <x-jet-dialog-modal wire:model="open">
        <x-slot name="title">  
            Add Adjetive 
        </x-slot>
        <x-slot name="content">
            <div class="mb-4">
                <x-jet-label value="Adjetive" />
                <x-jet-input type="text" class="w-full"  wire:model="Adjetivo_positivo" />
                <x-jet-input-error for="Adjetive" />  
                @error('Adjetivo_positivo') 
                    <div class="alert alert-danger mt-2" role="alert">
                        {{ $message }}
                    </div> 
                @enderror              
            </div>
            <div class="mb-4">
                <x-jet-label value="Comparative" />
                <x-jet-input type="text" class="w-full"  wire:model="Comparativo" />
                <x-jet-input-error for="Comparative" /> 
                @error('Comparativo') 
                    <div class="alert alert-danger mt-2" role="alert">
                        {{ $message }}
                    </div> 
                @enderror                 
            </div>
            <div class="mb-4">
                <x-jet-label value="Superlative" />
                <x-jet-input type="text" class="w-full"  wire:model="Superlativo" />
                <x-jet-input-error for="Superlative" /> 
                @error('Superlativo') 
                    <div class="alert alert-danger mt-2" role="alert">
                        {{ $message }}
                    </div> 
                @enderror                 
            </div>
            <div class="mb-4">
                <x-jet-label value="Meaning" />
                <x-jet-input type="text" class="w-full"  wire:model="Traduccion" />
                <x-jet-input-error for="Meaning" /> 
                @error('Traduccion') 
                    <div class="alert alert-danger mt-2" role="alert">
                        {{ $message }}
                    </div> 
                @enderror                 
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('open',false)"  >
                Cancelar
            </x-jet-secondary-button>
            <x-jet-danger-button wire:click="save()" wire:loading.attr="disabled" 
            class="disabled:opacity-50">
                Crear 
            </x-jet-danger-button> 
        </x-slot>
    </x-jet-dialog-modall>
    
    <script>
        console.log("des create");
        
        document.addEventListener('livewire:load', function () {
            Livewire.on('alertCreate', function() {
                
                Swal.fire({
                title: "Good job! Adjetive have Created correctly ",
                text: "You clicked the button!",
                icon: "success :D"
                });
             });
         });
    </script>
    

</div>
