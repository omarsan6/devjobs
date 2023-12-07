<?php

namespace App\Livewire;

use App\Models\Vacante;
use Livewire\Component;

class MostrarVacantes extends Component
{

    protected $listeners = ['eliminarVacante'];

    //debe ser el mismo nombre de la variable
    public function eliminarVacante(Vacante $vacante_id)
    {
        $vacante_id->delete();
    }

    public function render()
    {
        //obtener las vacantes creadas por el usuario
        $vacantes = Vacante::where('user_id',auth()->user()->id)->paginate(10);

        return view('livewire.mostrar-vacantes',[
            'vacantes' => $vacantes,
        ]);
    }
}
