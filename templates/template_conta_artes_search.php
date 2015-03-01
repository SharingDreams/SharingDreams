<?php 
	session_start();
	$url = "http://sharingdreams.co"; 
?>


<html>
	<head>
		<title>Profile: <?php echo $usuario_perfil; ?></title>
		<meta charset="UTF-8">
        <link href='http://fonts.googleapis.com/css?family=Raleway:500' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="<?php echo $url; ?>/assets/css/datepicker.css">
		<link rel="stylesheet" href="<?php echo $url; ?>/assets/css/index.css">
		<script src="http://sharingdreams.co/assets/js/others/datepicker.js"></script> 
        <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1" />

		<style>
				.capa {
					width:100%;
					background-color:#eee;
					text-align:center;
					display:inline-block;
					margin-top:-2px;
				}
				.about-me{
					font-size:12px;
					font-style:italic;
					font-family: Helvetica, Arial, 'lucida grande',tahoma,verdana,arial,sans-serif;
					padding-bottom:20px;
					text-align:center;
				}
				.city{
					font-size:15px;
				}
				@media(max-width: 329px){
					ul.menu_list{
						margin-left:-60px;
					}
					.logo_img{
						margin-left:0px !important;
					}
				}
		</style>
		<script>
          (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
          (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
          m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
          })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

          ga('create', 'UA-60227935-1', 'auto');
          ga('send', 'pageview');

        </script>

		<script>
		  window.fbAsyncInit = function() {
		    FB.init({
		      appId      : '410942295730302',
		      xfbml      : true,
		      version    : 'v2.2'
		    });
		  };

		  (function(d, s, id){
		     var js, fjs = d.getElementsByTagName(s)[0];
		     if (d.getElementById(id)) {return;}
		     js = d.createElement(s); js.id = id;
		     js.src = "//connect.facebook.net/en_US/sdk.js";
		     fjs.parentNode.insertBefore(js, fjs);
		   }(document, 'script', 'facebook-jssdk'));
		</script>
<script type="text/javascript" src="//assets.pinterest.com/js/pinit.js"></script>

		<link rel="stylesheet" href="<?php echo $url; ?>/assets/css/index.css">
	</head>
	<body>

                <?php
                	ini_set('display_errors',1);
					ini_set('display_startup_erros',1);
					error_reporting(E_ALL);
				?>

				<?php if(isset($_SESSION['usuario_logado'])) : ?>
         <div class="top tp_marginlg">
					<div class="logo">
		                <a href="/gallery"><img src="<?php echo $url; ?>/assets/img/logo.png" class="logo_img"></a>
		            </div>

		            <ul class="menu_list">
	                	<li><a href="/submit" id="menu">Submit</a></li>
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

				</div>


				<?php else : ?>
					

					<div class="top">
						<div class="logo">
	                		<a href="/gallery"><img src="<?php echo $url; ?>/assets/img/logo.png" class="logo_img"></a>
	               		</div>
	               		<ul class="menu_list">
		               		<li id="about_li"><a href='/about.php' id='menu'>About</a></li>
							<li><a href="/join" id="menu">Join</a></li>
		            		<li><a href="/login" id="menu">Login</a></li>
		            	</ul>
	            	</div>
				<?php endif; ?>
        </div>
        	<div class="hr"></div>
        		<div class="capa">
				<a href="http://sharingdreams.co/<?php echo $id_perfil; ?>/page/1/<?php echo $usuario_perfil; ?>/">
					<?php if (isset($foto_perfil)) :?>
						<img class="img_conta" src='<?php echo $url; ?>/assets/fotos_perfil/<?php echo $foto_perfil['nome']; ?>' width="150px" height="150px">
					<?php else : ?>
						<img class="img_conta" src='<?php echo $url; ?>/assets/img/sem-foto.png' width="150px" height="150px">
					<?php endif; ?>
				</a>
					<div class="txtg" style="margin-top:20px;"><?php echo $nome_perfil = str_replace("\\", "", $nome_perfil); $nome_perfil; ?></div>
					<div class="city"><?php $endereco_perfil = str_replace("\\", "", $endereco_perfil); echo $endereco_perfil; ?></div>
					<p class="about-me"><?php if($ban == true){?><font color="red" size="3">This account is disabled because the user now at days is 18 years old or above!</font><br>
						<?php } if ($sobre_perfil != "") : $sobre_perfil = str_replace("\\", "", $sobre_perfil);?>
							<?php echo $sobre_perfil; ?>
						<?php else : ?>
							No information avaiable
						<?php endif; ?>
					</p>
				</div>

				<div class="hr ssss"></div>
				
				<div class="gallery">
					<div style="height:35px;"></div>
						<center>
							<div class="searchLabel" style="margin-top:20px;">My arts</div>
						</center>
					<br>
					<form method="GET" action="/enviar.php">
		                <center>
		                    <input type="text" name="q" id="search" class="search_art_conta" placeholder="Find my works">
							<input type="hidden" name="id" value="<?php echo $id_perfil; ?>">
							<input type="hidden" name="name" value="<?php echo $usuario_perfil; ?>">
		                    <input type="submit" value="" class="search-button-after">
		                </center>
		            </form>
		            <div class="searchLabel">Search: <?php if($_GET["q"] == "nullnothing"){echo "";}else{echo protege_busca($_GET["q"]);} ?></div>
					
					<?php if (count($artes_artista) > 0) : ?>

						<ol class="gallery_ol">

						<?php while ($arte_artista = (mysqli_fetch_assoc($artes_pagina))) : $arte_nome_id = str_replace(" ", "-", $arte_artista['nome_arte']);$arte_nome_id = str_replace(".", "-", $arte_nome_id);
                    $arte_nome_id = str_replace("<", "-", $arte_nome_id);
                    $arte_nome_id = str_replace(">", "-", $arte_nome_id);
                    $arte_nome_id = str_replace("&lt;", "-", $arte_nome_id);
                    $arte_nome_id = str_replace("&gt;", "-", $arte_nome_id);
                    $arte_nome_id = str_replace("/", "-", $arte_nome_id);?>
							<li align="center" class="art_li">
								<div class="view view-fifth">
								<a href="/art/<?php echo $arte_nome_id; ?>/<?php echo $arte_artista['id']; ?>0">
                                    <img src="<?php echo $url; ?>/artes/thumbnails/<?php echo $arte_artista['nome']; ?>" class="art_img_src"/>
                            </a>
									<div class="mask">
										<center>
										<br>
											Did you like it?
										<br>
											<a href="/art/<?php echo $arte_nome_id; ?>/<?php echo $arte_artista['id']; ?>0" style="margin-top:15px;" class="donate">
												See more
											</a>
											<div style="height:5px;"></div>
                                    		<div class="fb-like" data-href="http://sharingdreams.co/art/<?php echo $arte_nome_id; ?>/<?php echo $arte_artista['id']; ?>0" data-layout="button_count" data-action="like" data-share="true" data-show-faces="false"></div>
                                        	<a href="http://www.pinterest.com/pin/create/button/?url=http://sharingdreams.co/&media=http://sharingdreams.co/artes/<?php echo $arte_artista['nome']; ?>&description=Look this art made by <?php echo $nome_perfil; ?>! I loved it!! http://sharingdreams.co/art/<?php echo $arte_nome_id; ?>/<?php echo $arte_artista['id']; ?>0" data-pin-do="buttonPin">
		                                        <img src="//assets.pinterest.com/images/pidgets/pin_it_button.png" />
		                                    </a>


										</center>

										<?php if (isset($foto_perfil)) :?>
											<img src='<?php echo $url; ?>/assets/fotos_perfil/<?php echo $foto_perfil['nome']; ?>' class="img-author" style="position:absolute; position:absolute; width:41px; height:41px;">
										<?php else : ?>
											<img src='<?php echo $url; ?>/assets/img/sem-foto.png' class="img-author" style="position:absolute; position:absolute; width:41px; height:41px;">
										<?php endif; ?>
										<a href='/art/<?php echo $arte_nome_id; ?>/<?php echo $arte_artista['id']; ?>0'>
		                                    <p class="name-art"  style="position:absolute;">
		                                        "<?php if(strlen($arte_artista['nome_arte']) >= 24){$narte = substr($arte_artista['nome_arte'], 0, 21); echo $narte."...";}else{echo $arte_artista['nome_arte'];}  ?>"
		                                    </p>
		                                </a>
										<p class="name-author" style="position:absolute;"><?php if(strlen($nome_perfil) >= 24){$narte = substr($nome_perfil, 0, 21); echo $narte."...";}else{echo $nome_perfil;}  ?></p>
									</div>
								</div>
							</li>
						<?php endwhile; ?>
						

						<center class="pages_box pages_box_profile">
			                <?php

			                    if ($pagina_atual > 1) {
			                        echo "<div class='page-button'><a id='num-page-final' href='/$id_perfil/".($pagina_atual - 1)."/$usuario_perfil/$search'><<</a></div>";
			                    }

			                    for($i = $inicio; $i <= $limite + 1; $i++) {
			                        if ($i == $pagina_atual) {
			                            echo "<div class='page-button stroke-page'>".$pagina_atual."</div> ";
			                        } else {
			                            if ($i >= 1 && $i <= $numPaginas) {
			                                echo "<div class='page-button'><a  id='num-page' href='/$id_perfil/$i/$usuario_perfil/$search'>".$i."</a></div> ";
			                            }
			                        }
			                    }

			                    if ($pagina_atual < $numPaginas) {
			                        echo "<div class='page-button'><a id='num-page-final' href='/$id_perfil/".($pagina_atual + 1)."/$usuario_perfil/$search'>>></a></div>";
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