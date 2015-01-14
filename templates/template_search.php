

		<div class="gallery">
            <div class="searchLabel">Search: <?php echo protege_busca($_GET['q']); ?></div>
            <br>
            <ol class="gallery_ol">
                <?php while ($arte = (mysqli_fetch_assoc($artes_pagina))) : ?>
                        <?php 
                                $artista = buscar_dados_artista($mysqli, $arte['cadastro_id']);
                                $usuario_artista = $artista['usuario'];
                                $nome_artista = $artista['nome'];
                                $foto_artista = buscar_foto($mysqli, $arte['cadastro_id']);
                                ?>
                    <li align="center" class="art_li">
                        <div class="view view-fifth">
                            <a href="/?art=<?php echo $arte['id']; ?>">
                                <?php if(file_exists("artes/thumbnails/".$arte['nome'])){?>
                                    <img src="artes/thumbnails/<?php echo $arte['nome']; ?>" class="art_img_src"/>
                                <?php }else{ ?>
                                    <img src="artes/<?php echo $arte['nome']; ?>" class="art_img_src"/>
                                <?php } ?>
                            </a>
                            <div class="mask">
                                <center>
                                    <br>Did you like it?
                                    <br>    <a href="/?art=<?php echo $arte['id']; ?>" style="margin-top:15px;" class="donate">
                                        See more
                                    </a>
                                    <div style="height:5px;"></div>
                                    <div class="fb-like" data-href="http://sharingdreams.hol.es/artes/<?php echo $arte['nome']; ?>" data-layout="button_count" data-action="like" data-show-faces="false" data-share="true"></div>
                                        <a href="http://www.pinterest.com/pin/create/button/?url=http://sharingdreams.hol.es/&media=http://sharingdreams.hol.es/artes/<?php echo $arte['nome']; ?>&description=Look this art made by <?php echo $usuario_artista; ?>! I loved it!!" data-pin-do="buttonPin">
        <img src="//assets.pinterest.com/images/pidgets/pin_it_button.png" />
    </a>
                                </center>

                                
                                    
                                <?php if (isset($foto_artista)) : ?>    
                                    <a href='/conta.php?user=<?php echo $usuario_artista; ?>'><img src="assets/fotos_perfil/<?php echo $foto_artista['nome'] ?>" class="img-author" style="position:absolute; width:41px; height:41px;"></a>
                                <?php else : ?>
                                    <a href='/conta.php?user=<?php echo $usuario_artista; ?>'><img src="assets/img/sem-foto.png" class="img-author" style="position:absolute; width:41px; height:41px;"></a>
                                <?php endif ?>
                                <p class="name-art"  style="position:absolute;">"<?php echo $arte['nome_arte']; ?>"</p>
                                <a href='/conta.php?user=<?php echo $usuario_artista; ?>'><p class="name-author"  style="position:absolute;"><?php echo $nome_artista; ?></p></a>
                            </div>
                        </div>
                    </li>
                <?php endwhile; ?>
                </ol>

                <center class="pages_box">
                    <?php

                        if ($pagina_atual > 1) {
                            echo "<div class='page-button'><a href='/?q=$busca&page=".($pagina_atual - 1)."'><<</a></div>";
                        }

                        for($i = $inicio; $i <= $limite + 1; $i++) {
                            if ($i == $pagina_atual) {
                                echo "<div class='page-button stroke-page'>".$pagina_atual."</div> ";
                            } else {
                                if ($i >= 1 && $i <= $numPaginas) {
                                    echo "<div class='page-button'><a  id='num-page' href='/?q=$busca&page=$i'>".$i."</a></div> ";
                                }
                            }
                        }

                        if ($pagina_atual < $numPaginas) {
                            echo "<div class='page-button'><a href='/?q=$busca&page=".($pagina_atual + 1)."'>>></a></div>";
                        }
                    ?>
                </center>
            
            <br>
            </div>
        </div>

