<?php

require_once '../controladores/productos.controlador.php';
require_once '../modelos/productos.modelo.php';

class TablaProductos
{
    /*========================
    MOSTRAR TABLA DE PRODUCTOS
    =============================================*/

    public function mostrarTablaProductos()
    {
        $productos = ProductosControlador::ctrMostrarProductos(null, null);

        //print_r(count($productos));

        if (count($productos) == 0)
        {

            echo '{"data": []}';

            return;
        }

        $datosJson = '{"data" : [';

        for ($i = 0; $i < count($productos); $i++)
        {
            if ($productos[$i]["estado_producto"] == 1)
            {
                $estado = "<span class='badge badge-success'>Activo</span>";
            }
            else
            {
                $estado = "<span class='badge badge-danger'>Inactivo</span>";
            }

            //Traemos las acciones
            $acciones = "<a type='button' class='btn bg-gradient-warning btnBoton'  href = 'index.php?pagina=editar-producto&id_producto=" . $productos[$i]["id_producto"] . "' ><i class='fas fa-edit'></i></a> <button type='button' id_producto = '" . $productos[$i]["id_producto"] . "' class='btn bg-gradient-danger btnEliminarProducto'><i class='fas fa-trash'></i></button>";
            /*  $acciones = "<button type='button' class='btn bg-gradient-warning btnBoton' tipo = 'editar' id_producto = '" . $productos[$i]["id_producto"] . "'  data-toggle='modal' data-target='#editar-producto'><i class='fas fa-edit'></i></button> <button type='button' id_producto = '" . $productos[$i]["id_producto"] . "' class='btn bg-gradient-danger btnEliminarProducto'><i class='fas fa-trash'></i></button>"; */

            $datosJson .= '[
                        "' . $productos[$i]["nombre_producto"] . '",
                        "' . $productos[$i]["precio_producto"] . '",
                        "' . $estado . '",
                        "' . $acciones . '"
                    ],';
        }
        $datosJson = substr($datosJson, 0, -1);

        $datosJson .= ']
        }';

        echo $datosJson;
    }
}

/*========================
    ACTIVAR TABLA DE PRODUCTOS
    =============================================*/
$activarproductos = new TablaProductos();
$activarproductos->mostrarTablaProductos();
