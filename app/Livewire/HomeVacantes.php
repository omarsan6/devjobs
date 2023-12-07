<?php

namespace App\Livewire;

use App\Models\Vacante;
use Livewire\Component;

class HomeVacantes extends Component
{

    public $termino;

    public $categoria;

    public $salario;

    //escucha la accion/evento y manda a llamar a la función
    protected $listeners = [
        'terminosBusqueda' => 'buscar'
    ];

    public function buscar($termino, $categoria, $salario)
    {
        $this->termino = $termino;
        $this->categoria = $categoria;
        $this->salario = $salario;
    }

    public function render()
    {

        //$vacantes = Vacante::all();

        //cuando termino ternga un valor ejecuta la función
        $vacantes = Vacante::when($this->termino, function($query){
            $query->where('titulo', 'LIKE', "%".$this->termino."%");
        })
        ->when($this->termino,function($query){
            $query->orWhere('empresa','LIKE',"%".$this->termino."%");
        })
        ->when($this->categoria,function($query){
            $query->where('categoria_id',$this->categoria);
        })
        ->when($this->salario,function($query){
            $query->where('salario_id',$this->salario);
        })
        ->paginate(5);

        return view('livewire.home-vacantes', [
            'vacantes' => $vacantes
        ]);
    }
}
