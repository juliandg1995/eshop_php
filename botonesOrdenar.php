<!-- Dependiendo de qué filtro active el usuario, cambiarán los archivos y funciones ejecutadas por el formulario -->
<!-- Los posibles casos considerados son los siguientes: 
    1- Filtrado por nombre únicamente
    2- Filtrado por categoría
    3- Filtrado por nombre, ordenado por precio
    4- Filtrado por nombre, ordenado por fecha
    5- Filtrado por categoría, ordenado por precio
    6- Filtrado por categoría, ordenado por fecha
    7- Filtrado por nombre y categoría, y ordenado por precio o fecha -->

<?php if($_SERVER["SCRIPT_FILENAME"] == $_SERVER['DOCUMENT_ROOT']."/e-shop_actual/busquedaPorNombre.php") { ?>
    <div class="row form-group dflex justify-content-between mt-4">
        <div class="col-3">
            <form action="ordenarPorPrecio.php?pagina=<?= $pagina; ?>&nombre=<?= $nombre; ?>" method="POST">
                <button type="submit" class="btn btn-info btn-sm p-2">Ordenar por precio</button>
            </form>
        </div>
        <div class="col-3">
            <form action="ordenarPorFecha.php?pagina=<?= $pagina; ?>&nombre=<?= $nombre; ?>" method="POST">
                <button type="submit" class="btn btn-info btn-sm float-right p-2 ">Ordenar por fecha</button>
            </form>
        </div>
    </div>
<?php }
      else{
        if($_SERVER["SCRIPT_FILENAME"] == $_SERVER['DOCUMENT_ROOT']."/e-shop_actual/busquedaPorCategoria.php") { ?>
            <div class="row form-group dflex justify-content-between mt-4">
                <div class="col-3">
                    <form action="ordenarPorPrecio.php?pagina=<?= $pagina; ?>&idCategoria=<?= $idCategoria; ?>" method="POST">
                        <button type="submit" class="btn btn-info btn-sm p-2">Ordenar por precio</button>
                    </form>
                </div>
                <div class="col-3">
                    <form action="ordenarPorFecha.php?pagina=<?= $pagina; ?>&idCategoria=<?= $idCategoria; ?>" method="POST">
                        <button type="submit" class="btn btn-info btn-sm float-right p-2 ">Ordenar por fecha</button>
                    </form>
                </div>
            </div>
      <?php }
        elseif ($_SERVER["SCRIPT_FILENAME"] == $_SERVER['DOCUMENT_ROOT']."/e-shop_actual/ordenarPorPrecio.php") {
            if (isset($idCategoria)) { ?>
                <div class="row form-group dflex justify-content-between mt-4">
                    <div class="col-3">
                        <form action="ordenarPorPrecio.php?pagina=<?= $pagina; ?>&idCategoria=<?= $idCategoria; ?>" method="POST">
                            <button type="submit" class="btn btn-info btn-sm p-2">Ordenar por precio</button>
                        </form>
                    </div>
                    <div class="col-3">
                        <form action="ordenarPorFecha.php?pagina=<?= $pagina; ?>&idCategoria=<?= $idCategoria; ?>" method="POST">
                            <button type="submit" class="btn btn-info btn-sm float-right p-2 ">Ordenar por fecha</button>
                        </form>
                    </div>
                </div>
        <?php 
            }
            elseif (isset($nombre)) { ?>
                <div class="row form-group dflex justify-content-between mt-4">
                    <div class="col-3">
                        <form action="ordenarPorPrecio.php?pagina=<?= $pagina; ?>&nombre=<?= $nombre; ?>" method="POST">
                            <button type="submit" class="btn btn-info btn-sm p-2">Ordenar por precio</button>
                        </form>
                    </div>
                    <div class="col-3">
                        <form action="ordenarPorFecha.php?pagina=<?= $pagina; ?>&nombre=<?= $nombre; ?>" method="POST">
                            <button type="submit" class="btn btn-info btn-sm float-right p-2 ">Ordenar por fecha</button>
                        </form>
                    </div>
                </div>
                
       <?php     }
                else{ ?>
                    <div class="row form-group dflex justify-content-between mt-4">
                    <div class="col-3">
                        <form action="ordenarPorPrecio.php?pagina=<?= $pagina;?>" method="POST">
                            <button type="submit" class="btn btn-info btn-sm p-2">Ordenar por precio</button>
                        </form>
                    </div>
                    <div class="col-3">
                        <form action="ordenarPorFecha.php?pagina=<?= $pagina;?>" method="POST">
                            <button type="submit" class="btn btn-info btn-sm float-right p-2 ">Ordenar por fecha</button>
                        </form>
                    </div>
                </div>
        <?php
    }
        }
        elseif ($_SERVER["SCRIPT_FILENAME"] == $_SERVER['DOCUMENT_ROOT']."/e-shop_actual/ordenarPorFecha.php") {
            if (isset($idCategoria)) { ?>
                <div class="row form-group dflex justify-content-between mt-4">
                    <div class="col-3">
                        <form action="ordenarPorPrecio.php?pagina=<?= $pagina; ?>&idCategoria=<?= $idCategoria; ?>" method="POST">
                            <button type="submit" class="btn btn-info btn-sm p-2">Ordenar por precio</button>
                        </form>
                    </div>
                    <div class="col-3">
                        <form action="ordenarPorFecha.php?pagina=<?= $pagina; ?>&idCategoria=<?= $idCategoria; ?>" method="POST">
                            <button type="submit" class="btn btn-info btn-sm float-right p-2 ">Ordenar por fecha</button>
                        </form>
                    </div>
                </div>
        <?php }
            elseif (isset($nombre)) { ?>
                <div class="row form-group dflex justify-content-between mt-4">
                    <div class="col-3">
                        <form action="ordenarPorPrecio.php?pagina=<?= $pagina; ?>&nombre=<?= $nombre; ?>" method="POST">
                            <button type="submit" class="btn btn-info btn-sm p-2">Ordenar por precio</button>
                        </form>
                    </div>
                    <div class="col-3">
                        <form action="ordenarPorFecha.php?pagina=<?= $pagina; ?>&nombre=<?= $nombre; ?>" method="POST">
                            <button type="submit" class="btn btn-info btn-sm float-right p-2 ">Ordenar por fecha</button>
                        </form>
                    </div>
                </div>   
          <?php  }
                else{ ?>
                    <div class="row form-group dflex justify-content-between mt-4">
                    <div class="col-3">
                        <form action="ordenarPorPrecio.php?pagina=<?= $pagina;?>" method="POST">
                            <button type="submit" class="btn btn-info btn-sm p-2">Ordenar por precio</button>
                        </form>
                    </div>
                    <div class="col-3">
                        <form action="ordenarPorFecha.php?pagina=<?= $pagina;?>" method="POST">
                            <button type="submit" class="btn btn-info btn-sm float-right p-2 ">Ordenar por fecha</button>
                        </form>
                    </div>
                </div>
        <?php } 
            }
        else{ ?>
        <div class="row form-group dflex justify-content-between mt-4">
            <div class="col-3">
                <form action="ordenarPorPrecio.php?pagina=<?= $pagina; ?>" method="POST">
                    <button type="submit" class="btn btn-info btn-sm p-2">Ordenar por precio</button>
                </form>
            </div>
            <div class="col-3">
                <form action="ordenarPorFecha.php?pagina=<?= $pagina; ?>" method="POST">
                    <button type="submit" class="btn btn-info btn-sm float-right p-2 ">Ordenar por fecha</button>
                </form>
            </div>
        </div>
     <?php } 
    } ?>

