<?php
    return [
        'custom' => [
            'nombre' => [
                'required' => 'Ingrese el nombre del Cliente',
            ],
            'apellido' => [
                'required' => 'Ingrese el nombre del cliente',
            ],
            'cedula' => [
                'required' => '',
                'unique' => 'El cliente ya se encuentra registrado con este No. de cedula',
            ],
            'municipio_id' => [
                'required' => 'Ingrese el municipio',
            ],
            'departamento_id' => [
                'required' => 'Ingrese el departamento',
            ],
            'celular' => [
                'required' => 'Ingrese el celular del Cliente',
            ],
            'email' => [
                'email' => 'Ingrese un correo electronico valido',
                'unique' => 'El cliente ya se encuentra registrado con el correo suministrado',
            ],
            'terminos_condiciones' => [
                'required' => 'Debe aceptar los términos y condiciones',
            ]
        ]
    ]
?>
