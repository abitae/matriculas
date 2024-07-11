<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    use HasFactory;
    protected $fillable = [
        'code',
        'full_name',
        'phone',
        'email',
        'address',
        'isActive',
    ];
    public function matriculas()
    {
        return $this->hasMany(Matricula::class);
    }
}
