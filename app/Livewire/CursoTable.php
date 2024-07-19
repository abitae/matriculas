<?php

namespace App\Livewire;

use App\Exports\CursosExport;
use App\Models\Curso;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;

class CursoTable extends Component
{
    use LivewireAlert;
    use WithPagination, WithoutUrlPagination;
    public $search = '';
    public function render()
    {
        $cursos = Curso::latest()->Where('code', 'LIKE', '%' . $this->search . '%')
            ->orWhere('name', 'LIKE', '%' . $this->search . '%')
            ->simplePaginate(5);
        return view('livewire.curso-table', compact('cursos'));
    }
    public function update($id)
    {
        $this->dispatch('curso-update', id: $id);
    }
    public function delete($id)
    {
        $this->dispatch('curso-delete', id: $id);
    }
    public function updatedSearch($value)
    {
        $this->resetPage();
    }
    public function exportar(){
        return Excel::download(new CursosExport, 'cursos.xlsx');
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
