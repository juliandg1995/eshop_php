<?php if ($_SERVER["SCRIPT_FILENAME"] == $_SERVER['DOCUMENT_ROOT']."/e-shop_actual/ordenarPorPrecio.php") { 
        if (isset($nombre)) 
            { ?>
            <nav aria-label="Page navigation example" id="barraPaginacion">
                <ul class="pagination justify-content-center">
                    <li class="page-item <?php if($pagina == 1 ) : echo "disabled"; endif ?>">
                        <a class="page-link" href="ordenarPorPrecio.php?pagina=<?= $Previous; ?>&nombre=<?= $nombre; ?>" tabindex="-1">Previous</a>
                    </li>
                    <?php for($i = 1; $i <= $nroPaginas; $i++) : ?>
                    <li class="page-item">
                        <a class="page-link" href="ordenarPorPrecio.php?pagina=<?= $i; ?>&nombre=<?= $nombre; ?>"><?= $i; ?>
                        </a>
                    </li>
                    <?php endfor; ?>
                    <li class="page-item <?php if($pagina == $nroPaginas) : echo "disabled"; endif ?>">
                        <a class="page-link" id="next" href="ordenarPorPrecio.php?pagina=<?= $Next; ?>&nombre=<?= $nombre; ?>">Next</a>
                    </li>
                </ul>
            </nav>    
<?php       }
        else{
            if (isset($idCategoria)) { ?>
                <nav aria-label="Page navigation example" id="barraPaginacion">
                    <ul class="pagination justify-content-center">
                        <li class="page-item <?php if($pagina == 1 ) : echo "disabled"; endif ?>">
                            <a class="page-link" href="ordenarPorPrecio.php?pagina=<?= $Previous; ?>&idCategoria=<?= $idCategoria;?>" tabindex="-1">Previous</a>
                        </li>
                        <?php for($i = 1; $i <= $nroPaginas; $i++) : ?>
                        <li class="page-item">
                            <a class="page-link" href="ordenarPorPrecio.php?pagina=<?= $i; ?>&idCategoria=<?= $idCategoria;?>"><?= $i; ?></a>
                        </li>
                        <?php endfor; ?>
                        <li class="page-item <?php if($pagina == $nroPaginas) : echo "disabled"; endif ?>">
                            <a class="page-link" id="next" href="ordenarPorPrecio.php?pagina=<?= $Next; ?>&idCategoria=<?= $idCategoria;?>">Next</a>
                        </li>
                    </ul>
                </nav>
         <?php }
         else{?>
            <nav aria-label="Page navigation example" id="barraPaginacion">
                <ul class="pagination justify-content-center">
                    <li class="page-item <?php if($pagina == 1 ) : echo "disabled"; endif ?>">
                        <a class="page-link" href="ordenarPorPrecio.php?pagina=<?= $Previous; ?>" tabindex="-1">Previous</a>
                    </li>
                    <?php for($i = 1; $i <= $nroPaginas; $i++) : ?>
                        <li class="page-item">
                            <a class="page-link" href="ordenarPorPrecio.php?pagina=<?= $i; ?>"><?= $i; ?>
                            </a>
                        </li>
                    <?php endfor; ?>
                    <li class="page-item <?php if($pagina == $nroPaginas) : echo "disabled"; endif ?>">
                        <a class="page-link" id="next" href="ordenarPorPrecio.php?pagina=<?= $Next; ?>">Next</a>
                    </li>
                </ul>
            </nav><?php 
            } 
    }
}
    else{
        if($_SERVER["SCRIPT_FILENAME"] == $_SERVER['DOCUMENT_ROOT']."/e-shop_actual/busquedaPorNombre.php"){ 
            if (isset($_REQUEST['idCategoria'])) { 
                $idCategoria = $_REQUEST['idCategoria'];
                include_once "busquedaPorNombre.php"; ?>
                <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                    <li class="page-item <?php if($pagina == 1 ) : echo "disabled"; endif ?>">
                        <a class="page-link" href="busquedaPorNombre.php?pagina=<?= $Previous; ?>&nombre=<?= $nombre; ?>&idCategoria=<?= $idCategoria; ?>" tabindex="-1">Previous</a>
                    </li>
                    <?php for($i = 1; $i <= $nroPaginas; $i++) : ?>
                        <li class="page-item">
                            <a class="page-link" href="busquedaPorNombre.php?pagina=<?= $i; ?>&nombre=<?= $nombre; ?>&idCategoria=<?= $idCategoria; ?>">
                                <?= $i; ?>
                            </a>
                        </li>
                    <?php endfor; ?>
                    <li class="page-item <?php if($pagina == $nroPaginas) : echo "disabled"; endif ?>">
                        <a class="page-link" href="busquedaPorNombre.php?pagina=<?= $Next;?>&nombre=<?= $nombre; ?>&idCategoria=<?= $idCategoria; ?>">Next</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="index.php" >Home</a>
                    </li>
                </ul>
            </nav>

            <?php }
            else{ 
            include_once "busquedaPorNombre.php";?>
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                    <li class="page-item <?php if($pagina == 1 ) : echo "disabled"; endif ?>">
                        <a class="page-link" href="busquedaPorNombre.php?pagina=<?= $Previous; ?>&nombre=<?= $nombre; ?>" tabindex="-1">Previous</a>
                    </li>
                    <?php for($i = 1; $i <= $nroPaginas; $i++) : ?>
                        <li class="page-item">
                            <a class="page-link" href="busquedaPorNombre.php?pagina=<?= $i; ?>&nombre=<?= $nombre; ?>">
                                <?= $i; ?>
                            </a>
                        </li>
                    <?php endfor; ?>
                    <li class="page-item <?php if($pagina == $nroPaginas) : echo "disabled"; endif ?>">
                        <a class="page-link" href="busquedaPorNombre.php?pagina=<?= $Next;?>&nombre=<?= $nombre; ?>">Next</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="index.php" >Home</a>
                    </li>
                </ul>
            </nav><?php 
        }
    }
        elseif($_SERVER["SCRIPT_FILENAME"] == $_SERVER['DOCUMENT_ROOT']."/e-shop_actual/ordenarPorFecha.php"){
                if (isset($nombre)) { 
                    ?>
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center">
                            <li class="page-item <?php if($pagina == 1 ) : echo "disabled"; endif ?>">
                                <a class="page-link" href="ordenarPorFecha.php?pagina=<?= $Previous; ?>&nombre=<?= $nombre; ?>" tabindex="-1">Previous</a>
                            </li>
                                <?php for($i = 1; $i <= $nroPaginas; $i++) : ?>
                                    <li class="page-item">
                                        <a class="page-link" href="ordenarPorFecha.php?pagina=<?= $i; ?>&nombre=<?= $nombre; ?>"><?= $i; ?></a>
                                    </li>
                                <?php endfor; ?>
                                <li class="page-item <?php if($pagina == $nroPaginas) : echo "disabled"; endif ?>">
                                    <a class="page-link" href="ordenarPorFecha.php?pagina=<?= $Next; ?>&nombre=<?= $nombre; ?>">Next</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="index.php" >Home</a>
                                </li>
                        </ul>
                    </nav>
                <?php
                }
                 else {
                    if (isset($idCategoria)) {
                    ?>
                       <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-center">
                                <li class="page-item <?php if($pagina == 1 ) : echo "disabled"; endif ?>">
                                    <a class="page-link" href="ordenarPorFecha.php?pagina=<?= $Previous; ?>&idCategoria=<?= $idCategoria;?>" tabindex="-1">Previous</a>
                                </li>
                                <?php for($i = 1; $i <= $nroPaginas; $i++) : ?>
                                    <li class="page-item">
                                        <a class="page-link" href="ordenarPorFecha.php?pagina=<?= $i; ?>&idCategoria=<?= $idCategoria;?>"><?= $i; ?></a>
                                    </li>
                                <?php endfor; ?>
                                <li class="page-item <?php if($pagina == $nroPaginas) : echo "disabled"; endif ?>">
                                    <a class="page-link" href="ordenarPorFecha.php?pagina=<?= $Next; ?>&idCategoria=<?= $idCategoria;?>">Next</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="index.php" >Home</a>
                                </li>
                            </ul>
                        </nav> 
                <?php 
                        }
                        else{ ?>
                            <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-center">
                                <li class="page-item <?php if($pagina == 1 ) : echo "disabled"; endif ?>">
                                    <a class="page-link" href="ordenarPorFecha.php?pagina=<?= $Previous;?>" tabindex="-1">Previous</a>
                                </li>
                                <?php for($i = 1; $i <= $nroPaginas; $i++) : ?>
                                    <li class="page-item">
                                        <a class="page-link" href="ordenarPorFecha.php?pagina=<?= $i;?>"><?= $i; ?></a>
                                    </li>
                                <?php endfor; ?>
                                <li class="page-item <?php if($pagina == $nroPaginas) : echo "disabled"; endif ?>">
                                    <a class="page-link" href="ordenarPorFecha.php?pagina=<?= $Next;?>">Next</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="index.php" >Home</a>
                                </li>
                            </ul>
                        </nav> 
                      <?php } 
                    }     
            } 
            elseif($_SERVER["SCRIPT_FILENAME"] == $_SERVER['DOCUMENT_ROOT']."/e-shop_actual/busquedaPorCategoria.php")
                {
                ?>
                    <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                    <li class="page-item <?php if($pagina == 1 ) : echo "disabled"; endif ?>">
                        <a class="page-link" href="busquedaPorCategoria.php?pagina=<?= $Previous; ?>&idCategoria=<?= $idCategoria;?>" tabindex="-1">Previous</a>
                    </li>
                    <?php for($i = 1; $i <= $nroPaginas; $i++) : ?>
                        <li class="page-item">
                            <a class="page-link" href="busquedaPorCategoria.php?pagina=<?= $i; ?>&idCategoria=<?= $idCategoria;?>">
                                <?= $i; ?>
                            </a>
                        </li>
                    <?php endfor; ?>
                    <li class="page-item <?php if($pagina == $nroPaginas) : echo "disabled"; endif ?>">
                        <a class="page-link" href="busquedaPorCategoria.php?pagina=<?= $Next; ?>&idCategoria=<?= $idCategoria;?>">Next</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="index.php" >Home</a>
                    </li>
                </ul>
            </nav>
            <?php 
                } 
            else 
                { ?>  
                <nav aria-label="Page navigation example" id="barraPaginacion">
                    <ul class="pagination justify-content-center">
                        <li class="page-item <?php if($pagina == 1 ) : echo "disabled"; endif ?>">
                            <a class="page-link" href="index.php?pagina=<?= $Previous; ?>" tabindex="-1">Previous</a>
                        </li>
                        <?php if (isset($nroPaginas)) { ?>    
                        <?php for($i = 1; $i <= $nroPaginas; $i++) : ?>
                            <li class="page-item">
                                <a class="page-link" href="index.php?pagina=<?= $i; ?>"><?= $i; ?></a>
                            </li>
                        <?php endfor; ?>
                        <?php } ?>
                        <li class="page-item <?php if($pagina == $nroPaginas) : echo "disabled"; endif ?>">
                            <a class="page-link" id="next" href="index.php?pagina=<?= $Next; ?>">Next</a>
                        </li>
                    </ul>
                </nav> 
                <?php
                }     
    }   ?>