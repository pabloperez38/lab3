<div class="login-box">
    <div class="login-logo">
        <b>Administrador </b>WEB
    </div>

    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Ingrese con su email y contraseña</p>

            <form method="post">

                <div class="row">
                    <div class="col-12">
                        <?php
                        $login = new UsuariosControlador();
                        $login->ctrIngresoUsuario()
                        ?>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="email" class="form-control" name="email_usuario" placeholder="Email" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" name="password_usuario" placeholder="Contraseña"
                        required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
               
                <div class="col-4">
                    <button type="submit" class="btn btn-primary btn-block">Ingresar</button>
                </div>
            </form>

            <p class="mb-1">
                <a href="javascript:void(0)" data-toggle="modal" data-target="#renovar">Renovar contraseña</a>
            </p>


        </div>
        <!-- /.login-card-body -->
    </div>
</div>

<div class="modal fade" id="renovar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form id="renovarPassword" method="post">

        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h4 class="modal-title">Cambiar contraseña</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">

                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" name="resetPassword" class="form-control" placeholder="Ingrese el email"
                            required>
                    </div>

                </div>

                <?php
                $renovar = new UsuariosControlador();
                $renovar->ctrRenovarPassword();
                ?>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</butto>
                        <button type="sumbit" class="btn btn-primary"> Enviar</button>
                </div>

            </div>
        </div>
    </form>
</div>