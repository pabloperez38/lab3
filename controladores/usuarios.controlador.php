<?php

class UsuariosControlador
{
    //Método para traer información
    static public function ctrMostrarUsuarios($item, $valor)
    {
        $tabla     = "usuarios";
        $respuesta = UsuariosModelo::mdlMostrarUsuarios($tabla, $item, $valor);

        return $respuesta;
    }

    //Método para agregar usuario

    public function ctrAgregarUsuario()
    {
        if (isset($_POST["nombre_usuario"]))
        {

            $tabla = "usuarios";

            $password = crypt($_POST["password_usuario"], '$2a$07$hdgfamkdhdshsjhduaostyexdj$');

            $datos = array(
                "nombre_usuario" => $_POST["nombre_usuario"],
                "email_usuario" => $_POST["email_usuario"],
                "password_usuario" => $password,
                "id_rol_usuario" => $_POST["id_rol_usuario"],
                "estado_usuario" => 1
            );

            //print_r($datos);

            //return;

            //podemos volver a la página de datos
            $url = PlantillaControlador::url() . "usuarios";

            $respuesta = UsuariosModelo::mdlAgregarUsuario($tabla, $datos);

            if ($respuesta == "ok")
            {
                echo '<script>
                    fncSweetAlert("success","El usuario se agregó correctamente", "' . $url . '"
                    );
                    </script>';
            }
        }
    }

    /*=============================================
INGRESO DE USUARIO
=============================================*/

    static public function ctrIngresoUsuario()
    {
        //Campo del formulario login
        if (isset($_POST["email_usuario"]))
        {

            if (preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][azA-Z0-9_]+)*[.][a-zAZ]{2,4}$/', $_POST["email_usuario"]))
            {

                $password = crypt($_POST["password_usuario"], '$2a$07$hdgfamkdhdshsjhduaostyexdj$');
                $tabla    = "usuarios";
                //Campo de la BD para login de usuario
                $item  = "email_usuario";
                $valor = $_POST["email_usuario"];

                $respuesta = UsuariosModelo::mdlMostrarUsuarios($tabla, $item, $valor);

                if (is_array($respuesta) && ($respuesta["email_usuario"] == $valor && $respuesta["password_usuario"] == $password))
                {

                    // 1 - Activo
                    // 0 - Inactivo

                    if ($respuesta["estado_usuario"] == 1)
                    {

                        $_SESSION["session"]        = "ok";
                        $_SESSION["nombre_usuario"] = $respuesta["nombre_usuario"];
                        $_SESSION["email_usuario"]  = $respuesta["email_usuario"];
                        $_SESSION["id_usuario"]     = $respuesta["id_usuario"];

                        /*=============================================
                        Enviamos nueva contraseña al correo electrónico
                        =============================================*/
                        $name         = $respuesta["nombre_usuario"];
                        $subject      = "Nuevo ingreso al sistema";
                        $email        = "pablo.eluniversoweb@gmail.com";
                        $fecha        = date("d-m-Y h:i:s");
                        $message      = "Nuevo ingreso al sistema de: " . $name . " hora de ingreso: " . $fecha;
                        $url          = PlantillaControlador::url() . "login";
                        $email_envio  = "info@controlstock.com.ar";
                        $nombre_envio = "Control Stock";

                        PlantillaControlador::enviarEmail("#000000", $name, $subject, $email, $message, $url, $email_envio, $nombre_envio);

                        echo '<script>
                       fncSweetAlert("loading", "Ingresando...", "")
                       window.location = "home";
                       </script>';
                    }
                    else
                    {
                        echo '<div class="alert alert-danger">El usuario no está activado</div>';
                    }
                }
                else
                {
                    echo '<div class="alert alert-danger">Error en usuario o contraseña</div>';
                }
            }
            else
            {
                echo '<div class="alert alert-danger">Error al intentar acceder</div>';
            }
        }
    }

    //Método para renovar contraseña

    public function ctrRenovarPassword()
    {

        if (isset($_POST["resetPassword"]))
        {

            /*=============================================
            Validamos la sintaxis de los campos
            =============================================*/

            if (preg_match('/^[^0-9][.a-zA-Z0-9_]+([.][.a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["resetPassword"]))
            {

                /*=============================================
                Preguntamos primero si el usuario está registrado
                =============================================*/

                $tabla = "usuarios";

                $item  = "email_usuario";
                $valor = $_POST["resetPassword"];

                $respuesta = UsuariosModelo::mdlMostrarUsuarios($tabla, $item, $valor);

                //print_r($respuesta);

                //return;

                if (is_array($respuesta) && ($respuesta["email_usuario"] == $_POST["resetPassword"]))
                {

                    $nuevoPassword = Funciones::genPassword(8);
                    $crypt         = crypt($nuevoPassword, '$2a$07$hdgfamkdhdshsjhduaostyexdj$');
                    $id_usuario    = $respuesta["id_usuario"];

                    $respuesta2 = UsuariosModelo::mdlRenovarPassword($crypt, $id_usuario);

                    if ($respuesta2 == "ok")
                    {

                        /*=============================================
                        Enviamos nueva contraseña al correo electrónico
                        =============================================*/
                        $name         = $respuesta["nombre_usuario"];
                        $subject      = "Renovación de password";
                        $email        = $respuesta["email_usuario"];
                        $message      = "Su nuevo password es: " . $nuevoPassword;
                        $url          = PlantillaControlador::url() . "login";
                        $email_envio  = "info@controlstock.com.ar";
                        $nombre_envio = "Control Stock";

                        $enviarEmail = PlantillaControlador::enviarEmail($name, $subject, $email, $message, $url, $email_envio, $nombre_envio);

                        //echo $enviarEmail;

                        //return;

                        if ($enviarEmail == "ok")
                        {

                            echo '<script>

                                        fncSweetAlert("success", "Se envió una nueva contraseña al correo electronico", "' . $url . '");											

                                    </script>
                                ';
                        }
                        else
                        {

                            echo '<script>

                                        fncSweetAlert("error", "Hubo problemas al enviar la contraseña", "' . $url . '");											

                                    </script>
                                ';
                        }
                    }
                }
                else
                {

                    echo '<script>

								fncSweetAlert("error", "El email no existe en la base de datos", "");

							</script>
						';
                }
            }
            else
            {

                echo '<script>

						fncSweetAlert("error", "Error al escribir el email", "");

					</script>
				';
            }
        }
    }
}
