<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cargos extends Model
{
    use HasFactory;

    protected $fillable = [

        'Area',
        'Roles',
        'Cargos',
        'Empleados_id',
        'jefe',
        'presidente',

    ];

    public function Empleados()
    {
        return $this->belongsTo(Empleados::class, 'Empleados_id');
    }

    public function Jefe()
    {
        return $this->belongsTo(Empleados::class, 'jefe_id');
    }
}
