$(document).ready(() => {
    // LOGIN
    let formIsCorrect

    $("#formLogin").on("click", "#submitLogin", (e) => {
        e.preventDefault();

        formIsCorrect = true;

        // Variables para validación
        let valEmail = $("#email").val();
        let valPassword = $("#password").val();

        let emptyEmail = validator.isEmpty(valEmail);
        let emptyPassword = validator.isEmpty(valPassword);
        if (emptyEmail || emptyPassword) {
            toastr.error('Rellene el formulario', 'Campos incompletos');
            formIsCorrect = false;
            console.log(formIsCorrect);
        } else {
            // Validamos email
            let validationEmail = validator.isEmail(valEmail);

            if (!validationEmail) {
                formIsCorrect = false;
                toastr.error('No ha ingresado un correo electrónico', 'No es un email');
                console.log('validationEmail', formIsCorrect);

            }

            // Validamos dominio
            let validationRegex = validateEmail(valEmail);

            if (!validationRegex) {
                formIsCorrect = false;
                toastr.error('El dominio debe ser "@alumno.ipn.mx" o "@profesor.ipn.mx"', 'Dominio incorrecto');
                console.log('validationDominio', formIsCorrect);
            }
        }

        if (formIsCorrect) {
            $.post({
                url: 'http://localhost/saes/user/login',
                type: 'POST',
                cache: false,
                data: { email: $("#email").val(), password: $("#password").val() },
                success: function(data) {
                    location.href = 'http://localhost/saes/alumno/main';
                }
            });
        }

    });

    // GENERAL
    let valuebtnGeneral = true;

    toggleGeneral = () => {
        // Input cartilla
        $('#cartilla, #cartillaDisplay, #pasaporte, #pasaporteDisplay, #sexo, #sexoDisplay, #formGeneral').toggleClass("d-none");

        valuebtnGeneral ? $('#modificarGeneral').html("Cancelar") : $('#modificarGeneral').html("Modificar");

        valuebtnGeneral = !valuebtnGeneral;
    }

    $('#modificarGeneral').click(function(e) {
        e.preventDefault();
        toggleGeneral();
    });

    $("#generales").on("click", "#formGeneral", () => {
        console.log('Si paso');

        $.ajax({
            url: 'index.php',
            type: 'POST',
            dataType: "text",
            cache: false,
            data: { user: "alumno", tabName: "tabAlumnoGeneral", cartilla: $("#cartilla").val(), pasaporte: $("#pasaporte").val(), sexo: $("#sexo").val() },
            success: function(data) {
                console.log(cartilla);
                console.log(pasaporte);
                console.log(sexo);
                console.log(data);
                var jsonData = JSON.parse(data);
                console.log(jsonData);
                Swal.fire({
                    icon: 'success',
                    text: 'Se han actualizado tus datos exitosamente',
                    showCloseButton: true
                });

                $('#cartilla').val(jsonData.cartilla);
                $('#cartillaDisplay').html(jsonData.cartilla);

                $('#pasaporte').val(jsonData.pasaporte);
                $('#pasaporteDisplay').html(jsonData.pasaporte);

                $('#sexo').val(jsonData.sexo);
                let sexoDisp = jsonData.sexo == 'H' ? 'Hombre' : 'Mujer';
                $('#sexoDisplay').html(sexoDisp);


                setTimeout(toggleGeneral, 1000);
            }
        });
    });


    // NACIMIENTO
    let valuebtnNacimiento = true;

    toggleNacimiento = () => {
        // Input sexo
        $('#fechaNacimiento, #nacimientoDisplay, #formNacimiento').toggleClass("d-none");

        valuebtnNacimiento ? $('#modificarNacimiento').html("Cancelar") : $('#modificarNacimiento').html("Modificar");

        valuebtnNacimiento = !valuebtnNacimiento;
    }

    $('#modificarNacimiento').click(function(e) {
        e.preventDefault();
        toggleNacimiento();
    });

    $("#nacimiento").on("click", "#formNacimiento", () => {
        console.log('Si paso');

        $.ajax({
            url: 'index.php',
            type: 'POST',
            dataType: "text",
            cache: false,
            data: { user: "alumno", tabName: "tabAlumnoNacimiento", nacimiento: $("#fechaNacimiento").val() },
            success: function(data) {
                var jsonData = JSON.parse(data);

                Swal.fire({
                    icon: 'success',
                    text: 'Se han actualizado tus datos exitosamente',
                    showCloseButton: true
                });

                $('#fechaNacimiento').val(jsonData.nacimiento);
                $('#nacimientoDisplay').html(jsonData.nacimiento);


                setTimeout(toggleNacimiento, 1000);
            }
        });
    });

    // DIRECCION
    let valuebtnDireccion = true;

    toggleDireccion = () => {
        // Inputs y display
        $('#calle, #calleDisplay, #numExt, #numExtDisplay, #numInt, #numIntDisplay, #colonia, #coloniaDisplay, #codigoPostal, #codigoPostalDisplay, #estado, #estadoDisplay, #municipio, #municipioDisplay, #movil, #movilDisplay, #emailGeneral, #emailDisplay, #telOficina, #telOficinaDisplay, #labora, #laboraDisplay, #formDireccion').toggleClass("d-none");

        valuebtnDireccion ? $('#modificarDireccion').html("Cancelar") : $('#modificarDireccion').html("Modificar");

        valuebtnDireccion = !valuebtnDireccion;
    }

    $('#modificarDireccion').click(function(e) {
        e.preventDefault();
        toggleDireccion();
    });

    $("#direccion").on("click", "#formDireccion", () => {
        console.log('Si paso');

        $.ajax({
            url: 'index.php',
            type: 'POST',
            dataType: "text",
            cache: false,
            // FALTA AGREGAR DATA PARA AJAX
            data: { user: "alumno", tabName: "tabAlumnoGeneral", cartilla: $("#cartilla").val(), pasaporte: $("#pasaporte").val(), sexo: $("#sexo").val() },
            success: function(data) {
                console.log(cartilla);
                console.log(pasaporte);
                console.log(sexo);
                console.log(data);
                var jsonData = JSON.parse(data);
                console.log(jsonData);
                Swal.fire({
                    icon: 'success',
                    text: 'Se han actualizado tus datos exitosamente',
                    showCloseButton: true
                });

                $('#cartilla').val(jsonData.cartilla);
                $('#cartillaDisplay').html(jsonData.cartilla);

                $('#pasaporte').val(jsonData.pasaporte);
                $('#pasaporteDisplay').html(jsonData.pasaporte);

                $('#sexo').val(jsonData.sexo);
                let sexoDisp = jsonData.sexo == 'H' ? 'Hombre' : 'Mujer';
                $('#sexoDisplay').html(sexoDisp);


                setTimeout(toggleDireccion, 1000);
            }
        });
    });
});