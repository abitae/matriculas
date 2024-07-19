<?php

namespace App\Livewire;

use App\Models\Matricula;
use Livewire\Attributes\On;
use Livewire\Component;

class AlumnoMatricula extends Component
{
    public $matriculas;
    public function render()
    {
        return view('livewire.alumno-matricula');
    }
    #[On('alumno-matricula')]
    public function update($id)
    {
        $this->matriculas = Matricula::where('alumno_id', $id)->get();
    }
}
