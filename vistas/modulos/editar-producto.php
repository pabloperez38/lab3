<?php

$categorias = CategoriasControlador::ctrMostrarCategorias(null, null);
#print_r($categorias);

?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Home</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo $url; ?>">Home</a></li>
                        <li class="breadcrumb-item active">Home</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <h1>Editar producto</h1>

        <?php

        $producto = ProductosControlador::ctrMostrarProductos("id_producto", $_GET["id_producto"]);

        ?>

        <form id="editarProducto" method="post" enctype="multipart/form-data">

            <div class="modal-header bg-warning">
                <h4 class="modal-title">Editar producto</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="form-group">
                    <label>Nombre producto</label>
                    <input value="<?php echo $producto["nombre_producto"]; ?>" type="text" name="editar_nombre_producto" class="form-control nombre_producto" placeholder="Ingrese el nombre del producto">
                </div>

                <div class="form-group">
                    <label>Categoría</label>
                    <select class="form-control" name="editar_categoria_producto" id="categoria">

                        <option value="">Seleccione un elemento de la lista</option>
                        <?php foreach ($categorias as $key => $value) { ?>

                            <option <?php if ($producto["categoria_producto"] == $value["id_categoria"]) { ?> selected <?php } ?> value="<?php echo $value["id_categoria"]; ?>">
                                <?php echo $value["nombre_categoria"]; ?>
                            </option>

                        <?php } ?>
                    </select>
                </div>

                <div class="form-group">
                    <label>Precio</label>
                    <input value="<?php echo $producto["precio_producto"]; ?>" type="number" name="editar_precio_producto" class="form-control precio_producto" placeholder="Ingrese el precio del producto">
                </div>

                <div class="form-group">
                    <label for="exampleInputFile">Imagen</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="subirImagen" name="editar_imagen_producto">
                            <label class="custom-file-label" for="exampleInputFile">Seleccione una imagen</label>
                        </div>
                    </div>
                    <img width="100" class="previsualizarImagen" src="" alt="">
                </div>

            </div>

            <input type="hidden" class="editar_id_producto" name="editar_id_producto" value="<?php echo $producto["id_producto"]; ?>">

            <?php
            $editar = new ProductosControlador();
            $editar->ctrEditarProducto();
            ?>

            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fas fa-times"></i>
                    Cerrar</button>
                <button type="sumbit" class="btn btn-primary"><i class="fas fa-save"></i> Guardar</button>
            </div>



        </form>
</div>

</section>
<!-- /.content -->
</div>