<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;
    protected $fillable = [
        'code',
        'name',
        'aula',
        'isActive',
    ];
    public function matriculas()
    {
        return $this->hasMany(Matricula::class);
    }
}
