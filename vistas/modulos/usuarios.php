<?php

$usuarios = UsuariosControlador::ctrMostrarUsuarios(null, null);

$roles = RolesControlador::ctrMostrarRoles(null, null);

//print_r($roles);
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Usuarios</h1>

                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#agregar-usuario">
                        <i class="fas fa-plus"></i> Agregar usuario
                    </button>

                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo $url; ?>">Home</a></li>
                        <li class="breadcrumb-item active">Productos</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>

                <?php

                foreach ($usuarios as $key => $value)
                {

                    //$rol = Funciones::mostrarRol($value["idRolUsuario"]);
                
                    ?>

                    <tr>
                        <td>
                            <?php echo $value["nombre_usuario"]; ?>
                        </td>
                        <td>
                            <?php echo $value["email_usuario"]; ?>
                        </td>
                        <td>
                            <?php

                            if ($value["estado_usuario"] == 1)
                            {
                                echo "Activo";
                            }
                            else
                            {
                                echo "Inactivo";
                            }
                            ?>
                        </td>
                        <td>Editar - Eliminar</td>

                    </tr>

                <?php } ?>

            </tbody>

        </table>

    </section>
    <!-- /.content -->
</div>
<input type="hidden" id="url" value="<?php echo $url; ?>">
<div class="modal fade" id="agregar-usuario">

    <form id="agregarUsuario" method="post">

        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Agregar usuario</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" id="validarUsuario" name="email_usuario" class="form-control"
                            placeholder="Ingrese el email del usuario" required>
                    </div>

                    <div class="form-group">
                        <label>Nombre</label>
                        <input type="text" name="nombre_usuario" class="form-control"
                            placeholder="Ingrese el nombre del usuario" required>
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password_usuario" class="form-control"
                            placeholder="Ingrese la contraseña" required>
                    </div>

                    <div class="form-group">
                        <label>Roles</label>
                        <select class="form-control" name="id_rol_usuario">

                            <option value="">Seleccione un rol</option>
                            <?php foreach ($roles as $key => $value)
                            { ?>

                                <option value="<?php echo $value["id_rol"]; ?>"><?php echo $value["nombre_rol"]; ?></option>

                            <?php } ?>
                        </select>
                    </div>

                </div>

                <?php
                $agregarUsuario = new UsuariosControlador();
                $agregarUsuario->ctrAgregarUsuario();
                ?>

                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fas fa-times"></i>
                        Cerrar</button>
                    <button type="sumbit" class="btn btn-primary"><i class="fas fa-save"></i> Guardar</button>
                </div>
            </div>

        </div>

    </form>
</div>