<?php

require_once '../controladores/usuarios.controlador.php';
require_once '../modelos/usuarios.modelo.php';

class AjaxUsuarios
{

    /*=============================================
TRAER USUARIO
    =============================================*/

    public $email_usuario;

    public function ajaxTraerUsuario()
    {
        $item  = "email_usuario";
        $valor = $this->email_usuario;

        $respuesta = UsuariosControlador::ctrMostrarUsuarios($item, $valor);

        echo json_encode($respuesta);
    }

}

if (isset($_POST["validarUsuario"]))
{
    $traerUsuario                = new AjaxUsuarios();
    $traerUsuario->email_usuario = $_POST["validarUsuario"];
    $traerUsuario->ajaxTraerUsuario();
}
