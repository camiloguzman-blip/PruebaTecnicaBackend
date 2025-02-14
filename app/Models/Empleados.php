<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleados extends Model
{
    use HasFactory;

    public function Cargos()
    {
        return $this->hasMany(Cargos::class, 'id');
    }
}
