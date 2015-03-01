
<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
<link rel="stylesheet" href="assets/css/others/medium-editor.min.css">
    <link rel="stylesheet" href="assets/css/others/themes/default.css">
<style>
                #about_li{
                    width:0;
                    height:0;
                    opacity:0;
                }
                .top{
                    height: 60px;
                    position: fixed;
                    margin-left:0px;
                    width: 100%;
                    background: white;
                    z-index: 9;
                    top: 0;
                    display: inline-block;
                    left: 0;
                    border-bottom: 1px solid #ccc;
                }

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
            <div class="logo">
                <a href='/gallery'><img src="assets/img/logo.png" class="logo_img"></a>
            </div>
            <ul class="menu_list">
                <li><a href="/submit" id="menu">Submit</a></li>
                <li><a href="/editProfile" id="menu">Settings</a></li>
                <li><a href="/deslogar.php" id="menu">Logout</a>
                </li>
				
				<?php if (isset($_SESSION['foto'])) : ?>
					<li>
						<a href="/conta.php?user=<?php echo $_SESSION['usuario']; ?>"><img id="img-ok" src='assets/fotos_perfil/<?php echo $_SESSION['foto']['nome']; ?>' width="50px" height="50px" class="perfil_img_menu" style="-webkit-border-radius:500; -moz-border-radius: 500px; border-radius: 500px; float:right; margin-top:-20px;"></a>
					</li>
				<?php else : ?>
					<li>
						<a href="/conta.php?user=<?php echo $_SESSION['usuario']; ?>"><img id="img-ok" src="assets/img/sem-foto.png" width="50px" height="50px" class="perfil_img_menu" style="-webkit-border-radius:500; -moz-border-radius: 500px; border-radius: 500px; float:right; margin-top:-20px;"></a>
					</li>
				<?php endif ?>
				</li>
            </ul>
        </div>
            <div class="hr" style="margin-top:15px;"></div>
        </div>

        <div style="height:70px;"></div>
        