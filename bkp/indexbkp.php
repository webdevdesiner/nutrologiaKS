<?php require_once ("admin/php/config.php"); ?>
<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
    <title>PRONUTRY | Produtos Naturais</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="robots" content="index,follow" />
    <meta name="description" content="A Pronutry é uma empresa que está a seis anos no mercado, atuando no Brasil inteiro, o foco é a venda de Produtos naturais, para garantir uma boa saúde a toda população, que em meio a tanta correria do dia a dia, acabam esquecendo de se cuidar, porém a Pronutry também oferece uma linha de cosméticos, perfumaria e nutrição esportiva." />
    <meta name="keywords" content="produtos naturais, emagrecer, cosméticos, perfumaria, nutrição esportiva, nutrição" />

    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" href="css/rwdgrid.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="fonts/stylesheet.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="shortcut icon" href="imgs/favicon.png" />

    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">

    <script type="text/javascript" src="onebyone/js/jquery-1.6.4.js"></script>

    <script src="ie-alert/theplugin/iealert.min.js" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="ie-alert/theplugin/iealert/style.css" />
    <script>
        $(document).ready(function() {
            $("body").iealert();
        });
    </script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-145658580-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-145658580-1');
    </script>



   <script>
     !function(f,b,e,v,n,t,s)
     {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
     n.callMethod.apply(n,arguments):n.queue.push(arguments)};
     if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
     n.queue=[];t=b.createElement(e);t.async=!0;
     t.src=v;s=b.getElementsByTagName(e)[0];
     s.parentNode.insertBefore(t,s)}(window, document,'script',
     'https://connect.facebook.net/en_US/fbevents.js');
     fbq('init', '365935717434648');
     fbq('track', 'PageView');
   </script>
   <noscript><img height="1" width="1" style="display:none"
     src="https://www.facebook.com/tr?id=365935717434648&ev=PageView&noscript=1"
   /></noscript>


    <!-- Global site tag (gtag.js) - Google Ads: 717453451 -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=AW-717453451"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'AW-717453451');
    </script>
    <!-- Facebook Pixel Code --–>
   <!-- End Facebook Pixel Code-->
<script>
  !function(f,b,e,v,n,t,s)
  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
  n.callMethod.apply(n,arguments):n.queue.push(arguments)};
  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
  n.queue=[];t=b.createElement(e);t.async=!0;
  t.src=v;s=b.getElementsByTagName(e)[0];
  s.parentNode.insertBefore(t,s)}(window, document,'script',
  'https://connect.facebook.net/en_US/fbevents.js');
  fbq('init', '365935717434648');
  fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
  src="https://www.facebook.com/tr?id=365935717434648&ev=PageView&noscript=1"
/></noscript>
<!-- End Facebook Pixel Code -->

  <!---  <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-98281643-1', 'auto');
        ga('send', 'pageview');

    </script>  -->
<script>
    document.getElementById('sendmail').addEventListener('click', function(event){
        event.preventDefault();
        document.location.href = 'mailto:sac@pronutry.com.br';
    });


</script>

    <script src="onebyone/js/jquery.onebyone.min.js"></script>
    <script src="onebyone/js/jquery.touchwipe.min.js"></script>
    <script type="text/javascript" charset="utf-8">
        $(document).ready(function() {

            $('#banner').oneByOne({
                className: 'oneByOne1',
                /* Please provide the width and height in the responsive
                version, for the slider will keep the ratio when resize
                depends on these size. */
                width: 872,
                height: 401,
                easeType: 'random',
                slideShow: true,
                responsive: true,
                minWidth: 270,
                showButton: false
            });
        });
    </script>
    <link href="onebyone/css/jquery.onebyone.css" rel="stylesheet" type="text/css">
    <link href="onebyone/css/animate.min.css" rel="stylesheet" type="text/css">
    <link href="onebyone/css/responsiveexample.css" rel="stylesheet" type="text/css">
    <style type="text/css" media="screen">

        .otherExample{
            position: relative;
            clear: left;
            float: left;
            margin: 20px 0 0 0;
        }
        .otherExample a{
            display: block;
            float: left;
            margin-right: 16px;
            color: #0066FF;
        }
        .otherExample a:hover{
            color: #B22222;
            text-decoration: underline;
        }

        .bigImage {
            border-radius:10px;
        }



        @media only screen and (max-width: 768px) {
            .hide-web {
                display: none;
            }

        }

        @media only screen and (min-width: 769px) {
            .hide-mobile {
                display: none;
            }
        }

        @media only screen and (min-width: 768px){
            .whatsapp-chat .hide-mobile {
                display: none
            }
        }

        @media only screen and (max-width: 767px){
            .whatsapp-chat .hide-web {
                display: none;
            }
        }
        .whatsapp-chat {
            position: fixed;
            z-index: 999;
            bottom: 10px;
            right: 10px;
        }
        .whatsapp-chat img {
            height: 35px;
            width: auto;
        }
        .pulse {
            cursor: pointer;
            animation: pulse 2s infinite;
        }
        @-webkit-keyframes pulse { 0% {    -webkit-box-shadow: 0 0 0 0 rgba(255,0,0,0.3);  }  70% {      -webkit-box-shadow: 0 0 0 10px rgba(204,169,44, 0);  }  100% {      -webkit-box-shadow: 0 0 0 0 rgba(204,169,44, 0);  }}@keyframes pulse {  10% {    -moz-box-shadow: 0 0 0 0 #128c7e;    box-shadow: 0 0 0 0 #128c7e;  }  80% {      -moz-box-shadow: 0 0 0 10px rgba(204,169,44, 0);      box-shadow: 0 0 0 15px rgba(204,169,44, 0);  }  100% {      -moz-box-shadow: 0 0 0 0 rgba(255,0,0,0.3);      box-shadow: 0 0 0 0 rgba(204,169,44, 0);  }}#Msg .JanelaWhatsAberta{  border-width:3px !important;  border-top-left-radius:10px;  border-top-right-radius:10px; border-bottom-right-radius:10px;  border-bottom-left-radius:10px; margin-left:18px; z-index:99999999; bottom:-5px;  height:37px;  animation-fill-mode:both; animation-iteration-count:infinite; background-color:#128c7e !important;  width:250px;  }#Msg .JanelaWhatsAberta.yp_onscreen{ animation-duration:1s;  animation-delay:0s; animation-name:bob;}.WhatsCel .Whatsclose{  background-color:#128c7e !important;  border-top-left-radius:0px; border-top-right-radius:0px;  border-bottom-right-radius:0px; border-bottom-left-radius:0px;}#Msg #pop .WhatsCel{ border-top-left-radius:0px; border-top-right-radius:0px;  border-bottom-right-radius:0px; border-bottom-left-radius:0px;}


    </style>


    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
    <script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
    <script>
        $(function() {
            $( "#accordion" ).accordion();
            $( "#accordion" ).accordion({ collapsible: true });
            $( "#accordion" ).accordion({ active: false });
        });
    </script>


    <!-- begin olark code
    <script data-cfasync="false" type='text/javascript'>/*<![CDATA[*/window.olark||(function(c){var f=window,d=document,l=f.location.protocol=="https:"?"https:":"http:",z=c.name,r="load";var nt=function(){
            f[z]=function(){
                (a.s=a.s||[]).push(arguments)};var a=f[z]._={
            },q=c.methods.length;while(q--){(function(n){f[z][n]=function(){
                f[z]("call",n,arguments)}})(c.methods[q])}a.l=c.loader;a.i=nt;a.p={
                0:+new Date};a.P=function(u){
                a.p[u]=new Date-a.p[0]};function s(){
                a.P(r);f[z](r)}f.addEventListener?f.addEventListener(r,s,false):f.attachEvent("on"+r,s);var ld=function(){function p(hd){
                hd="head";return["<",hd,"></",hd,"><",i,' onl' + 'oad="var d=',g,";d.getElementsByTagName('head')[0].",j,"(d.",h,"('script')).",k,"='",l,"//",a.l,"'",'"',"></",i,">"].join("")}var i="body",m=d[i];if(!m){
                return setTimeout(ld,100)}a.P(1);var j="appendChild",h="createElement",k="src",n=d[h]("div"),v=n[j](d[h](z)),b=d[h]("iframe"),g="document",e="domain",o;n.style.display="none";m.insertBefore(n,m.firstChild).id=z;b.frameBorder="0";b.id=z+"-loader";if(/MSIE[ ]+6/.test(navigator.userAgent)){
                b.src="javascript:false"}b.allowTransparency="true";v[j](b);try{
                b.contentWindow[g].open()}catch(w){
                c[e]=d[e];o="javascript:var d="+g+".open();d.domain='"+d.domain+"';";b[k]=o+"void(0);"}try{
                var t=b.contentWindow[g];t.write(p());t.close()}catch(x){
                b[k]=o+'d.write("'+p().replace(/"/g,String.fromCharCode(92)+'"')+'");d.close();'}a.P(2)};ld()};nt()})({
            loader: "static.olark.com/jsclient/loader0.js",name:"olark",methods:["configure","extend","declare","identify"]});
        /* custom configuration goes here (www.olark.com/documentation) */
        olark.identify('3259-366-10-3266');/*]]>*/</script><noscript><a href="https://www.olark.com/site/3259-366-10-3266/contact" title="Contact us" target="_blank">Questions? Feedback?</a> powered by <a href="http://www.olark.com?welcome" title="Olark live chat software">Olark live chat software</a></noscript>
    <!-- end olark code -->




</head>

<div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/pt_BR/all.js#xfbml=1";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>
<body>

<div class="container-12">
    <header>
        <!--<a href="index.php" target="_self"><div class="logo"></div></a>-->

        <a href="<?=SITEURL?>">
            <div id="logo">
                <img src="imgs/logo.png" alt="ProNutry">
            </div>
        </a>

        <div class="info">
            <i class="fa fa-phone"></i>
            <small>18</small>3916-1113 / <small>18</small>4101-0508
            <p>Compre pelo telefone</p>
        </div>


        <select onchange="if (this.value) window.location.href=this.value">
            <option selected>Categorias</option>
            <option value="<?=SITEURL?>">Home</option>
            <option value="<?=SITEURL?>empresa">Empresa</option>
            <option value="<?=SITEURL?>produtos">Produtos</option>
            <option value="<?=SITEURL?>catalogo">Catalogo</option>
            <option value="<?=SITEURL?>distribuidores">Distribuidores</option>
            <option value="<?=SITEURL?>contato">Contato</option>
        </select>


        <div class="restrito fixo">
            <p>Área Restrita</p>

            <form action="<?=SITEURL?>admin/login.php" method="post">
                <div style="float:left; width:100%;">
                    <label class="lbnome">E-mail:</label>
                    <label class="lbsenha">Senha:</label>
                </div>

                <input name="email" type="text" placeholder="E-mail">
                <input name="senha" type="password" placeholder="Senha">
                <input name="Entrar" type="submit" value="OK">
            </form>
        </div>


        <!--<div id="accordion">
            <h3>Área Restrita</h3>
            <div>
                <div class="restrito">

                    <form action="../sistema/login_acao.php" method="post">

                        <div style="float:left; width:100%;">
                            <label class="lbnome">Nome:</label>
                            <label class="lbsenha">Senha:</label>
                        </div>

                        <input name="email" type="text" placeholder="Nome de usuário">
                        <input name="senha" type="password" placeholder="Senha">
                        <input name="Entrar" type="submit" value="OK">
                    </form>
                </div>
            </div>
        </div>-->

        <div id="menu">
            <ul>
                <a href="<?=SITEURL?>"><li class="active one">Home</li></a>
                <a href="<?=SITEURL?>empresa"><li class="">Empresa</li></a>
                <a href="<?=SITEURL?>produtos"><li class="">Produtos</li></a>
                <a href="<?=SITEURL?>catalogo"><li class="">Catalogo</li> </a>
                <a href="<?=SITEURL?>distribuidores"><li class="">Distribuidores</li></a>
                <a href="<?=SITEURL?>contato"><li class=" six">Contato</li></a>
            </ul>
        </div>



    </header>

    <section>
        <div id="alert" style="display:none;">
            <a class="alert" href="#alert"></a>
        </div>

        <!-- grid-16 -->
        <meta charset="utf-8"/>
        <div class="grid-16" style="width:100%;">
            <div id="banner">
                <?php
                $sql = "SELECT arquivo_slide
                FROM wd_slides
                ORDER BY id_slide DESC";

                $res = $con->query($sql);
                while ($l = $res->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                    <div class="oneByOne_item">
                        <img src="<?= DIR_MODS_SLIDES_ADMIN_URL . $l['arquivo_slide'] ?>" class="bigImage">
                    </div>
                <? } ?>
            </div>

            <div class="social">




                <!--<i class="fa fa-youtube-play"></i>-->
                <a href="https://www.facebook.com/pronutrydistribuidora/?ref=br_rs" target="_blank"><i class="fa fa-facebook"></i></a>
                <a href="https://www.instagram.com/pronutry_distribuidora/" target="_blank"><i class="fa fa-instagram"></i></a>
                <a href="https://api.whatsapp.com/send?phone=5518998068039&text=sua%20mensagem" target="_blank"><i class="fa fa-whatsapp"></i></a>

                <!--<i class="fa fa-twitter"></i>-->
            </div>

            <a href="catalogo">
                <div class="catalogo">
                    <img src="<?=SITEURL?>imgs/catalogo.jpg" alt="Catálogo">

                    <div>
                        <i class="fa fa-book"></i><br />
                        <span>Catálogo</span><br />
                        <strong>Virtual</strong>
                    </div>
                </div>
            </a>

            <div class="titulo">
                <h1>Produtos em destaque</h1>

                <h1 class="viva">Viva de bem com a vida</h1>

                <h1>Cadastre-se</h1>
            </div>

            <div class="destaque">
                <?php
                $sql = "SELECT nome_produto, quantidade_produto, capa_produto
                FROM wd_produtos
                WHERE destaque_produto = 1
                ORDER BY RAND()
                LIMIT 1";
                $res = $con->query($sql);
                while ($l = $res->fetch(PDO::FETCH_ASSOC)) {
                ?>
                <div style="width: 94%; height: 340px; overflow: hidden; margin: 0 auto; background-image: url('<?= DIR_MODS_PRODUTOS_ADMIN_URL . $l['capa_produto'] ?>'); background-position: 50% 50%; background-repeat: no-repeat; background-size: auto 260px;">
                </div>

                <div class="desc">
                    <h1><?=$l['nome_produto']?></h1>
                    <p><?=$l['quantidade_produto']?></p>
                </div>
                <? } ?>
            </div>

            <div class="guia">
                <img src="<?=SITEURL?>imgs/folha.png" alt="ProNutry">

                <h1>Guia de Vida Natural</h1>

                <p>
                    Com dicas rápidas e descontraídas, este guia foi criado para te ajudar, a manter a (ou começar a ter) uma vida mais saudável.  Ficando de olho na alimentação, saúde, bem estar e lazer. De uma maneira que temos certeza que irá te animar para colocar tudo em prática. Não desanime, porque estamos praticando junto com você cada dica.
                </p>


                <a href="empresa"><img src="<?=SITEURL?>imgs/saiba.png" alt="Saiba Mais"  class="saiba"></a>

            </div>

            <div class="cadastro">

                <div>
                    <i class="fa fa-truck"></i><br/>
                    <span>Seja um distribuidor</span><br/>
                    <strong>Cadastre-se</strong>
                </div>

                <form action="distribuidores.php" method="get">
                    <input name="limpar" value="limpar" type="hidden" required>
                    <label>Nome:</label>
                    <input name="nome" type="text" required>

                    <label>Email:</label>
                    <input name="email" type="text" required>

                    <label>Cidade:</label>
                    <input name="cidade" type="text" required>

                    <label>Estado:</label>
                    <select name="estado">
                        <option>Selecione</option>
                        <option value="ac">Acre</option>
                        <option value="al">Alagoas</option>
                        <option value="am">Amazonas</option>
                        <option value="ap">Amapá</option>
                        <option value="ba">Bahia</option>
                        <option value="ce">Ceará</option>
                        <option value="df">Distrito Federal</option>
                        <option value="es">Espírito Santo</option>
                        <option value="go">Goiás</option>
                        <option value="ma">Maranhão</option>
                        <option value="mt">Mato Grosso</option>
                        <option value="ms">Mato Grosso do Sul</option>
                        <option value="mg">Minas Gerais</option>
                        <option value="pa">Pará</option>
                        <option value="pb">Paraíba</option>
                        <option value="pr">Paraná</option>
                        <option value="pe">Pernambuco</option>
                        <option value="pi">Piauí</option>
                        <option value="rj">Rio de Janeiro</option>
                        <option value="rn">Rio Grande do Norte</option>
                        <option value="ro">Rondônia</option>
                        <option value="rs">Rio Grande do Sul</option>
                        <option value="rr">Roraima</option>
                        <option value="sc">Santa Catarina</option>
                        <option value="se">Sergipe</option>
                        <option value="sp">São Paulo</option>
                        <option value="to">Tocantins</option>
                    </select>

                    <input name="cadastrar" type="submit" value="CADASTRAR">
                </form>

            </div>



            <div style="clear:both;"></div>
        </div>

        <!-- End grid-16 -->

</div>


<div style="clear:both;"></div>


<footer>
    <div class="foo_inner">
        <div class="pag">
            <h1>Formas de Pagamento</h1>

            <img src="<?=SITEURL?>imgs/bandeiras.png" alt="Formas de pagamento">

            <p>
                Em caso de dúvidas, favor contatar o nosso Serviço de Atendimento ao
                Consumidor através do telefone
            </p>

            <p>
                +55 (18) 3916-1113 ou pelo e-mail <a href="mailto:sac@pronutry.com.br" target="_top">sac@pronutry.com.br</a><br />
                <span>(de Segunda a Sexta-feira das 8h30 às 18h)</span>
            </p>
        </div>


        <div class="bcash">
            <h1>Garantia</h1>

            <img src="<?=SITEURL?>imgs/mercado2.png" alt="Garantia">

        </div>


        <div class="fb">
            <h1>Facebook</h1>
            <div class="fb-like-box" data-href="https://www.facebook.com/pronutrydistribuidora/?ref=br_rs" data-width="480" data-height="185" data-colorscheme="light" data-show-faces="true" data-header="false" data-stream="false" data-show-border="false"></div>
        </div>

        <div class="by">
            <div class="line"></div>
            <p>&copy;  2014 - Pronutry Produtos Naturais, Todos os direitos reservados.</p>

            <!--<a href="http://www.l8web.com.br" target="_blank">
               <img src="imgs/l8web.png" alt="L8WEB">
            </a>-->
        </div>
    </div>

    <div class="whatsapp-chat">

        <a id="aLink" href="https://api.whatsapp.com/send?phone=5518998068039&text=Sua%20Mensagem&amp;" target="_blank" class="hide-web">
            <img class="pulse" title="Contato via Whatsapp" src="imgs/whats.png" style="border-radius: 5px;">
        </a>

        <a id="aLink" href="https://api.whatsapp.com/send?phone=5518998068039&text=Sua%20Mensagem&amp;" target="_blank" class="hide-mobile">
            <img class="pulse" title="Contato via Whatsapp" src="imgs/whats.png" style="border-radius: 5px;">
        </a>
    </div>
</footer>
</body>
</html>