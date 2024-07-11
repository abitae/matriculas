<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alumno;
class AlumnoController extends Controller
{
    public function index(){
        $alumnos = Alumno::all();
        return view('alumno',compact('alumnos'));
    }
    public function edit(Alumno $alumnos){
        $alumnos = Alumno::all();
        return view('alumno',compact('alumnos'));
    }
    public function destroy(Alumno $alumnos){
        $alumnos = Alumno::all();
        return view('alumno',compact('alumnos'));
    }
}
