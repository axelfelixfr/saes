$(document).ready(() => {
    let valueHTML = true;

    toggleGeneral = () => {
        // Input cartilla
        $('#cartilla').toggleClass("d-none");
        $('#cartillaDisplay').toggleClass("d-none");

        // Input pasaporte
        $('#pasaporte').toggleClass("d-none");
        $('#pasaporteDisplay').toggleClass("d-none");


        // Input sexo
        $('#sexo').toggleClass("d-none");
        $('#sexoDisplay').toggleClass("d-none");

        $('#formGeneral').toggleClass("d-none");

        valueHTML ? $('#modificarGeneral').html("Cancelar") : $('#modificarGeneral').html("Modificar");

        valueHTML = !valueHTML;
    }

    $('#modificarGeneral').click(function(e) {
        e.preventDefault();
        toggleGeneral();
    });

    $("#generales").on("click", "#formGeneral", () => {
        console.log('Si paso');

        $.ajax({
            url: 'http://localhost/saes/alumno/updateGeneral',
            type: 'POST',
            dataType: "text",
            cache: false,
            data: { tabName: "tabGeneral", cartilla: $("#cartilla").val(), pasaporte: $("#pasaporte").val(), sexo: $("#sexo").val() },
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
});