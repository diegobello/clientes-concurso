import './bootstrap';
import Swal from 'sweetalert2';

$(document).ready(function () {

    function validarFormulario() {
        const nombre = $('#nombre').val().trim();
        const apellido = $('#apellido').val().trim();
        const cedula = $('#cedula').val().trim();
        const celular = $('#celular').val().trim();
        const email = $('#email').val().trim();
        const departamento = $('#departamento_id').val();
        const municipio = $('#municipio_id').val();
        const terminos = $('#terminos_condiciones').is(':checked');

        const soloNumerosRegex = /^[0-9]+$/;
        const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

        if (nombre === '') {
            Swal.fire('Error', 'El nombre es obligatorio.', 'error');
            return false;
        }

        if (apellido === '') {
            Swal.fire('Error', 'El apellido es obligatorio.', 'error');
            return false;
        }

        if (!soloNumerosRegex.test(cedula)) {
            Swal.fire('Error', 'La cédula debe contener solo números.', 'error');
            return false;
        }

        if (!soloNumerosRegex.test(celular)) {
            Swal.fire('Error', 'El celular debe contener solo números.', 'error');
            return false;
        }

        if (!emailRegex.test(email)) {
            Swal.fire('Error', 'Ingrese un correo electrónico válido.', 'error');
            return false;
        }

        if (!departamento) {
            Swal.fire('Error', 'Debe seleccionar un departamento.', 'error');
            return false;
        }

        if (!municipio) {
            Swal.fire('Error', 'Debe seleccionar un municipio.', 'error');
            return false;
        }

        if (!terminos) {
            Swal.fire('Error', 'Debe aceptar el tratamiento de datos personales.', 'error');
            return false;
        }

        return true; // Todo válido
    }

    // Cargar departamentos dinámicamente
    $.ajax({
        url: '/cliente/departamentos',
        type: 'GET',
        success: function (data) {
            $('#departamento_id').empty();
            $('#departamento_id').append('<option value="">Seleccione un departamento</option>');
            $.each(data, function (key, departamento) {
                $('#departamento_id').append('<option value="' + departamento.dep_id + '">' + departamento.dep_nombre + '</option>');
            });
        }
    });

    // Cargar municipios cuando cambia departamento
    $('#departamento_id').on('change', function () {
        var departamentoId = $(this).val();
        if (departamentoId) {
            $.ajax({
                url: '/municipios/' + departamentoId,
                type: 'GET',
                success: function (data) {
                    $('#municipio_id').empty();
                    $('#municipio_id').append('<option value="">Seleccione un municipio</option>');
                    $.each(data, function (key, municipio) {
                        $('#municipio_id').append('<option value="' + municipio.mun_id + '">' + municipio.mun_nombre + '</option>');
                    });
                }
            });
        } else {
            $('#municipio_id').empty();
            $('#municipio_id').append('<option value="">Seleccione un municipio</option>');
        }
    });

    // Validaciones manuales antes de enviar
    $('form').on('submit', function (e) {
        e.preventDefault();

        if (!validarFormulario()) {
            return;
        }
        let form = $(this);
        let url = form.attr('action');
        let data = form.serialize();

        $.ajax({
            url: url,
            method: 'POST',
            data: data,
            success: function () {
                Swal.fire({
                    icon: 'success',
                    title: '¡Registro exitoso!',
                    text: 'Serás redirigido al sorteo...',
                    timer: 2000,
                    showConfirmButton: false
                }).then(() => {
                    window.location.href = '/cliente/ganador';
                });
            },
            error: function (xhr) {
                if (xhr.status === 422) {
                    const response = xhr.responseJSON;
                    let mensajes = '';

                    // Recorrer todos los errores y agregarlos en una lista
                    $.each(response.errors, function (campo, errores) {
                        errores.forEach(function (error) {
                            mensajes += `<li>${error}</li>`;
                        });
                    });

                    Swal.fire({
                        icon: 'error',
                        title: 'Errores de validación:',
                        html: `<ul style="text-align:left;">${mensajes}</ul>`
                    });
                } else {
                    Swal.fire('Error', 'Ocurrió un error inesperado. Intenta más tarde.', 'error');
                }
            }

        });
    });

});
