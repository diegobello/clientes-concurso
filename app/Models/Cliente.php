<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = [
        'cli_nombre', 'cli_apellido', 'cli_cedula', 'departamento_id',
        'municipio_id', 'cli_celular', 'cli_email', 'cli_terminos_condiciones'
    ];

    public function departamento()
    {
        return $this->belongsTo(Departamento::class, 'departamento_id', 'dep_id');
    }

    public function municipio()
    {
        return $this->belongsTo(Municipio::class, 'municipio_id', 'mun_id');
    }

}
