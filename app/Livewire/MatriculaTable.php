<?php

namespace App\Livewire;

use App\Models\Alumno;
use App\Models\Matricula;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class MatriculaTable extends Component
{
    use LivewireAlert;
    use WithPagination, WithoutUrlPagination;
    public $search = '';
    public $curso;
    public function render()
    {
        $alumnos = Alumno::latest()->Where('code', 'LIKE', '%' . $this->search . '%')
            ->orWhere('full_name', 'LIKE', '%' . $this->search . '%')
            ->simplePaginate(5);
        return view('livewire.matricula-table', compact('alumnos'));
    }
    public function update($id)
    {
        $matricula = Matricula::firstOrCreate(
            ['alumno_id' => $id, 'curso_id' => $this->curso->id]
        );
        $this->message('success', 'En hora buena!', 'Matriculado correctamente!');
    }
    public function updatedSearch($value)
    {
        $this->resetPage();
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
