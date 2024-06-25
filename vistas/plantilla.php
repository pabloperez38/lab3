<?php
session_start();
$url = PlantillaControlador::url();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Administrador web</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo $url ?>vistas/plugins/fontawesome-free/css/all.min.css">

    <link rel="stylesheet" href="<?php echo $url ?>vistas/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo $url ?>vistas/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo $url ?>vistas/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo $url ?>vistas/css/adminlte.css">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="<?php echo $url ?>vistas/js/scripts.js"></script>
</head>

<body class="hold-transition sidebar-mini

<?php if (!isset($_SESSION["session"])) { ?>
    login-page
<?php } ?>

">
    <!-- Site wrapper -->
    <div class="wrapper">

        <?php if (isset($_SESSION["session"]) && $_SESSION["session"] == "ok") { ?>

            <?php include 'vistas/modulos/header.php'; ?>
            <?php include 'vistas/modulos/menu.php'; ?>

            <!-- Content Wrapper. Contains page content -->
            <?php

            if (isset($_GET["pagina"])) // entra si es verdadero
            {
                $paginas = explode("/", $_GET["pagina"]);

                if (
                    $paginas[0] == "home" ||
                    $paginas[0] == "productos" ||
                    $paginas[0] == "editar-producto" ||
                    $paginas[0] == "usuarios" ||
                    $paginas[0] == "categorias" ||
                    $paginas[0] == "configuracion" ||
                    $paginas[0] == "salir"
                ) {
                    include "vistas/modulos/" . $paginas[0] . ".php";
                } else {
                    include "vistas/modulos/404.php";
                }
            } else {
                include "vistas/modulos/home.php";
            }

            ?>
            <?php
            include 'vistas/modulos/footer.php';
            ?>
        <?php } else {
            include 'vistas/modulos/login.php';
        } ?>
    </div>

    <!-- jQuery -->
    <script src="<?php echo $url ?>vistas/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo $url ?>vistas/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="<?php echo $url ?>vistas/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo $url ?>vistas/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?php echo $url ?>vistas/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?php echo $url ?>vistas/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="<?php echo $url ?>vistas/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?php echo $url ?>vistas/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="<?php echo $url ?>vistas/plugins/jszip/jszip.min.js"></script>
    <script src="<?php echo $url ?>vistas/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="<?php echo $url ?>vistas/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="<?php echo $url ?>vistas/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="<?php echo $url ?>vistas/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <!-- jquery-validation -->
    <script src="<?php echo $url ?>vistas/plugins/jquery-validation/jquery.validate.min.js"></script>
    <script src="<?php echo $url ?>vistas/plugins/jquery-validation/additional-methods.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo $url ?>vistas/js/adminlte.min.js"></script>
    <script src="<?php echo $url ?>vistas/js/productos.js"></script>
    <script src="<?php echo $url ?>vistas/js/usuarios.js"></script>
    <script src="<?php echo $url ?>vistas/js/configuracion.js"></script>

    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>

    <script>
        $(function() {

            $('#agregarProducto').validate({
                rules: {
                    nombre_producto: {
                        required: true,
                        minlength: 3
                    },
                    categoria_producto: {
                        required: true,
                    },
                    precio_producto: {
                        required: true
                    },
                },
                messages: {
                    nombre_producto: {
                        required: "Ingrese un nombre",
                        minlength: "El nombre del producto debe tener más de 3 caracteres"
                    },
                    categoria_producto: {
                        required: "Seleccione una categoría",
                    },
                    precio_producto: "Ingrese un precio"
                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });
        });
    </script>
</body>

</html>