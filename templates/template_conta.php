<?php $url = "http://sharingdreams.hol.es"; ?>


<html>
	<head>
		<meta charset='UTF-8'>
		<title>Profile: <?php echo $usuario_perfil; ?></title>
        <link href='http://fonts.googleapis.com/css?family=Raleway:500' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="<?php echo $url; ?>/assets/css/datepicker.css">
		<link rel="stylesheet" href="<?php echo $url; ?>/assets/css/index.css">
		<script src="http://sharingdreams.hol.es/assets/js/others/datepicker.js"></script> 
        <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1" />

		<style>
				.capa {
					width:100%;
					background-color:#eee;
				}
				.about-me{
					font-size:12px;
					font-style:italic;
					font-family: Helvetica, Arial, 'lucida grande',tahoma,verdana,arial,sans-serif;
					padding-left:85px;
					padding-right:85px;
					padding-bottom:20px;
					padding-top:16px;
				}
				.city{
					font-size:15px;
				}
		</style>

		<link rel="stylesheet" href="<?php echo $url; ?>/assets/css/index.css">
	</head>
	<body>

         <div class="top tp_marginlg">
                <?php
                	session_start();

                	ini_set('display_errors',1);
					ini_set('display_startup_erros',1);
					error_reporting(E_ALL);
				?>

				<?php if(isset($_SESSION['usuario_logado'])) : ?>
					<div class="logo">
		                <a href="<?php echo $url; ?>"><img src="<?php echo $url; ?>/assets/img/logo.png" class="logo_img"></a>
		                <a href="/submit" class="gotoglr">Submit your art! :)</a>
		            </div>

		            <ul class="menu_list">
	                	<li><a href="/submit" id="menu" class="gotoglr">Submit</a></li>
		                <li><a href="/gallery" id="menu">Gallery</a></li>
		                <li><a href="/editProfile" id="menu">Settings</a>
		                </li>
		                <li><a href="/deslogar.php" id="menu">Logout</a>
		                </li>		                

				   		<?php if (isset($_SESSION['foto'])) : ?>
							<li><a href="/conta.php?user=<?php echo $_SESSION['usuario']; ?>"><img class="perfil_img_menu" src='<?php echo $url; ?>/assets/fotos_perfil/<?php echo $_SESSION['foto']['nome']; ?>' width='50px' height='50px' style='-webkit-border-radius:500; -moz-border-radius: 500px; border-radius: 500px; float:right; margin-top:-20px;'></a></li>
						<?php else : ?>
							<li><a href='/conta.php?user=<?php echo $_SESSION['usuario']; ?>'><img class="perfil_img_menu" src='<?php echo $url; ?>/assets/img/sem-foto.png' width='50px' height='50px' style='-webkit-border-radius:500; -moz-border-radius: 500px; border-radius: 500px; float:right; margin-top:-20px;'></a></li>
						<?php endif; ?>	
					</ul>

				<?php else : ?>
					
					<div class="top">
						<div class="logo">
	                		<a href="<?php echo $url; ?>"><img src="<?php echo $url; ?>/assets/img/logo.png" class="logo_img"></a>
	               		</div>
	               		<ul class="menu_list">
		               		<li id="about_li"><a href='/about.php' id='menu'>About</a></li>
							<li><a href="/join" id="menu">Join</a></li>
		            		<li><a href="/login" id="menu">Login</a></li>
		            	</ul>
	            	</div>
				<?php endif; ?>
        </div>

        	<div class="hr" style="margin-top:10px;"></div>
			<center>
				<div class="capa">
				<?php if (isset($foto_perfil)) :?>
					<img src='<?php echo $url; ?>/assets/fotos_perfil/<?php echo $foto_perfil['nome']; ?>' width="150px" height="150px" style="margin-top: 30px; -webkit-border-radius:500; -moz-border-radius: 500px; border-radius: 500px;">
				<?php else : ?>
					<img src='<?php echo $url; ?>/assets/img/sem-foto.png' width="150px" height="150px" style="margin-top: 30px; -webkit-border-radius:500; -moz-border-radius: 500px; border-radius: 500px;">
				<?php endif; ?>
					<div class="txtg" style="margin-top:20px;"><?php echo $nome_perfil; ?></div>
					<div class="city"><?php echo $endereco_perfil; ?></div>
					<p class="about-me">
						<?php if ($sobre_perfil != "") :?>
							<?php echo $sobre_perfil; ?>
						<?php else : ?>
							No information avaiable
						<?php endif; ?>
					</p>
				</div>

				<div class="hr" style="margin-top:-13px;"></div>
				
				<div class="gallery">
				<br>
					<center>
						<div class="searchLabel" style="margin-top:20px;">My arts</div>
					</center>
				<br>
					
					<?php if (count($artes_artista) > 0) : ?>

						<ol class="gallery_ol">

						<?php while ($arte_artista = (mysqli_fetch_assoc($artes_pagina))) : ?>
							<li align="center" class="art_li">
								<div class="view view-fifth">
								<a href="/?art=<?php echo $arte_artista['id']; ?>">
                                <?php if(file_exists("artes/thumbnails/".$arte_artista['nome'])){?>
                                    <img src="<?php echo $url; ?>/artes/thumbnails/<?php echo $arte_artista['nome']; ?>" class="art_img_src"/>
                                <?php }else{ ?>
                                    <img src="<?php echo $url; ?>/artes/<?php echo $arte_artista['nome']; ?>" class="art_img_src"/>
                                <?php } ?>
                            </a>
									<div class="mask">
										<center>
										<br>
											Did you like it?
										<br>
											<a href="/?art=<?php echo $arte_artista['id']; ?>" style="margin-top:15px;" class="donate">
												See more
											</a>

										</center>

										<?php if (isset($foto_perfil)) :?>
											<img src='<?php echo $url; ?>/assets/fotos_perfil/<?php echo $foto_perfil['nome']; ?>' class="img-author" style="position:absolute; position:absolute; width:41px; height:41px;">
										<?php else : ?>
											<img src='<?php echo $url; ?>/img/sem-foto.png' class="img-author" style="position:absolute; position:absolute; width:41px; height:41px;">
										<?php endif; ?>
										<p class="name-art" style="position:absolute;">"<?php echo $arte_artista['nome_arte']; ?>"</p>
										<p class="name-author" style="position:absolute;"><?php echo $nome_perfil; ?></p>
									</div>
								</div>
							</li>
						<?php endwhile; ?>
						

						<center class="pages_box">
			                <?php

			                    if ($pagina_atual > 1) {
			                        echo "<div class='page-button'><a href='/$id_perfil/".($pagina_atual - 1)."'><<</a></div>";
			                    }

			                    for($i = $inicio; $i <= $limite + 1; $i++) {
			                        if ($i == $pagina_atual) {
			                            echo "<div class='page-button stroke-page'>".$pagina_atual."</div> ";
			                        } else {
			                            if ($i >= 1 && $i <= $numPaginas) {
			                                echo "<div class='page-button'><a  id='num-page' href='/$id_perfil/$i'>".$i."</a></div> ";
			                            }
			                        }
			                    }

			                    if ($pagina_atual < $numPaginas) {
			                        echo "<div class='page-button'><a href='/$id_perfil/".($pagina_atual + 1)."'>>></a></div>";
			                    }
			                ?>
			            </center>
						</ol>

					<?php else : ?>
						<h2>No arts!</h2>
					<?php endif; ?>
				</div>
			</center>
			
		<div style="height:50px;"></div>

	</body>
</html>