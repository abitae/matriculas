<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Curso;
use Livewire\Attributes\Validate;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\On; 
class CursoForm extends Component
{
    use LivewireAlert;
    #[Validate('numeric|required|min:8|unique:cursos')]
    public $code= '';
    #[Validate('required|min:3')] 
    public $name= '';
    #[Validate('required|min:6')] 
    public $aula= '';
    #[Validate('required')] 
    public $isActive = true;
    public $modeEdit = false;
    public $id;
    public function render()
    {
        return view('livewire.curso-form');
    }
    public function save(){
        $this->validate();
        Curso::create([
            'code' => $this->code,
            'name' => $this->name,
            'aula' => $this->aula,
            'isActive' => true,
        ]);
        $this->message('success', 'En hora buena!', 'Registro eliminado correctamente!');
        $this->limpiar();
    }
    #[On('curso-update')] 
    public function update($id){
        $this->modeEdit = true;
        $this->id = $id;
        $curso = Curso::find($id);
        $this->code=$curso->code;
        $this->name=$curso->name;
        $this->aula=$curso->aula;        
    }
    #[On('curso-delete')] 
    public function delete($id){
        $curso = Curso::find($id);
        $curso->delete();
        $this->message('success', 'En hora buena!', 'Registro eliminado correctamente!');
    }
    public function updateCurso(){
        try {
            $curso = Curso::find($this->id);
            $curso->update([
            'code' => $this->code,
            'name' => $this->name,
            'aula' => $this->aula,
            'isActive' => $this->isActive,
            ]);
            $this->message('success', 'En hora buena!', 'Registro actualizado correctamente!');
            $this->limpiar();
            $this->modeEdit = false;
        } catch (\Throwable $th) {
            $this->message('error', 'Error!', 'Registro no actualizado!');
        }
    }
    public function limpiar(){
        $this->reset();
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
