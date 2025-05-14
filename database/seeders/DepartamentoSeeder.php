<?php

namespace Database\Seeders;

use App\Models\Departamento;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DepartamentoSeeder extends Seeder
{
    public function run(): void
    {
        $departamentos = [
            'Amazonas', 'Antioquia', 'Arauca', 'Atlántico', 'Bogotá D.C.',
            'Bolívar', 'Boyacá', 'Caldas', 'Caquetá', 'Casanare',
            'Cauca', 'Cesar', 'Chocó', 'Córdoba', 'Cundinamarca',
            'Guainía', 'Guaviare', 'Huila', 'La Guajira', 'Magdalena',
            'Meta', 'Nariño', 'Norte de Santander', 'Putumayo', 'Quindío',
            'Risaralda', 'San Andrés y Providencia', 'Santander', 'Sucre', 'Tolima',
            'Valle del Cauca', 'Vaupés', 'Vichada'
        ];

        foreach ($departamentos as $nombre) {
            Departamento::create([
                'dep_nombre' => $nombre
            ]);
        }
    }
}

