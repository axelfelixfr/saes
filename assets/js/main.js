$(document).ready(() => {
    /*Inicio de sesión*/
    // ('use strict');
    // var forms = document.querySelectorAll('.needs-validation');
    // Array.prototype.slice.call(forms).forEach(function(form) {
    //     form.addEventListener(
    //         'submit',
    //         function(event) {
    //             if (!form.checkValidity()) {
    //                 event.preventDefault();
    //                 event.stopPropagation();
    //             }
    //             form.classList.add('was-validated');
    //         },
    //         false
    //     );
    // });
    /*Fin de inicio de sesión*/
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

// Validate Email
function validateEmail(email) {
    let validationEmail = /\b[\w\.-]+@(alumno.ipn.mx|profesor.ipn.mx)$\b/;
    return validationEmail.test(String(email).toLowerCase());
}

// Validate String
function validateString(exampleString) {
    let validationString =
        /^[a-zA-ZÀ-ÿ\u00f1\u00d1]+(\s*[a-zA-ZÀ-ÿ\u00f1\u00d1]*)*[a-zA-ZÀ-ÿ\u00f1\u00d1]+$/g;
    return validationString.test(String(exampleString));
}

function validateChar(exampleString) {
    let validationChar = /^[a-zA-Z0-9]*$/g;
    return validationChar.test(String(exampleString));
}


const locationLogin = 'http://localhost/saes/';

if (locationLogin == location.href) {
    // Validaciones Bootstrap
    bootstrapValidate('#email', 'email:Debe ser un email');

    bootstrapValidate('#password', 'min:5:Mínimo deben ser 5 carácteres!');
}

bootstrapValidate('#cartilla', 'regex:^[a-zA-Z0-9]*$:No use carácteres especiales ni espacios');
bootstrapValidate('#pasaporte', 'regex:^[a-zA-Z0-9]*$:No use carácteres especiales ni espacios');