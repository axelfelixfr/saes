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

    $("#generales").on("click", "#formGeneral", (e) => {
        e.preventDefault();
        console.log('Si paso');

        formIsCorrect = true;

        // Variables para validación
        let valCartilla = $("#cartilla").val();
        let valPasaporte = $("#pasaporte").val();

        let validationCharCartilla = validateChar(valCartilla);
        let validationCharPasaporte = validateChar(valPasaporte);

        if (!validationCharCartilla || !validationCharPasaporte) {
            toastr.error('No usar carácteres especiales ni espacios', 'Campos incorrectos');
            formIsCorrect = false;
            console.log(formIsCorrect);
        }

        let emptyCartilla = validator.isEmpty(valCartilla);
        let emptyPasaporte = validator.isEmpty(valPasaporte);
        if (!emptyCartilla || !emptyPasaporte) {
            let validationMinCartilla = validator.isLength(valCartilla, { min: 10, max: 30 });
            let validationMinPasaporte = validator.isLength(valPasaporte, { min: 10, max: 30 });

            if (!validationMinCartilla || !validationMinPasaporte) {
                toastr.error('Mínimo deben ser 10 carácteres y máximo 30', 'Campos incorrectos');
                formIsCorrect = false;
            }
        }

        if (formIsCorrect) {
            $.ajax({
                url: 'index.php',
                type: 'POST',
                dataType: "text",
                cache: false,
                data: { user: "alumno", tabName: "tabAlumnoGeneral", cartilla: $("#cartilla").val(), pasaporte: $("#pasaporte").val(), sexo: $("#sexo").val() },
                success: function(data) {
                    if (data.length === 0) {
                        Swal.fire({
                            icon: 'error',
                            text: 'Hubo un error al ingresar la información',
                            showCloseButton: true
                        });

                        toggleGeneral();
                    } else {
                        console.log(data);
                        var jsonData = JSON.parse(data);

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

                }
            });
        }
    });

    // NACIMIENTO
    let valuebtnNacimiento = true;

    toggleNacimiento = () => {
        // Input nacimiento
        $('#fechaNacimiento, #nacimientoDisplay, #formNacimiento').toggleClass("d-none");

        valuebtnNacimiento ? $('#modificarNacimiento').html("Cancelar") : $('#modificarNacimiento').html("Modificar");

        valuebtnNacimiento = !valuebtnNacimiento;
    }

    $('#modificarNacimiento').click(function(e) {
        e.preventDefault();
        toggleNacimiento();
    });

    $("#nacimiento").on("click", "#formNacimiento", (e) => {
        e.preventDefault();
        console.log('Si paso');

        formIsCorrect = true;

        // Variables para validación
        let valNacimiento = $("#fechaNacimiento").val();

        let emptyNacimiento = validator.isEmpty(valNacimiento);

        if (emptyNacimiento) {
            toastr.error('Rellene el formulario', 'Campo incompleto');
            formIsCorrect = false;
            console.log(formIsCorrect);
        } else {
            let validationDate = validator.isDate(valNacimiento);

            if (!validationDate) {
                toastr.error('Debes ingresar una fecha', 'Campo incorrecto');
                formIsCorrect = false;
            }
        }

        if (formIsCorrect) {
            $.ajax({
                url: 'index.php',
                type: 'POST',
                dataType: "text",
                cache: false,
                data: { user: "alumno", tabName: "tabAlumnoNacimiento", nacimiento: $("#fechaNacimiento").val() },
                success: function(data) {
                    if (data.length === 0) {
                        Swal.fire({
                            icon: 'error',
                            text: 'Hubo un error al ingresar la información',
                            showCloseButton: true
                        });

                        toggleNacimiento();
                    } else {
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
                }
            });
        }
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
            data: { user: "alumno", tabName: "tabAlumnoDireccion", calle: $("#calle").val(), numExt: $("#numExt").val(), numInt: $("#numInt").val(), colonia: $("#colonia").val(), codigoPostal: $("#codigoPostal").val(), estado: $("#estado").val(), municipio: $("#municipio").val(), movil: $("#movil").val(), emailGeneral: $("#emailGeneral").val(), telOficina: $("#telOficina").val(), labora: $("#labora").val() },
            success: function(data) {

                if (data.length === 0) {
                    Swal.fire({
                        icon: 'error',
                        text: 'Hubo un error al ingresar la información',
                        showCloseButton: true
                    });

                    toggleDireccion();
                } else {
                    console.log(data);
                    var jsonData = JSON.parse(data);
                    console.log(jsonData);
                    Swal.fire({
                        icon: 'success',
                        text: 'Se han actualizado tus datos exitosamente',
                        showCloseButton: true
                    });

                    // CAMBIAR LOS ID DE LOS INPUTS COMO 'numExt' a 'num_ext'
                    $('#calle').val(jsonData.calle);
                    $('#calleDisplay').html(jsonData.calle);

                    $('#numExt').val(jsonData.num_ext);
                    $('#numExtDisplay').html(jsonData.num_ext);

                    $('#numInt').val(jsonData.num_int);
                    $('#numIntDisplay').html(jsonData.num_int);

                    $('#colonia').val(jsonData.colonia);
                    $('#coloniaDisplay').html(jsonData.colonia);

                    $('#codigoPostal').val(jsonData.codigo_postal);
                    $('#codigoPostalDisplay').html(jsonData.codigo_postal);

                    $('#estado').val(jsonData.estado);
                    $('#estadoDisplay').html(jsonData.estado);

                    $('#municipio').val(jsonData.municipio);
                    $('#municipioDisplay').html(jsonData.municipio);

                    $('#movil').val(jsonData.movil);
                    $('#movilDisplay').html(jsonData.movil);

                    $('#emailGeneral').val(jsonData.email);
                    $('#emailDisplay').html(jsonData.email);

                    $('#telOficina').val(jsonData.tel_oficina);
                    $('#telOficinaDisplay').html(jsonData.tel_oficina);

                    $('#labora').val(jsonData.labora);
                    $('#laboraDisplay').html(jsonData.labora);

                    setTimeout(toggleDireccion, 1000);
                }

            }
        });
    });
});