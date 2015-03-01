<html>
    
    <head>
        <title>Sharing Dreams</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="http://sharingdreams.co/assets/css/others/lightbox.css"/>
        <link href='http://fonts.googleapis.com/css?family=Raleway:500' rel='stylesheet' type='text/css'>
        <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1" />
        <link rel="stylesheet" href="http://sharingdreams.co/assets/css/index.css">
        <link rel="stylesheet" href="http://sharingdreams.co/assets/css/terms.css">
        <script>
          (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
          (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
          m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
          })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

          ga('create', 'UA-60227935-1', 'auto');
          ga('send', 'pageview');

        </script>
    </head>
    <?php
            if(isset($_SESSION['usuario_logado'])) {
                if(isset($_GET['art'])) {
                    include "templates/template_topoLogado.php";
                } else {
                    include "libs/menu_logado.php";
                }
            } else{
                if(isset($_GET['art'])) {

                    #include "libs/config.php";
                    #include "libs/banco.php";
                    #include "libs/helper.php";
                    include "libs/Classes/Cadastros.php";

                    echo "<div class='top'>
                        <div class='logo'>
                            <a href='/gallery'><img src='http://sharingdreams.co/assets/img/logo.png' class='logo_img'></a>
                        </div>
                        <ul class='menu_list'>
                            <li><a href='/about.php' id='menu'>About</a></li>
                            <li><a href='/join' id='menu'>Join</a></li>
                            <li><a href='/login' id='menu'>Login</a></li>
                        </ul>
                    </div>";
                } else {
                    include "templates/menu_visitante.php";
                }
            }
        ?>
    <body>
        <div id="terms">
        This privacy policy has been compiled to better serve those who are concerned with how their 'Personally identifiable information' (PII) is being used online. PII, as used in US privacy law and information security, is information that can be used on its own or with other information to identify, contact, or locate a single person, or to identify an individual in context. Please read our privacy policy carefully to get a clear understanding of how we collect, use, protect or otherwise handle your Personally Identifiable Information in accordance with our website.
        <br>
        <br>
        <b>
            What personal information do we collect from the people that visit our blog, website or app?
        </b>
        <br>
        When ordering or registering on our site, as appropriate, you may be asked to enter your name, email address, mailing address, Age, photo or other details to help you with your experience.
        <br><br>
        <b>
            When do we collect information?
        </b>
        <br>
        We collect information from you when you register on our site, fill out a form or enter information on our site.
        <br><br>
        <b>
            How do we use your information?
        </b>
        <br>
        We may use the information we collect from you when you register, make a donation, surf the website, or use certain other site features in the following ways:<br>
        <ul>
            <li>
                To improve your Sharing Dreams' profile.
            </li>
        </ul>
        <br><br>
        <b>
            How do we protect visitor information?
        </b>
        <br>
        <ul>
            <li>
                We do not use vulnerability scanning and/or scanning to PCI standards.
            </li>
            <li>
                We do not use Malware Scanning.
            </li>
            <li>
                We do not use an SSL certificate
            </li>
        </ul>
        <br><br>
        <b>
            Do we use 'cookies'?
        </b>
        <br>
        We do not use cookies for tracking purposes
        You can choose to have your computer warn you each time a cookie is being sent, or you can choose to turn off all cookies. You do this through your browser (like Internet Explorer) settings. Each browser is a little different, so look at your browser's Help menu to learn the correct way to modify your cookies.
        If you disable cookies off, some features will be disabled that make your site experience more efficient and some of our services will not function properly.
        However, you can still place orders.
        <br><br>
        <b>
            Third Party Disclosure
        </b>
        <br>
        We do not sell, trade, or otherwise transfer to outside parties your personally identifiable information unless we provide you with advance notice. This does not include website hosting partners and other parties who assist us in operating our website, conducting our business, or servicing you, so long as those parties agree to keep this information confidential. We may also release your information when we believe release is appropriate to comply with the law, enforce our site policies, or protect ours or others' rights, property, or safety. 
        However, non-personally identifiable visitor information may be provided to other parties for marketing, advertising, or other uses.
        <br><br>
        <b>
            Third party links
        </b>
        <br>
        Occasionally, at our discretion, we may include or offer third party products or services on our website. These third party sites have separate and independent privacy policies. We therefore have no responsibility or liability for the content and activities of these linked sites. Nonetheless, we seek to protect the integrity of our site and welcome any feedback about these sites.
        <br><br>
        <b>
            Google
        </b>
        <br>
        Google's advertising requirements can be summed up by Google's Advertising Principles. They are put in place to provide a positive experience for users. https://support.google.com/adwordspolicy/answer/1316548?hl=en 
        We have enabled Google Analytics on our site.
        <br><br>
        <b>
            California Online Privacy Protection Act
        </b>
        <br>
        CalOPPA is the first state law in the nation to require commercial websites and online services to post a privacy policy. The law's reach stretches well beyond California to require a person or company in the United States (and conceivably the world) that operates websites collecting personally identifiable information from California consumers to post a conspicuous privacy policy on its website stating exactly the information being collected and those individuals with whom it is being shared, and to comply with this policy. - See more at: http://consumercal.org/california-online-privacy-protection-act-caloppa/#sthash.0FdRbT51.dpuf
        <br>
        According to CalOPPA we agree to the following:
        Users can visit our site anonymously
        Once this privacy policy is created, we will add a link to it on our home page, or as a minimum on the first significant page after entering our website.
        Our Privacy Policy link includes the word 'Privacy', and can be easily be found on the page specified above.
        <br>
        Users will be notified of any privacy policy changes:
        <br>
        <ul>
            <li>
                On our Privacy Policy Page
            </li>
        </ul>
        <br>
        Users are able to change their personal information:
        <br>
        <ul>
            <li>
                By emailing us
            </li>
            <li>
                By logging in to their account
            </li>
        </ul>
        <br><br>
        <b>
            How does our site handle do not track signals?
        </b>
        <br>
        We honor do not track signals and do not track, plant cookies, or use advertising when a Do Not Track (DNT) browser mechanism is in place.
        <br><br>
        <b>
            Does our site allow third party behavioral tracking?
        </b>
        <br>
        It's also important to note that we allow third party behavioral tracking (Google Analytics).
        <br><br>
        <b>
            COPPA (Children Online Privacy Protection Act)
        </b>
        <br>
        When it comes to the collection of personal information from children under 13, the Children's Online Privacy Protection Act (COPPA) puts parents in control. The Federal Trade Commission, the nation's consumer protection agency, enforces the COPPA Rule, which spells out what operators of websites and online services must do to protect children's privacy and safety online.
        We do not specifically market to children under 13.
        
        <br><br>
        <b>
            Fair Information Practices
        </b>
        <br>
        The Fair Information Practices Principles form the backbone of privacy law in the United States and the concepts they include have played a significant role in the development of data protection laws around the globe. Understanding the Fair Information Practice Principles and how they should be implemented is critical to comply with the various privacy laws that protect personal information.
        In order to be in line with Fair Information Practices we will take the following responsive action, should a data breach occur:
        <br><br>
        We will notify the users via email
        <br>
        <ul>
            <li>
                Within 7 business days
            </li>
        </ul>
        <br><br>
        We will notify the users via in site notification
        <br>
        <ul>
            <li>
                Within 7 business days
            </li>
        </ul>
        <br>
        We also agree to the individual redress principle, which requires that individuals have a right to pursue legally enforceable rights against data collectors and processors who fail to adhere to the law. This principle requires not only that individuals have enforceable rights against data users, but also that individuals have recourse to courts or a government agency to investigate and/or prosecute non-compliance by data processors.

        <br><br>
        <b>
            CAN SPAM Act
        </b>
        <br>
        The CAN-SPAM Act is a law that sets the rules for commercial email, establishes requirements for commercial messages, gives recipients the right to have emails stopped from being sent to them, and spells out tough penalties for violations.
        <br><br>
        <b>
            We collect your email address in order to:
            To be in accordance with CANSPAM we agree to the following:
            If at any time you would like to unsubscribe from receiving future emails, you can
            and we will promptly remove you from ALL correspondence.
        </b>

        <br><br>
        <b>
            Contacting Us
        </b>
        If there are any questions regarding this privacy policy you may contact us using the information below.<br>
        <br>
        sharingdreams.co<br>
        Guarapuava/Sao Sebastiao/Rio de Janeiro<br>
        Brazil<br>
        PR/SP/RJ<br>
        contact@sharingdreams.co<br>
        <br>
        Last Edited on 2015-02-25<br>
    </div>
</body>
</html>