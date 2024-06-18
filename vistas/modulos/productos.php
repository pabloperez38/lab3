<?php

$categorias = CategoriasControlador::ctrMostrarCategorias(null, null);
#print_r($categorias);

?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6 productos">
                    <h1>Productos</h1>

                    <button type="button" class="btn btn-success btnBoton" data-toggle="modal" data-target="#agregar-producto" tipo="nuevo">
                        <i class="fas fa-plus"></i> Agregar producto
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

        <input type="hidden" id="url" value="<?php echo $url; ?>">

        <table class="table table-bordered table-striped tablaProductos">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>

        </table>

    </section>
    <!-- /.content -->
</div>

<div class="modal fade" id="agregar-producto">

    <form id="agregarProducto" method="post" enctype="multipart/form-data">

        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h4 class="modal-title">Agregar producto</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label>Nombre producto</label>
                        <input type="text" name="nombre_producto" class="form-control" placeholder="Ingrese el nombre del producto" required>
                    </div>

                    <div class="form-group">
                        <label>Categoría</label>
                        <select class="form-control" name="categoria_producto">

                            <option value="">Seleccione un elemento de la lista</option>
                            <?php foreach ($categorias as $key => $value) { ?>

                                <option value="<?php echo $value["id_categoria"]; ?>">
                                    <?php echo $value["nombre_categoria"]; ?>
                                </option>

                            <?php } ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Precio</label>
                        <input type="number" name="precio_producto" class="form-control" placeholder="Ingrese el precio del producto">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputFile">Imagen</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="subirImagen" name="imagen_producto">
                                <label class="custom-file-label" for="exampleInputFile">Seleccione una imagen</label>
                            </div>
                        </div>
                        <img width="100" class="previsualizarImagen" src="" alt="">
                    </div>

                </div>

                <?php
                $agregar = new ProductosControlador();
                $agregar->ctrAgregarProducto();
                ?>

                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fas fa-times"></i>
                        Cerrar</button>
                    <button type="sumbit" class="btn btn-primary"><i class="fas fa-save"></i> Guardar</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->

    </form>
</div>

<div class="modal fade" id="editar-producto">

    <form id="editarProducto" method="post" enctype="multipart/form-data">

        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-warning">
                    <h4 class="modal-title">Editar producto</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label>Nombre producto</label>
                        <input type="text" name="editar_nombre_producto" class="form-control nombre_producto" placeholder="Ingrese el nombre del producto">
                    </div>

                    <div class="form-group">
                        <label>Categoría</label>
                        <select class="form-control" name="editar_categoria_producto" id="categoria">

                            <option value="">Seleccione un elemento de la lista</option>
                            <?php foreach ($categorias as $key => $value) { ?>

                                <option value="<?php echo $value["id_categoria"]; ?>">
                                    <?php echo $value["nombre_categoria"]; ?>
                                </option>

                            <?php } ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Precio</label>
                        <input type="number" name="editar_precio_producto" class="form-control precio_producto" placeholder="Ingrese el precio del producto">
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

                <input type="hidden" class="editar_id_producto" name="editar_id_producto" value="">

                <?php
                $editar = new ProductosControlador();
                $editar->ctrEditarProducto();
                ?>

                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fas fa-times"></i>
                        Cerrar</button>
                    <button type="sumbit" class="btn btn-primary"><i class="fas fa-save"></i> Guardar</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->

    </form>
</div>

<?php
$eliminar = new ProductosControlador();
$eliminar->ctrEliminarProducto();
?>