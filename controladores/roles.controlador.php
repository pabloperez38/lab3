<?php

class RolesControlador
{
    //$item -> campo de la BD (id_producto, email_usuario)
    //$valor -> valor del registro (2, pablo@pablo.com)

    //Método para traer información
    static public function ctrMostrarRoles($item, $valor)
    {
        $tabla = "roles";
        $respuesta = RolesModelo::mdlMostrarRoles($tabla, $item, $valor);

        return $respuesta;
    }
}
