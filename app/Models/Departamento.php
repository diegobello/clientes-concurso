<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    use HasFactory;

    protected $fillable = ['dep_id','dep_nombre'];

    public function municipios()
    {
        return $this->hasMany(Municipio::class);
    }
}
