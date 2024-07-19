<?php

namespace App\Http\Controllers;

use App\Models\Curso;

class MatriculaController extends Controller
{
    public function index(Curso $id)
    {
        return view('matricula', compact('id'));
    }
}
