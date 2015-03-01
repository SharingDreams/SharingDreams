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
            <b>
                1. Your Acceptance
            </b>
            <li>
                1. By using or visiting the Sharing Dreams website or any Sharing Dreams products, software, data feeds, and services provided to you on, from, or through the Sharing Dreams website (collectively the "Service") you signify your agreement to (1) these terms and conditions (the "Terms of Service"), (2) Sharing Dreams's Privacy Policy, found at <a href="http://www.sharingdreams.co/terms/privacy">http://www.sharingdreams.co/terms/privacy</a> and incorporated herein by reference, and (3) Sharing Dreams' Community Guidelines, found at <a href="http://www.sharingdreams.co/terms/community_guidelines">http://www.sharingdreams.co/terms/community_guidelines</a> and also incorporated herein by reference. If you do not agree to any of these terms, the Sharing Dreams Privacy Policy, or the Community Guidelines, please do not use the Service.
            </li>
            <li>
                2. Although we may attempt to notify you when major changes are made to these Terms of Service, you should periodically review the most up-to-date version, (<a href="http://www.sharingdreams.co/terms">http://www.sharingdreams.co/terms</a>). Sharing Dreams may, in its sole discretion, modify or revise these Terms of Service and policies at any time, and you agree to be bound by such modifications or revisions. Nothing in these Terms of Service shall be deemed to confer any third-party rights or benefits.
            </li>
            <li>
                3. People who access or use the Sharing Dreams' website from another jurisdictions they do by their own risk and are responsible for respecting regional/international laws.  
            </li>
            <li>
                4. To accept the Terms of Use, you claim to have age greater than or equal to 13 years old, to have legal authorization held by parents or guardians, and fully capable of consenting to the terms, conditions, obligations, affirmations, representations and guarantees described in these Terms of Use, obey them and stick to them. In any circunstances, you affirm being older or equal to 13 years old. To register a Sharing Dreams' account, you claim to have age greater than or equal to 13 years old and under 18, because the publication of arts in the Sharing Dreams' website/app is designed for young people under 18 years old. If you are under 13 years old or over 17, you should not register on the Sharing Dreams' website/app, only will be able to help with donations: <a href="http://sharingdreams.co/about">http://sharingdreams.co/about</a> or enjoy published arts at the gallery: <a href="http://sharingdreams.co/gallery">http://sharingdreams.co/gallery</a>. 
            </li>
            <b>
                2. Service
            </b>
            <li>
                These Terms of Service apply to all users of the Service, including users who are also contributors of Content on the Service. “Content” includes the text, graphics, images, sounds, musics, videos, audiovisual combinations, interactive features and other materials you may view on, access through, or contribute to the Service. The Service includes all aspects of Sharing Dreams.
            </li>
            <li>
                The Service may contain links to third party websites that are not owned or controlled by Sharing Dreams. Sharing Dreams has no control over, and assumes no responsibility for, the content, privacy policies, or practices of any third party websites. In addition, Sharing Dreams nwill not and cannot censor or edit the content of any third-party site. By using the Service, you expressly relieve Sharing Dreams from any and all liability arising from your use of any third-party website.
            </li>
            <li>
                Accordingly, we encourage you to be aware when you leave the Service and to read the terms and conditions and privacy policy of each other website that you visit.
            </li>
            <b>
                3. Sharing Dreams Accounts
            </b>
            <li>
                In order to access some features of the Service, you will have to create a Sharing Dreams account. You may never use another's account without permission. When creating your account, you must provide accurate and complete information. You are solely responsible for the activity that occurs on your account, and you must keep your account password secure. You must notify Sharing Dreams immediately of any breach of security or unauthorized use of your account.
            </li>
            <li>
                Although Sharing Dreams will not be liable for your losses caused by any unauthorized use of your account, you may be liable for the losses of Sharing Dreams or others due to such unauthorized use.
            </li>
            <b>
                4. Sharing Dreams' Donators
            </b>
                <li>
                    If you are a Sharing Dreams' donator, you are aware that the money donated by the PayPal platform is going to a brazillian bank account in name of "Guilherme Vieira Rizzo" and all the money from donations will be given to these institutes:
                    <br>
                    <ul>
                        <li>
                            UNICEF (unicef.org.br)
                        </li>
                        <li>
                            Médecins Sans Frontières (MSF) (msf.org)
                        </li>
                        <li>
                            HEAL AFRICA (healafrica.org)
                        </li>
                        <li>
                            CARE (care.org)
                        </li>
                    </ul>
                    <br>
                    And you know that you can check our PayPal reports at: <a href="http://medium.com/@wesharingdreams">http://medium.com/@wesharingdreams</a>
                </li>
            <b>
                5. General Use of the Service—Permissions and Restrictions
            </b>
            <br>
            Sharing Dreams hereby grants you permission to access and use the Service as set forth in these Terms of Service, provided that:
            <li>
                You agree not to distribute in any medium any part of the Service or the Content without Sharing Dreams’ prior written authorization unless Sharing Dreams makes available the means for such distribution through functionality offered by the Service (such as the Facebook Like and Share button, Pin button, etc).
            </li>
            <li>
                You agree not to alter or modify any part of the Service.
            </li>
            <li>
                You agree not to use the Service for any of the following commercial uses unless you obtain Sharing Dreams’ prior written approval:
                <ul>
                    <li>
                        the sale of access to the Service;
                    </li>
                    <li>
                        the sale of advertising, sponsorships, or promotions placed on or within the Service or Content; or
                    <li>
                        the sale of advertising, sponsorships, or promotions on any page of an ad-enabled blog or website containing Content delivered via the Service.
                    </li>
                </ul>
                <br>
                Prohibited commercial uses do not include:
                <br>
                <ul>
                    <li>
                        uploading an original art to Sharing Dreams or maintaining an original profile on Sharing Dreams, to promote your business or artistic enterprise;
                    </li>
                    <li>
                        expor artes da galeria do Sharing Dreams através de compartilhamento em redes sociais, sem prejuízo das restrições à publicidade acima estabelecidos na Seção 4.D; ou
                    </li>
                    <li>
                        any use that Sharing Dreams expressly authorizes in writing..
                    </li>
                </ul>
                <br>
                (For more information about what constitutes a prohibited commercial use, see our FAQ.)
            </li>
            <li>
                You agree not to use or launch any automated system, including without limitation, "robots," "spiders," or "offline readers," that accesses the Service in a manner that sends more request messages to the Sharing Dreams servers in a given period of time than a human can reasonably produce in the same period by using a conventional on-line web browser. Notwithstanding the foregoing, Sharing Dreams grants the operators of public search engines permission to use spiders to copy materials from the site for the sole purpose of and solely to the extent necessary for creating publicly available searchable indices of the materials, but not caches or archives of such materials. Sharing Dreams reserves the right to revoke these exceptions either generally or in specific cases. You agree not to collect or harvest any personally identifiable information, including account names, from the Service, nor to use the communication systems provided by the Service (e.g., comments, email) for any commercial solicitation purposes. You agree not to solicit, for commercial purposes, any users of the Service with respect to their Content.
            </li>
            <li>
                In your use of the Service, you will comply with all applicable laws.
            </li>
            <li>
                Sharing Dreams reserves the right to discontinue any aspect of the Service at any time.
            </li>
            <b>
                6. Your Use of Content
            </b>
            <br>
            In addition to the general restrictions above, the following restrictions and conditions apply specifically to your use of Content.
            <li>
                The Content on the Service, and the trademarks, service marks and logos ("Marks") on the Service, are owned by or licensed to Sharing Dreams, subject to copyright and other intellectual property rights under the law.
            </li>
            <li>
                Content is provided to you AS IS. You may access Content for your information and personal use solely as intended through the provided functionality of the Service and as permitted under these Terms of Service. You shall not copy, reproduce, distribute, sell, license, or otherwise exploit any Content for any other purposes without the prior written consent of the respective licensors of the Content. Sharing Dreams and its licensors reserve all rights not expressly granted in and to the Service and the Content.
            </li>
            <li>
                You agree not to circumvent, disable or otherwise interfere with security-related features of the Service or features that prevent or restrict use or copying of any Content or enforce limitations on use of the Service or the Content therein.
            </li>
            <li>
                You understand that when using the Service, you will be exposed to Content from a variety of sources, and that Sharing Dreams is not responsible for the accuracy, usefulness, safety, or intellectual property rights of or relating to such Content. You agree to waive, and hereby do waive, any legal or equitable rights or remedies you have or may have against Sharing Dreams with respect thereto, and, to the extent permitted by applicable law, agree to indemnify and hold harmless Sharing Dreams, its owners, operators, licensors, and licensees to the fullest extent allowed by law regarding all matters related to your use of the Service.
            </li>
            <b>
                7. Your Content and Conduct
            </b>
            <li>
                As a Sharing Dreams account holder you may submit Content to the Service, including arts and texts. You understand that Sharing Dreams does not guarantee any confidentiality with respect to any Content you submit.
            </li>
            <li>
                You shall be solely responsible for your own Content and the consequences of submitting and publishing your Content on the Service. You affirm, represent, and warrant that you own or have the necessary licenses, rights, consents, and permissions to publish Content you submit; and you license to Sharing Dreams all patent, trademark, copyright or other proprietary rights in and to such Content for publication on the Service pursuant to these Terms of Service. 
            </li>
            <li>
                For clarity, you retain all of your ownership rights in your Content. However, by submitting Content to Sharing Dreams, you hereby grant Sharing Dreams a worldwide, non-exclusive, royalty-free, sublicenseable and transferable license to use, reproduce, distribute, prepare derivative works of, display, and perform the Content in connection with the Service and Sharing Dreams’ (and its successors') business, including without limitation for promoting and redistributing part or all of the Service (and derivative works thereof) in any media formats and through any media channels. You also hereby grant each user of the Service a non-exclusive license to access your Content through the Service, and to use, reproduce, distribute, display and perform such Content as permitted through the functionality of the Service and under these Terms of Service. The above licenses granted by you in art Content you submit to the Service terminate within a commercially reasonable time after you remove or delete your arts from the Service. You understand and agree, however, that Sharing Dreams may retain, but not display, distribute, or perform, server copies of your arts that have been removed or deleted. The above licenses granted by you in user comments you submit are perpetual and irrevocable.
            </li>
            <li>
                You further agree that Content you submit to the Service will not contain third party copyrighted material, or material that is subject to other third party proprietary rights.
            </li>
            <li>
                You further agree that you will not submit to the Service any Content or other material that is contrary to the Sharing Dreams’ Community Guidelines, currently found at https://www.sharingdreams.co/terms/community_guidelines, which may be updated from time to time, or contrary to applicable local, national, and international laws and regulations. 
            </li>
            <li>
                Sharing Dreams does not endorse any Content submitted to the Service by any user or other licensor, or any opinion, recommendation, or advice expressed therein, and Sharing Dreams expressly disclaims any and all liability in connection with Content. Sharing Dreams does not permit copyright infringing activities and infringement of intellectual property rights on the Service, and Sharing Dreams will remove all Content if properly notified that such Content infringes on another's intellectual property rights. Sharing Dreams reserves the right to remove Content without prior notice.
            </li>
            <b>
                8. Account Termination Policy
            </b>
            <li>
                Sharing Dreams will terminate a user's access to the Service if, under appropriate circumstances, the user is determined to be a repeat infringer.
            </li>
            <li>
                Sharing Dreams reserves the right to decide whether Content violates these Terms of Service for reasons other than copyright infringement, such as, but not limited to, pornography, obscenity, or excessive length. Sharing Dreams may at any time, without prior notice and in its sole discretion, remove such Content and/or terminate a user's account for submitting such material in violation of these Terms of Service.
            </li>
            <b>
                9. Copyright
            </b>
            <li>
                If you are a copyright owner or an agent thereof and believe that any Content infringes upon your copyrights, you may submit an e-mail to copyright@sharingdreams.co with the following information in writing:
            </li>
            <ul>
                <li>
                    A physical or electronic signature of a person authorized to act on behalf of the owner of an exclusive right that is allegedly infringed;
                </li>
                <li>
                    Identification of the copyrighted work claimed to have been infringed, or, if multiple copyrighted works at a single online site are covered by a single notification, a representative list of such works at that site;
                </li>
                <li>
                    Identification of the material that is claimed to be infringing or to be the subject of infringing activity and that is to be removed or access to which is to be disabled and information reasonably sufficient to permit the service provider to locate the material;
                <li>
                    Information reasonably sufficient to permit the service provider to contact you, such as an address, telephone number, and, if available, an electronic mail;
                </li>
                <li>
                    A statement that you have a good faith belief that use of the material in the manner complained of is not authorized by the copyright owner, its agent, or the law; and
                </li>
                <li>
                    A statement that the information in the notification is accurate, and under penalty of perjury, that you are authorized to act on behalf of the owner of an exclusive right that is allegedly infringed.
                </li>
            </ul>
            <li>
                Sharing Dreams’ designated e-mail to receive notifications of claimed infringement is: copyright@sharingdreams.co. Any other feedback, comments, requests for technical support, and other communications should be directed to Sharing Dreams e-mail: contact@sharingdreams.co. You acknowledge that if you fail to comply with all of the requirements of this Section 6(D), your e-mail notice may not be valid.
            </li>
            <li>
                Counter-Notice. If you believe that your Content that was removed (or to which access was disabled) is not infringing, to post and use the material in your Content, you may send a counter-notice e-mail to copyright@sharingdreams.co containing the following information:
            </li>
            <ul>
                <li>
                    Your physical or electronic signature;
                </li>
                <li>
                    Identification of the Content that has been removed or to which access has been disabled and the location at which the Content appeared before it was removed or disabled;
                </li>
                <li>
                    A statement that you have a good faith belief that the Content was removed or disabled as a result of mistake or a misidentification of the Content; and
                </li>
                <li>
                    Your name, address, telephone number, and e-mail address, and a statement that you will accept service of process from the person who provided notification of the alleged infringement.
                </li>
            </ul>
            <li>
                If a counter-notice is received by the Copyright Agent, Sharing Dreams may send a copy of the counter-notice to the original complaining party informing that person that it may replace the removed Content or cease disabling it in 10 business days. Unless the copyright owner files an action seeking a court order against the Content provider, member or user, the removed Content may be replaced, or access to it restored, in 10 to 14 business days or more after receipt of the counter-notice, at Sharing Dreams’ sole discretion.
            </li>
            <b>
                10. Warranty Disclaimer
            </b>
                <li>
                    YOU AGREE THAT YOUR USE OF THE SERVICES SHALL BE AT YOUR SOLE RISK. TO THE FULLEST EXTENT PERMITTED BY LAW, SHARING DREAMS, ITS OFFICERS, DIRECTORS, EMPLOYEES, AND AGENTS DISCLAIM ALL WARRANTIES, EXPRESS OR IMPLIED, IN CONNECTION WITH THE SERVICES AND YOUR USE THEREOF. SHARING DREAMS MAKES NO WARRANTIES OR REPRESENTATIONS ABOUT THE ACCURACY OR COMPLETENESS OF THIS SITE'S CONTENT OR THE CONTENT OF ANY SITES LINKED TO THIS SITE AND ASSUMES NO LIABILITY OR RESPONSIBILITY FOR ANY (I) ERRORS, MISTAKES, OR INACCURACIES OF CONTENT, (II) PERSONAL INJURY OR PROPERTY DAMAGE, OF ANY NATURE WHATSOEVER, RESULTING FROM YOUR ACCESS TO AND USE OF OUR SERVICES, (III) ANY UNAUTHORIZED ACCESS TO OR USE OF OUR SECURE SERVERS AND/OR ANY AND ALL PERSONAL INFORMATION AND/OR FINANCIAL INFORMATION STORED THEREIN, (IV) ANY INTERRUPTION OR CESSATION OF TRANSMISSION TO OR FROM OUR SERVICES, (IV) ANY BUGS, VIRUSES, TROJAN HORSES, OR THE LIKE WHICH MAY BE TRANSMITTED TO OR THROUGH OUR SERVICES BY ANY THIRD PARTY, AND/OR (V) ANY ERRORS OR OMISSIONS IN ANY CONTENT OR FOR ANY LOSS OR DAMAGE OF ANY KIND INCURRED AS A RESULT OF THE USE OF ANY CONTENT POSTED, EMAILED, TRANSMITTED, OR OTHERWISE MADE AVAILABLE VIA THE SERVICES. SHARING DREAMS DOES NOT WARRANT, ENDORSE, GUARANTEE, OR ASSUME RESPONSIBILITY FOR ANY PRODUCT OR SERVICE ADVERTISED OR OFFERED BY A THIRD PARTY THROUGH THE SERVICES OR ANY HYPERLINKED SERVICES OR FEATURED IN ANY BANNER OR OTHER ADVERTISING, AND SHARING DREAMS WILL NOT BE A PARTY TO OR IN ANY WAY BE RESPONSIBLE FOR MONITORING ANY TRANSACTION BETWEEN YOU AND THIRD-PARTY PROVIDERS OF PRODUCTS OR SERVICES. AS WITH THE PURCHASE OF A PRODUCT OR SERVICE THROUGH ANY MEDIUM OR IN ANY ENVIRONMENT, YOU SHOULD USE YOUR BEST JUDGMENT AND EXERCISE CAUTION WHERE APPROPRIATE.
                </li>
            <b>
                11. Limitation of Liability
            </b>
                <li>
                    IN NO EVENT SHALL SHARING DREAMS, ITS OFFICERS, DIRECTORS, EMPLOYEES, OR AGENTS, BE LIABLE TO YOU FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, PUNITIVE, OR CONSEQUENTIAL DAMAGES WHATSOEVER RESULTING FROM ANY (I) ERRORS, MISTAKES, OR INACCURACIES OF CONTENT, (II) PERSONAL INJURY OR PROPERTY DAMAGE, OF ANY NATURE WHATSOEVER, RESULTING FROM YOUR ACCESS TO AND USE OF OUR SERVICES, (III) ANY UNAUTHORIZED ACCESS TO OR USE OF OUR SECURE SERVERS AND/OR ANY AND ALL PERSONAL INFORMATION AND/OR FINANCIAL INFORMATION STORED THEREIN, (IV) ANY INTERRUPTION OR CESSATION OF TRANSMISSION TO OR FROM OUR SERVICES, (IV) ANY BUGS, VIRUSES, TROJAN HORSES, OR THE LIKE, WHICH MAY BE TRANSMITTED TO OR THROUGH OUR SERVICES BY ANY THIRD PARTY, AND/OR (V) ANY ERRORS OR OMISSIONS IN ANY CONTENT OR FOR ANY LOSS OR DAMAGE OF ANY KIND INCURRED AS A RESULT OF YOUR USE OF ANY CONTENT POSTED, EMAILED, TRANSMITTED, OR OTHERWISE MADE AVAILABLE VIA THE SERVICES, WHETHER BASED ON WARRANTY, CONTRACT, TORT, OR ANY OTHER LEGAL THEORY, AND WHETHER OR NOT THE COMPANY IS ADVISED OF THE POSSIBILITY OF SUCH DAMAGES. THE FOREGOING LIMITATION OF LIABILITY SHALL APPLY TO THE FULLEST EXTENT PERMITTED BY LAW IN THE APPLICABLE JURISDICTION.
                    YOU SPECIFICALLY ACKNOWLEDGE THAT SHARING DREAMS SHALL NOT BE LIABLE FOR CONTENT OR THE DEFAMATORY, OFFENSIVE, OR ILLEGAL CONDUCT OF ANY THIRD PARTY AND THAT THE RISK OF HARM OR DAMAGE FROM THE FOREGOING RESTS ENTIRELY WITH YOU.
                    The Service is controlled and offered by Sharing Dreams from its facilities in the United States of America. Sharing Dreams makes no representations that the Service is appropriate or available for use in other locations. Those who access or use the Service from other jurisdictions do so at their own volition and are responsible for compliance with local law.
                </li>
            <b>
                12. Indemnity
            </b>
                <li>
                    To the extent permitted by applicable law, you agree to defend, indemnify and hold harmless Sharing Dreams, its parent corporation, officers, directors, employees and agents, from and against any and all claims, damages, obligations, losses, liabilities, costs or debt, and expenses (including but not limited to attorney's fees) arising from: (i) your use of and access to the Service; (ii) your violation of any term of these Terms of Service; (iii) your violation of any third party right, including without limitation any copyright, property, or privacy right; or (iv) any claim that your Content caused damage to a third party. This defense and indemnification obligation will survive these Terms of Service and your use of the Service.
                </li>
            <b>
                13. Ability to Accept Terms of Service
            </b>
                <li>
                    You affirm that you are either more than 18 years of age, or an emancipated minor, or possess legal parental or guardian consent, and are fully able and competent to enter into the terms, conditions, obligations, affirmations, representations, and warranties set forth in these Terms of Service, and to abide by and comply with these Terms of Service. In any case, you affirm that you are over the age of 13, as the Service is not intended for children under 13. If you are under 13 years of age, then please do not use the Service. There are lots of other great web sites for you. Talk to your parents about what sites are appropriate for you.
                </li>
            <b>
                14. Assignment
            </b>
                <li>
                    These Terms of Service, and any rights and licenses granted hereunder, may not be transferred or assigned by you, but may be assigned by Sharing Dreams without restriction.
                </li>
            <b>
                15. General
            </b>
                <li>
                    You agree that: (i) the Service shall be deemed solely based in California; and (ii) the Service shall be deemed a passive website that does not give rise to personal jurisdiction over Sharing Dreams, either specific or general, in jurisdictions other than California. These Terms of Service shall be governed by the internal substantive laws of the State of California, without respect to its conflict of laws principles. Any claim or dispute between you and Sharing Dreams that arises in whole or in part from the Service shall be decided exclusively by a court of competent jurisdiction located in Santa Clara County, California. These Terms of Service, together with the Privacy Notice at <a href="http://sharingdreams.co/terms/privacy">http://www.sharingdreams.co/terms/privacy</a> and any other legal notices published by Sharing Dreams on the Service, shall constitute the entire agreement between you and Sharing Dreams concerning the Service. If any provision of these Terms of Service is deemed invalid by a court of competent jurisdiction, the invalidity of such provision shall not affect the validity of the remaining provisions of these Terms of Service, which shall remain in full force and effect. No waiver of any term of this these Terms of Service shall be deemed a further or continuing waiver of such term or any other term, and Sharing Dreams’ failure to assert any right or provision under these Terms of Service shall not constitute a waiver of such right or provision. Sharing Dreams reserves the right to amend these Terms of Service at any time and without notice, and it is your responsibility to review these Terms of Service for any changes. Your use of the Service following any amendment of these Terms of Service will signify your assent to and acceptance of its revised terms. YOU AND SHARING DREAMS AGREE THAT ANY CAUSE OF ACTION ARISING OUT OF OR RELATED TO THE SERVICES MUST COMMENCE WITHIN ONE (1) YEAR AFTER THE CAUSE OF ACTION ACCRUES. OTHERWISE, SUCH CAUSE OF ACTION IS PERMANENTLY BARRED.
                </li>
            <b>
                Dated: February 28, 2015
            </b>
        </div>    
    </body>
</html>