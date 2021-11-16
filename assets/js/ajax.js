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
        } else {
            // Validamos email
            let validationEmail = validator.isEmail(valEmail);

            if (!validationEmail) {
                formIsCorrect = false;
                toastr.error('No ha ingresado un correo electrónico', 'No es un email');
            }

            // Validamos dominio
            let validationRegex = validateEmail(valEmail);

            if (!validationRegex) {
                formIsCorrect = false;
                toastr.error('El dominio debe ser "@alumno.ipn.mx" o "@profesor.ipn.mx"', 'Dominio incorrecto');
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

        formIsCorrect = true;

        // Variables para validación
        let valCartilla = $("#cartilla").val();
        let valPasaporte = $("#pasaporte").val();

        let validationCharCartilla = validateChar(valCartilla);
        let validationCharPasaporte = validateChar(valPasaporte);

        if (!validationCharCartilla || !validationCharPasaporte) {
            toastr.error('No usar carácteres especiales ni espacios', 'Campos incorrectos');
            formIsCorrect = false;
        }

        let emptyCartilla = validator.isEmpty(valCartilla);
        let emptyPasaporte = validator.isEmpty(valPasaporte);

        if (!emptyCartilla) {
            let validationMinCartilla = validator.isLength(valCartilla, { min: 10, max: 30 });

            if (!validationMinCartilla) {
                toastr.error('Mínimo deben ser 10 carácteres y máximo 30', 'Cartilla incorrecta');
                formIsCorrect = false;
            }
        }

        if (!emptyPasaporte) {
            let validationMinPasaporte = validator.isLength(valPasaporte, { min: 10, max: 30 });

            if (!validationMinPasaporte) {
                toastr.error('Mínimo deben ser 10 carácteres y máximo 30', 'Pasaporte incorrecto');
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

        formIsCorrect = true;

        // Variables para validación
        let valNacimiento = $("#fechaNacimiento").val();

        let emptyNacimiento = validator.isEmpty(valNacimiento);

        if (emptyNacimiento) {
            toastr.error('Rellene el formulario', 'Fecha incompleta');
            formIsCorrect = false;
        } else {
            let validationDate = validator.isDate(valNacimiento);

            if (!validationDate) {
                toastr.error('Debes ingresar una fecha', 'Fecha incompleta');
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
        formIsCorrect = true;

        // Variables para validación
        let valCalle = $("#calle").val();
        let valNumExt = $("#numExt").val();
        let valNumInt = $("#numInt").val();
        let valColonia = $("#colonia").val();
        let valCodigoP = $("#codigoPostal").val();
        let valEstado = $("#estado").val();
        let valMunicipio = $("#municipio").val();
        let valMovil = $("#movil").val();
        let valEmailG = $("#emailGeneral").val();
        let valTelOfic = $("#telOficina").val();
        let valLabora = $("#labora").val();

        // Requeridas
        let emptyCalle = validator.isEmpty(valCalle);
        let emptyNumExt = validator.isEmpty(valNumExt);
        let emptyColonia = validator.isEmpty(valColonia);
        let emptyCodigoP = validator.isEmpty(valCodigoP);
        let emptyEstado = validator.isEmpty(valEstado);
        let emptyMunicipio = validator.isEmpty(valMunicipio);
        let emptyLabora = validator.isEmpty(valLabora);

        // Opcionales
        let emptyNumInt = validator.isEmpty(valNumInt);
        let emptyMovil = validator.isEmpty(valMovil);
        let emptyEmailG = validator.isEmpty(valEmailG);
        let emptyTelOfic = validator.isEmpty(valTelOfic);

        if (emptyCalle || emptyNumExt || emptyColonia || emptyCodigoP || emptyEstado || emptyMunicipio || emptyLabora) {
            toastr.error('Rellene el formulario', 'Campos incompletos');
            formIsCorrect = false;
        } else {
            let validationNumExt = validator.isLength(valNumExt, { min: 1, max: 20 });

            if (!validationNumExt) {
                toastr.error('Mínimo deben ser 1 carácter y máximo 20', 'Número exterior incorrecto');
                formIsCorrect = false;
            }

            // Validamos números
            let validationCodigoP = validator.isInt(valCodigoP);

            if (!validationCodigoP) {
                toastr.error('Debe ser un número', 'Código postal incorrecto');
                formIsCorrect = false;
            }

            // Validamos string
            let validationCalle = validateString(valCalle);
            let validationColonia = validateString(valColonia);
            let validationEstado = validateString(valEstado);
            let validationMunicipio = validateString(valMunicipio);
            let validationLabora = validateChar(valLabora);

            if (!validationCalle) {
                toastr.error('No usar carácteres especiales', 'Calle incorrecta');
                formIsCorrect = false;
            }

            if (!validationColonia) {
                toastr.error('No usar carácteres especiales', 'Colonia incorrecta');
                formIsCorrect = false;
            }

            if (!validationEstado) {
                toastr.error('No usar carácteres especiales', 'Estado incorrecto');
                formIsCorrect = false;
            }

            if (!validationMunicipio) {
                toastr.error('No usar carácteres especiales', 'Municipio incorrecto');
                formIsCorrect = false;
            }

            if (!validationLabora) {
                toastr.error('No usar carácteres especiales', 'Campo de labor incorrecto');
                formIsCorrect = false;
            }

        }

        // Num interior
        if (!emptyNumInt) {

            let validationNumInt = validator.isLength(valNumInt, { min: 1, max: 20 });

            if (!validationNumInt) {
                toastr.error('Mínimo deben ser 1 carácter y máximo 20', 'Número interior incorrecto');
                formIsCorrect = false;
            }

            let validationChar = validateString(valNumInt);
            if (!validationChar) {
                toastr.error('No usar carácteres especiales', 'Número interior incorrecto');
                formIsCorrect = false;
            }
        }

        // Validamos email
        if (!emptyEmailG) {
            let validationEmailG = validator.isEmail(valEmailG);

            if (!validationEmailG) {
                toastr.error('Debe ser un email', 'Correo incorrecto');
                formIsCorrect = false;
            }
        }

        // Validamos telefonos
        if (!emptyMovil) {
            let validationMovil = validator.isMobilePhone(valMovil, 'es-MX');

            if (!validationMovil) {
                toastr.error('Es necesario que tenga la extensión 52', 'Teléfono incorrecto');
                formIsCorrect = false;
            }
        }

        if (!emptyTelOfic) {
            let validationTelOfi = validator.isMobilePhone(valTelOfic, 'es-MX');

            if (!validationTelOfi) {
                toastr.error('Es necesario que tenga la extensión 52', 'Teléfono de oficina incorrecto');
                formIsCorrect = false;
            }
        }


        if (formIsCorrect) {
            $.ajax({
                url: 'index.php',
                type: 'POST',
                dataType: "text",
                cache: false,
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

                        var jsonData = JSON.parse(data);

                        Swal.fire({
                            icon: 'success',
                            text: 'Se han actualizado tus datos exitosamente',
                            showCloseButton: true
                        });

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
        }
    });

    // TUTOR
    let valuebtnTutor = true;

    toggleTutor = () => {
        // Input cartilla
        $('#nombreTutor, #nombreTutorDisplay, #rfcTutor, #rfcDisplay, #padre, #padreDisplay, #madre, #madreDisplay, #formTutor').toggleClass("d-none");

        valuebtnTutor ? $('#modificarTutor').html("Cancelar") : $('#modificarTutor').html("Modificar");

        valuebtnTutor = !valuebtnTutor;
    }

    $('#modificarTutor').click(function(e) {
        e.preventDefault();
        toggleTutor();
    });

    $("#tutor").on("click", "#formTutor", (e) => {
        e.preventDefault();

        formIsCorrect = true;

        // Variables para validación
        let valNombreTut = $("#nombreTutor").val();
        let valRfcTutor = $("#rfcTutor").val();
        let valPadre = $("#padre").val();
        let valMadre = $("#madre").val();

        let emptyNombreTut = validator.isEmpty(valNombreTut);

        if (emptyNombreTut) {
            toastr.error('Este campo es requerido', 'Nombre del tutor obligatorio');
            formIsCorrect = false;
        } else {
            let validationTutor = validateName(valNombreTut);
            if (!validationTutor) {
                toastr.error('No usar carácteres especiales ni números', 'Tutor incorrecto');
                formIsCorrect = false;
            }
        }

        let emptyRfcTutor = validator.isEmpty(valRfcTutor);
        let emptyPadre = validator.isEmpty(valPadre);
        let emptyMadre = validator.isEmpty(valMadre);

        if (!emptyRfcTutor) {
            let validationRfcTut = validateChar(valRfcTutor);
            if (!validationRfcTut) {
                toastr.error('No usar carácteres especiales ni espacios', 'Rfc incorrecto');
                formIsCorrect = false;
            }
        }

        if (!emptyPadre) {
            let validationPadre = validateName(valPadre);
            if (!validationPadre) {
                toastr.error('No usar carácteres especiales ni números', 'Padre incorrecto');
                formIsCorrect = false;
            }

        }

        if (!emptyMadre) {
            let validationMadre = validateName(valMadre);
            if (!validationMadre) {
                toastr.error('No usar carácteres especiales ni números', 'Madre incorrecta');
                formIsCorrect = false;
            }

        }

        if (formIsCorrect) {
            $.ajax({
                url: 'index.php',
                type: 'POST',
                dataType: "text",
                cache: false,
                data: { user: "alumno", tabName: "tabAlumnoTutor", nombreTutor: $("#nombreTutor").val(), rfcTutor: $("#rfcTutor").val(), padre: $("#padre").val(), madre: $("#madre").val() },
                success: function(data) {
                    if (data.length === 0) {
                        Swal.fire({
                            icon: 'error',
                            text: 'Hubo un error al ingresar la información',
                            showCloseButton: true
                        });

                        toggleTutor();
                    } else {
                        var jsonData = JSON.parse(data);

                        Swal.fire({
                            icon: 'success',
                            text: 'Se han actualizado tus datos exitosamente',
                            showCloseButton: true
                        });

                        $('#nombreTutor').val(jsonData.nombre);
                        $('#nombreTutorDisplay').html(jsonData.nombre);

                        $('#rfcTutor').val(jsonData.rfc);
                        $('#rfcDisplay').html(jsonData.rfc);

                        $('#padre').val(jsonData.padre);
                        $('#padreDisplay').html(jsonData.padre);

                        $('#madre').val(jsonData.madre);
                        $('#madreDisplay').html(jsonData.madre);

                        setTimeout(toggleTutor, 1000);
                    }

                }
            });
        }
    });
});