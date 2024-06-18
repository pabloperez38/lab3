/*=============================================
REVISAR SI EL USUARIO YA EXISTE
=============================================*/

$("#validarUsuario").change(function () {
    $(".alert").remove();

    let usuario = $(this).val();

    let datos = new FormData();
    datos.append("validarUsuario", usuario);

    $.ajax({
        url: $("#url").val() + "ajax/usuarios.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {
            if (respuesta != false) {
                $("#validarUsuario")
                    .parent()
                    .after(
                        '<div class="alert alert-danger">El usuario ya existe en la base de datos</div>'
                    );
                $("#validarUsuario").val("");
            }
        },
    });
});
