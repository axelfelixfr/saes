$(document).ready(() => {
    $('input[type="number"]').on("keypress", function(e) {
        if (!isNaN(Number(e)) || (e.keyCode === 43 || e.keyCode >= 44 && e.keyCode <= 46 || e.keyCode === 101))
            return false;
    });

    $('input[type="text"], textarea').on("keypress", function(e) {
        if (
            e.charCode >= 48 && e.charCode <= 57 || // Números
            e.charCode >= 65 && e.charCode <= 90 || // Letras mayúsculas
            e.charCode >= 97 && e.charCode <= 122 || // Letras minúsculas
            e.charCode == "241" || // ñ Minuscula
            e.charCode == "209" || // Ñ Mayuscula
            e.charCode == "225" || // á Minuscula
            e.charCode == "233" || // é Minuscula
            e.charCode == "237" || // í Minuscula
            e.charCode == "243" || // ó Minuscula
            e.charCode == "250" || // ú Minuscula
            e.charCode == "193" || // A Mayuscula
            e.charCode == "201" || // E Mayuscula
            e.charCode == "205" || // I Mayuscula
            e.charCode == "211" || // O Mayuscula
            e.charCode == "218" || // U Mayuscula
            e.charCode == "44" || // ,
            e.charCode == "46" || // .
            e.charCode == "32" || // espacio
            e.charCode == 13 // Enter
        ) {
            return true;
        } else {
            return false;
        }
    });
});

// Toggle para sidebar
window.addEventListener('DOMContentLoaded', event => {

    // Toggle the side navigation
    const sidebarToggle = document.body.querySelector('#sidebarToggle');
    if (sidebarToggle) {
        // Uncomment Below to persist sidebar toggle between refreshes
        // if (localStorage.getItem('sb|sidebar-toggle') === 'true') {
        //     document.body.classList.toggle('sb-sidenav-toggled');
        // }
        sidebarToggle.addEventListener('click', event => {
            event.preventDefault();
            document.body.classList.toggle('sb-sidenav-toggled');
            localStorage.setItem('sb|sidebar-toggle', document.body.classList.contains('sb-sidenav-toggled'));
        });
    }

});

// Toast configuration
toastr.options = {
    "closeButton": true,
    "debug": false,
    "newestOnTop": true,
    "progressBar": true,
    "positionClass": "toast-bottom-right",
    "preventDuplicates": true,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "5000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "swing",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
}

// Valida dominio de correo IPN (alumno.ipn.mx|profesor.ipn.mx)
function validateEmail(email) {
    let validationEmail = /\b[\w\.-]+@(alumno.ipn.mx|profesor.ipn.mx)$\b/;
    return validationEmail.test(String(email).toLowerCase());
}

// Valida string con números y espacios permitidos
function validateString(exampleString) {
    let validationString =
        /^[a-zA-Z0-9À-ÿ\u00f1\u00d1]+(\s*[a-zA-Z0-9À-ÿ\u00f1\u00d1]*)*[a-zA-Z0-9À-ÿ\u00f1\u00d1]+$/g;
    return validationString.test(String(exampleString));
}

// Valida char con números pero sin espacios
function validateChar(exampleString) {
    let validationChar = /^[a-zA-Z0-9]*$/g;
    return validationChar.test(String(exampleString));
}

function validateName(exampleName) {
    let validationName = /^[a-zA-ZÀ-ÿ\u00f1\u00d1]+(\s*[a-zA-ZÀ-ÿ\u00f1\u00d1]*)*[a-zA-ZÀ-ÿ\u00f1\u00d1]+$/g;
    return validationName.test(String(exampleName));
}


const locationLogin = 'http://localhost/saes/';

if (locationLogin == location.href) {
    // Validaciones Bootstrap
    bootstrapValidate('#email', 'email:Debe ser un email');

    bootstrapValidate('#password', 'min:5:Mínimo deben ser 5 carácteres!');
}

const locationGeneral = 'http://localhost/saes/alumno/general';

if (locationGeneral == location.href) {
    // Generales
    bootstrapValidate('#cartilla', 'regex:^[a-zA-Z0-9]*$:No use carácteres especiales ni espacios');
    bootstrapValidate('#pasaporte', 'regex:^[a-zA-Z0-9]*$:No use carácteres especiales ni espacios');

    // Dirección
    // Requeridos
    bootstrapValidate('#calle', 'min:5:Mínimo deben ser 5 carácteres!');
    bootstrapValidate('#numExt', 'min:1:Mínimo deben ser 1 carácter!');
    bootstrapValidate('#colonia', 'min:5:Mínimo deben ser 5 carácteres!');
    bootstrapValidate('#codigoPostal', 'min:5:Deben ser 5 números!');
    bootstrapValidate('#estado', 'min:5:Mínimo deben ser 5 carácteres!');
    bootstrapValidate('#municipio', 'min:5:Mínimo deben ser 5 carácteres!');

    // Opcionales
    bootstrapValidate('#movil', 'numeric:Deben ser números');
    bootstrapValidate('#numInt', 'regex:^([a-zA-Z0-9ùÙüÜäàáëèéïìíöòóüùúÄÀÁËÈÉÏÌÍÖÒÓÜÚñÑ \s]+)$:No use carácteres especiales');

    // bootstrapValidate('#emailGeneral', 'email:Debe ser un email');
    bootstrapValidate('#telOficina', 'numeric:Deben ser números');
    bootstrapValidate('#labora', 'regex:^[a-zA-Z0-9]*$:No use carácteres especiales ni espacios');

    // Tutor
    bootstrapValidate('#nombreTutor', 'regex:^([a-zA-ZùÙüÜäàáëèéïìíöòóüùúÄÀÁËÈÉÏÌÍÖÒÓÜÚñÑ \s]+)$:No use carácteres especiales');
    bootstrapValidate('#rfcTutor', 'regex:^[a-zA-Z0-9]*$:No use carácteres especiales ni espacios');
    bootstrapValidate('#padre', 'regex:^([a-zA-ZùÙüÜäàáëèéïìíöòóüùúÄÀÁËÈÉÏÌÍÖÒÓÜÚñÑ \s]+)$:No use carácteres especiales');
    bootstrapValidate('#madre', 'regex:^([a-zA-ZùÙüÜäàáëèéïìíöòóüùúÄÀÁËÈÉÏÌÍÖÒÓÜÚñÑ \s]+)$:No use carácteres especiales');
}