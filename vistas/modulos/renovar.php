<div class="login-box">
    <div class="login-logo">
        <b>Administrador </b>WEB
    </div>

    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Renovar contraseña</p>

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
               
                <div class="row">                   

                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Ingresar</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            <p class="mb-1">
                <a href="<?php $url ?>renovar">Renovar contraseña</a>
            </p>

        </div>
        <!-- /.login-card-body -->
    </div>
</div>