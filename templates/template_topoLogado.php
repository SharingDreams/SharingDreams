<?php
ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);

include "./libs/config.php";
include "./libs/banco.php";
include "./libs/helper.php";
?>	
		<style>
			a.gotoglr {
                margin-left:20px;
                color:#484848;
                text-decoration:none;
            }
            a.gotoglr:hover {
                text-decoration: underline;
                color:#484848;
            }
            p.txtup {
                font-size:24px;
                margin-top:25px;
            }
		</style>
		
		<div class="top tp_marginlg">
            <div class="logo" id='logo-margin'>
                <a href='/'><img src="./assets/img/logo.png" class="logo_img"></a>
                <a href="/submit" class="gotoglr">Submit your art! :)</a>
            </div>
            <ul class="menu_list" id='menu-margin'>
                <li><a href="/submit" id="menu" class="gotoglr">Submit</a></li>
                <li><a href="/gallery" id="menu">Gallery</a></li>
                <li id="menu"><a href='/editProfile' id='menu'>Settings</a></li>
                <li><a href="deslogar.php" id="menu">Logout</a>
                </li>
				
				<?php if (isset($_SESSION['foto'])) : ?>
					<li>
						<a href="/conta.php?user=<?php echo $_SESSION['usuario']; ?>"><img class="perfil_img_menu" src='http://sharingdreams.hol.es/assets/fotos_perfil/<?php echo $_SESSION['foto']['nome']; ?>' width="50px" height="50px" style="-webkit-border-radius:500; -moz-border-radius: 500px; border-radius: 500px; float:right; margin-top:-20px;"></a>
					</li>
				<?php else : ?>
					<li>
						<a href="/conta.php?user=<?php echo $_SESSION['usuario']; ?>"><img class="perfil_img_menu" src="http://sharingdreams.hol.es/assets/img/sem-foto.png" width="50px" height="50px" style="-webkit-border-radius:500; -moz-border-radius: 500px; border-radius: 500px; float:right; margin-top:-20px;"></a>
					</li>
				<?php endif ?>
				</li>
            </ul>
        </div>
