
    <head>
        <meta charset='UTF-8'>
        <title>Sharing Dreams</title>
        <link rel="stylesheet" href="assets/css/index.css">
        <link href='http://fonts.googleapis.com/css?family=Raleway:500' rel='stylesheet' type='text/css'>
        <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1" />
    </head>
    
    <body>

        <?php

			session_start();

			ini_set('display_errors',1);
			ini_set('display_startup_erros',1);
			error_reporting(E_ALL);

			if(isset($_SESSION['usuario_logado'])) {
                if(isset($_GET['art'])) {
                    include "templates/template_topoLogado.php";
                } else {
                    include "libs/menu_logado.php";
                }
			} else{
                if(isset($_GET['art'])) {

                    include "libs;config.php";
                    include "libs/banco.php";
                    include "libs/helper.php";
                    include "Classes/Cadastros.php";

                    echo "<div class='top'>
                        <div class='logo'>
                            <a href='/'><img src='assets/img/logo.png' class='logo_img'></a>
                        </div>
                        <ul class='menu_list'>
                            <li><a href='/join' id='menu'>Join</a></li>
                            <li><a href='/login' id='menu'>Login</a></li>
                        </ul>
                    </div>";
                } else {
                     echo "<div class='top'>
                        <div class='logo'>
                            <a href='/'><img src='assets/img/logo.png' class='logo_img'></a>
                        </div>
                        <ul class='menu_list'>
                            <li><a href='/join' id='menu'>Join</a></li>
                            <li><a href='/login' id='menu'>Login</a></li>
                        </ul>
                    </div>";
                }
			}

		?>
        <div class="hr"></div>

		<center>
			<ul class="about_team">
				<li class="about_team_member">
					<img src="assets/img/rizzo.png" class="about_team_member_image rizzo">
					<p class="about_team_member_name">Guilherme Vieira Rizzo</p>
					<p class="about_team_member_do">Webdesigner</p>
					<p class="about_team_member_email">guivr2011@gmail.com</p>
				</li>
				<li class="about_team_member">
					<img src="assets/img/nerone.png" class="about_team_member_image leo">
					<p class="about_team_member_name">Leonardo Felipe Nerone</p>
					<p class="about_team_member_do">Programmer</p>
					<p class="about_team_member_email" id="email_leo">leonardofelipenerone@gmail.com</p>
				</li>
				<li class="about_team_member">
					<img src="assets/img/garcia.png" class="about_team_member_image thor">
					<p class="about_team_member_name">Thor Garcia</p>
					<p class="about_team_member_do">App Developer</p>
					<p class="about_team_member_email">thor.fc21@gmail.com</p>
				</li>
				<li class="about_team_member">
					<img src="assets/img/escudero.png" class="about_team_member_image joao">
					<p class="about_team_member_name">Joao Escudero</p>
					<p class="about_team_member_do">Programmer</p>
					<p class="about_team_member_email">joaovescudero@gmail.com</p>
				</li>
			</ul>


			<div class="about_text">
				Created by 4 teenagers, Sharing Dreams is an institution without profit with only one goal: To slowly turn the planet into a better place. Currently, the organization donates to four institutions, which are: Unicef, Medicos sem fronteiras (MSF), Heal Africa and Legião da Boa Vontade-LBV. The money raising happens this way: A person posts a picture of their art on the institution site/app. This art stays publicly exposed, receiving voluntary donations at the same time from any person in any part of the planet. The raised money is shared between the four institutions, which use the money to humanitary issues. WIth all this process, Sharing Dreams has 3 main goals: To develop teenagers' creative side, to develop your humanitarian thinking and to help needy teenagers from all over the world
			</div>
		</center>
    </body>
