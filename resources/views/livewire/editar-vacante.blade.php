
    
    <form action="" class="md:w-1/2 space-y-5" wire:submit.prevent='editarVacante'>

        <div>
            <x-input-label for="titulo" :value="__('Vacante')" />

            <x-text-input 
                id="titulo" 
                class="block mt-1 w-full" 
                type="text" 
                wire:model="titulo" 
                :value="old('titulo')" 
                placeholder="Titulo vacante"
            />

            <x-input-error :messages="$errors->get('titulo')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="salario" :value="__('Salario mensual')" />

            <select wire:model="salario" id="salario" class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                <option value="">-- Selecciona una opción --</option>
                
                @foreach ($salarios as $salario)
                    <option value="{{$salario->id}}">{{$salario->salario}}</option>
                @endforeach

            </select>

            <x-input-error :messages="$errors->get('salario')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="categoria" :value="__('Categoria')" />

            <select wire:model="categoria" id="categoria" class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                <option value="">-- Selecciona una opción --</option>
                @foreach ($categorias as $categoria)
                    <option value="{{$categoria->id}}">{{$categoria->categoria}}</option>
                @endforeach
            </select>

            <x-input-error :messages="$errors->get('categoria')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="empresa" :value="__('Empresa')" />

            <x-text-input 
                id="empresa" 
                class="block mt-1 w-full" 
                type="text" 
                wire:model="empresa" 
                :value="old('empresa')" 
                placeholder="Empresa: ej. Netflix, Uber, Google"
            />

            <x-input-error :messages="$errors->get('empresa')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="ultimo_dia" :value="__('Úlitmo dia para postularse')" />

            <x-text-input 
                id="ultimo_dia" 
                class="block mt-1 w-full" 
                type="date" 
                wire:model="ultimo_dia" 
                :value="old('ultimo_dia')" 
            />

            <x-input-error :messages="$errors->get('ultimo_dia')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="descripcion" :value="__('Descripción del trabajo')" />

            <textarea 
                wire:model="descripcion" 
                id="descripcion"
                class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full">

            </textarea>

            <x-input-error :messages="$errors->get('empresa')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="imagen" :value="__('Imagen')" />

            <x-text-input 
                id="imagen" 
                class="block mt-1 w-full" 
                type="file" 
                wire:model="imagen_nueva"  
                accept="image/*"
            />

            <div class="my-5 w-80">
                <x-input-label :value="__('Imagen Actual')" />

                <img src="{{asset('storage/vacantes/'.$imagen)}}" alt="{{'Imagen vacante'. $titulo}}">
            </div>

            {{-- Previsualizar la imagen --}}
            <div class="my-5 w-96">
                @if ($imagen_nueva)
                    Imagen:
                    <img src="{{ $imagen_nueva->temporaryUrl() }}">
                @endif
            </div>

            <x-input-error :messages="$errors->get('imagen_nueva')" class="mt-2" />
        </div>

        <x-primary-button>
            Guardar cambios
        </x-primary-button>


    </form>



