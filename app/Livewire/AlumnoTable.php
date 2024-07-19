<?php

namespace App\Livewire;

use App\Exports\AlumnosExport;
use Livewire\Component;
use App\Models\Alumno;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;

class AlumnoTable extends Component
{
    use WithPagination, WithoutUrlPagination;
    public $search = '';
    public function render()
    {
        $alumnos = Alumno::latest()->Where('code', 'LIKE', '%' . $this->search . '%')
                            ->orWhere('full_name', 'LIKE', '%' . $this->search . '%')
                            ->simplePaginate(5);
        return view('livewire.alumno-table',compact('alumnos'));
    }
    public function update($id){
        $this->dispatch('alumno-update', id: $id);
        $this->dispatch('alumno-matricula', id: $id);
    }
    public function delete($id){
        $this->dispatch('alumno-delete', id: $id);
    }
    public function updatedSearch($value)
    {
        $this->resetPage();
    }
    public function exportar(){
        return Excel::download(new AlumnosExport, 'alumnos.xlsx');
    }
}
