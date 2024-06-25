<?php

$configuracion = PlantillaControlador::ctrMostrarConfiguracion("id_configuracion", 1);

?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Configuración</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo $url; ?>">Home</a></li>
                        <li class="breadcrumb-item active">Configuración</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">

        <div class="modal-body">

            <div class="form-group">
                <label>Nombre empresa</label>
                <input value="<?php echo $configuracion["empresa_configuracion"]; ?>" type="text" name="empresa_configuracion" class="form-control empresa_configuracion" placeholder="Ingrese el nombre del producto">
            </div>
            <div class="form-group">
                <label>Email empresa</label>
                <input value="<?php echo $configuracion["email_configuracion"]; ?>" type="text" name="email_configuracion" class="form-control email_configuracion" placeholder="Ingrese el nombre del producto">
            </div>
            <div class="form-group">
                <label>Teléfono empresa</label>
                <input value="<?php echo $configuracion["telefono_configuracion"]; ?>" type="text" name="telefono_configuracion" class="form-control telefono_configuracion" placeholder="Ingrese el nombre del producto">
            </div>

        </div>

        <input type="hidden" class="id_configuracion" name="id_configuracion" value="<?php echo $configuracion["id_configuracion"]; ?>">

        <input type="hidden" id="url" value="<?php echo $url; ?>">

        <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fas fa-times"></i>
                Cerrar</button>
            <button type="button" id="guardarConfiguracion" class="btn btn-primary"><i class="fas fa-save"></i> Guardar</button>
        </div>

    </section>
</div>