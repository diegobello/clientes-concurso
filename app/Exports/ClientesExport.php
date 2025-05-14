<?php

namespace App\Exports;

use App\Models\Cliente;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ClientesExport implements FromCollection, WithHeadings, WithMapping
{
    public function collection()
    {
        return Cliente::with(['departamento', 'municipio'])->get();
    }

    public function map($cliente): array
    {
        return [
            $cliente->cli_nombre,
            $cliente->cli_apellido,
            $cliente->cli_cedula,
            $cliente->cli_celular,
            $cliente->cli_email,
            $cliente->departamento->dep_nombre ?? 'N/A',
            $cliente->municipio->mun_nombre ?? 'N/A',
            $cliente->created_at->format('Y-m-d H:i')
        ];
    }

    public function headings(): array
    {
        return [
            'Nombre',
            'Apellido',
            'Cédula',
            'Celular',
            'Correo',
            'Departamento',
            'Municipio',
            'Registrado el'
        ];
    }
}
