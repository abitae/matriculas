<?php

namespace App\Livewire;

use App\Models\Matricula;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Matriculados extends Component
{
    use LivewireAlert;
    public $curso;
    public function render()
    {
        $matriculas = Matricula::where('curso_id', $this->curso->id)->get();
        return view('livewire.matriculados', compact('matriculas'));
    }
    public function quitar($id)
    {
        Matricula::where('curso_id', $this->curso->id)->where('alumno_id', $id)->delete();
        $this->message('success', 'En hora buena!', 'Registro eliminado correctamente!');
    }
    private function message($tipo, $tittle, $message)
    {
        $this->alert($tipo, $tittle, [
            'position' => 'top-end',
            'timer' => 3000,
            'toast' => true,
            'text' => $message,
            'timerProgressBar' => true,
        ]);
    }
}
