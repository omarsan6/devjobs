<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

    @forelse ($vacantes as $vacante)
    <div class="p-6 text-gray-900 md:flex md:justify-between md:items-center">
        <div class="leading-10">
            <a href="{{route('vacantes.show', $vacante->id)}}" class="text-xl font-bold">
                {{$vacante->titulo}}
            </a>

            <p class="text-sm text-gray-600 font-bold">
                {{$vacante->empresa}}
            </p>

            <p class="text-sm text-gray-500">Último dia: {{ $vacante->ultimo_dia->format('d/m/Y') }}</p>

        </div>

        <div class="flex flex-col items-stretch gap-3 mt-5 md:mt-0 md:flex-row">
            <a href="{{route('candidatos.index',$vacante)}}" class="bg-slate-800 py-2 px-4 rounded-lg text-white text-xs 
                font-bold uppercase text-center">
                {{$vacante->candidato->count()}}
                Candidatos
            </a>

            <a href="{{route('vacantes.edit',$vacante->id)}}" class="bg-blue-600 py-2 px-4 rounded-lg text-white text-xs 
                font-bold uppercase text-center">
                Editar
            </a>

            <button wire:click="$dispatch('mostrarAlerta',{{$vacante->id}})" class="bg-red-600 py-2 px-4 rounded-lg text-white text-xs 
                font-bold uppercase text-center">
                Eliminar
            </button>
        </div>
    </div>
    @empty
    <p class="p-3 text-center text-sm text-gray-800">No hay vacantes que mostrar</p>
    @endforelse

    <div class="flex justify-center my-10">
        {{$vacantes->links()}}
    </div>

    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        Livewire.on('mostrarAlerta', vacanteId => {

            Swal.fire({
                title: "¿Eliminar vacante?",
                text: "Una vacante eliminada no se puede eliminar",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Si, eliminar",
                cancelButtonText: "Cancelar"
            }).then((result) => {
                if (result.isConfirmed) {

                    //eliminar vacante
                    Livewire.dispatch('eliminarVacante',{vacante_id:vacanteId});

                    Swal.fire({
                        title: "Eliminado",
                        text: "La vacante ha sido eliminada",
                        icon: "success"
                    });
                }
            });
        })

            
    </script>
    @endpush

</div>