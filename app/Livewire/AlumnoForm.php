<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Alumno;
use Livewire\Attributes\Validate;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\On; 
class AlumnoForm extends Component
{
    use LivewireAlert;
    #[Validate('numeric|required|min:8|unique:alumnos')]
    public $code= '';
    #[Validate('required|min:3')] 
    public $full_name= '';
    #[Validate('required|min:6|email')] 
    public $email= '';
    #[Validate('required|min:3')] 
    public $address= '';
    #[Validate('required')] 
    public $isActive = true;
    public $modeEdit = false;
    public $id;
    public function render()
    {
        return view('livewire.alumno-form');
    }
    public function save(){
        $this->validate();
        Alumno::create([
            'code' => $this->code,
            'full_name' => $this->full_name,
            'email' => $this->email,
            'address' => $this->address,
            'isActive' => true,
        ]);
        $this->message('success', 'En hora buena!', 'Registro eliminado correctamente!');
        $this->limpiar();
    }
    #[On('alumno-update')] 
    public function update($id){
        $this->modeEdit = true;
        $this->id = $id;
        $alumno = Alumno::find($id);
        $this->code=$alumno->code;
        $this->full_name=$alumno->full_name;
        $this->email=$alumno->email;
        $this->address=$alumno->address;
        
    }
    #[On('alumno-delete')] 
    public function delete($id){
        $alumno = Alumno::find($id);
        $alumno->delete();
        $this->message('success', 'En hora buena!', 'Registro eliminado correctamente!');
    }
    public function updateAlumno(){
        try {
            $alumno = Alumno::find($this->id);
            $alumno->update([
            'code' => $this->code,
            'full_name' => $this->full_name,
            'email' => $this->email,
            'address' => $this->address,
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
