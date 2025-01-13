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
    <link rel="stylesheet" href="<?=SITEURL?>css/rwdgrid.css">
    <link rel="stylesheet" href="<?=SITEURL?>css/style.css">
    <link rel="stylesheet" href="<?=SITEURL?>fonts/stylesheet.css">

    <link rel="shortcut icon" href="<?=SITEURL?>imgs/favicon.png" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="<?=SITEURL?>css/style.css" />
    <script type="text/javascript" src="<?=SITEURL?>onebyone/js/jquery-1.6.4.js"></script>

    <script src="<?=SITEURL?>ie-alert/theplugin/iealert.min.js" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="<?=SITEURL?>ie-alert/theplugin/iealert/style.css" />
    <script>
        $(document).ready(function() {
            $("body").iealert();
        });
    </script>


    <script src="<?=SITEURL?>onebyone/js/jquery.onebyone.min.js"></script>
    <script src="<?=SITEURL?>onebyone/js/jquery.touchwipe.min.js"></script>
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


    <!-- Global site tag (gtag.js) - Google Ads: 717453451 -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=AW-717453451"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'AW-717453451');
    </script>
    <noscript><img height="1" width="1" style="display:none"
                   src="https://www.facebook.com/tr?id=365935717434648&ev=PageView&noscript=1"
            /></noscript>


    <link href="<?=SITEURL?>onebyone/css/jquery.onebyone.css" rel="stylesheet" type="text/css">
    <link href="<?=SITEURL?>onebyone/css/animate.min.css" rel="stylesheet" type="text/css">
    <link href="<?=SITEURL?>onebyone/css/responsiveexample.css" rel="stylesheet" type="text/css">
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
                <img src="<?=SITEURL?>imgs/logo.png" alt="ProNutry">
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
            <option value="empresa">Empresa</option>
            <option value="produtos">Produtos</option>
            <option value="catalogo">Catalogo</option>
            <option value="distribuidores">Distribuidores</option>
            <option value="contato">Contato</option>
        </select>


        <div class="restrito fixo">
            <p>Área Restrita</p>

            <form action="admin/login.php" method="post">
                <div style="float:left; width:100%;">
                    <label class="lbnome">Nome:</label>
                    <label class="lbsenha">Senha:</label>
                </div>

                <input name="email" type="text" placeholder="Nome de usuário">
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
                <li class="active one"><a href="<?=SITEURL?>">Home</a></li>
                <li class=""><a href="<?=SITEURL?>empresa">Empresa</a></li>
                <li class=""><a href="<?=SITEURL?>produtos">Produtos</a></li>
                <li class=""><a href="<?=SITEURL?>catalogo">Catalogo</a></li>
                <li class=""><a href="<?=SITEURL?>distribuidores">Distribuidores</a></li>
                <li class="six"><a href="<?=SITEURL?>contato">Contato</a></li>
            </ul>
        </div>
    </header>

    <section>
        <div id="alert" style="display:none;">
            <a class="alert" href="#alert"></a>
        </div>


        <!-- grid-16 -->
        <meta charset="utf-8">
        <div class="grid-16" style="width:100%;">

            <link rel="stylesheet" href="<?=SITEURL?>filtros/css/layout.css">

            <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>a
            <![endif]-->
            <script type="text/javascript" src="<?=SITEURL?>filtros/js/jquery.easing.min.js"></script>
            <script type="text/javascript" src="<?=SITEURL?>filtros/js/jquery.mixitup.min.js"></script>

            <script type="text/javascript">

                $(document).ready(function(){
                    $("a.cada-produto").click(function(){
                        var imagem = $(this).attr("data-imagem");
                        var nome = $(this).attr("data-nome");
                        var descricao = $(this).attr("data-descricao");
                        var beneficio = $(this).attr("data-beneficio");

                        $("#divTitulo").html(nome);
                        $("#divDescricao").html(descricao);
                        $("#divFoto img").attr("src", imagem);
                        $("#divBeneficio").html(beneficio);
                    });
                });

                $(function () {

                    var filterList = {

                        init: function () {

                            // MixItUp plugin
                            // http://mixitup.io
                            $('#portfoliolist').mixitup({
                                targetSelector: '.portfolio',
                                filterSelector: '.filter',
                                effects: ['fade'],
                                easing: 'snap',
                                // call the hover effect
                                // onMixEnd: filterList.hoverEffect()
                            });

                        },

                        hoverEffect: function () {

                            // Simple parallax effect
                            $('#portfoliolist .portfolio').hover(
                                function () {
                                    $(this).find('.label').stop().animate({bottom: 0}, 200, 'easeOutQuad');
                                    $(this).find('img').stop().animate({top: -30}, 500, 'easeOutQuad');
                                },
                                function () {
                                    $(this).find('.label').stop().animate({bottom: -40}, 200, 'easeInQuad');
                                    $(this).find('img').stop().animate({top: 0}, 300, 'easeOutQuad');
                                }
                            );
                        }
                    };
                    // Run the show!
                    filterList.init();
                });
            </script>

            <!-- Add fancyBox main JS and CSS files -->
            <script type="text/javascript" src="<?=SITEURL?>fancybox/source/jquery.fancybox.js?v=2.1.4"></script>
            <link rel="stylesheet" type="text/css" href="<?=SITEURL?>fancybox/source/jquery.fancybox.css?v=2.1.4" media="screen" />

            <script type="text/javascript">
                $(document).ready(function() {
                    $('.fancybox').fancybox();
                });
            </script>

            <script>
                $(document).ready(function () {
                    $(".button").mouseenter(function () {
                        $(this).prev("div").fadeIn("slow");
                    })
                        .click(function () {
                            $(this).prev("div").fadeIn();
                        })
                        .mouseout(function () {
                            $(this).prev("div").fadeOut();
                        });
                    $(".tooltip").click(function () {
                        $(this).fadeOut();
                    });
                });
            </script>

            <div class="titulo" style="margin-top:0px;">
                <h1>Categorias</h1>
                <h1 class="prod">Produtos</h1>
            </div>

            <div id="produtos">
                <aside>
                    <ul id="cat" class="clearfix">
                        <li><span class="filter active" data-filter="est jan hom dec tap pol"></span></li>
                        <?php
                        $sql = "SELECT nome_categoria, slug_nome_categoria
                                FROM wd_categorias
                                ORDER BY nome_categoria";
                        $res = $con->query($sql);
                        $i = 0;
                        while ($l = $res->fetch(PDO::FETCH_ASSOC)) {
                        ?>
                        <li><a href="<?=SITEURL?>produtos/<?=$l['slug_nome_categoria']?>"><span class="filter" data-filter="<?=$l['slug_nome_categoria']?>"><?=$l['nome_categoria']?></span></a></li>
                        <? } ?>
                    </ul>

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

                    <a href="distribuidores">
                        <div class="cadastro">
                            <div>
                                <i class="fa fa-truck"></i><br />
                                <span>Seja um distribuidor</span><br />
                                <strong>Cadastre-se</strong>
                            </div>
                        </div>
                    </a>
                </aside>

                <div id="direita">
                    <div id="portfoliolist">

                        <?php
                        //echo $_SERVER['QUERY_STRING'];

                        $url_cat = isset($_SERVER['QUERY_STRING']) ? sanitize($_SERVER['QUERY_STRING']) : "";
                        $idCat = func_pdo_get_data($con, "wd_categorias", "id_categoria", "slug_nome_categoria = '{$url_cat}'");

                        /*echo "<pre>";
                        print_r($idCat);
                        echo "</pre>";*/

                        $WHERE = "";
                        if(!empty($idCat)){
                            $WHERE .= " WHERE id_categoria_produto = '$idCat'";
                        }else{
                            $WHERE .= " ";
                        }

                        $ipp = 12; //itens por página

                        $explode = explode('?', sanitize($_SERVER['REQUEST_URI']));

                        if(preg_match("/(\/?pg=)(\d+)\z/", sanitize($_SERVER['REQUEST_URI']))){
                            $indice = isset($explode[1]) ? explode("=", $explode[1])[1] : 1;
                        }else{
                            $indice = 1;
                        }

                        $inicio = ($indice * $ipp) - $ipp;

                        $LIMIT = " LIMIT $inicio, $ipp";

                        $q_n = "SELECT nome_produto, url_nome_produto, quantidade_produto, descricao_produto, 
                                data_cadastro_produto, capa_produto
                                 FROM wd_produtos
                                 {$WHERE}
                                 ORDER BY data_cadastro_produto DESC";
                        $q_n .= $LIMIT;
                        //echo $q_n;

                        $r_n = $con->query($q_n);

                        $total = func_pdo_count($con, "wd_produtos", " $WHERE");

                        if($total > 0){
                        while($l_n = $r_n->fetch(PDO::FETCH_ASSOC)){
                        ?>
                        <a class="fancybox cada-produto" href="#inline" title="" data-nome="<?=$l_n['nome_produto']?>" data-descricao="<?=$l_n['quantidade_produto']?>" data-imagem="<?= DIR_MODS_PRODUTOS_ADMIN_URL . $l_n['capa_produto'] ?>" data-beneficio="<?=$l_n['descricao_produto']?>">
                            <div class="portfolio cap-oleosas" data-cat="cap-oleosas">
                                <div class="portfolio-wrapper">
                                    <div style="width: 96%; height: 180px; overflow: hidden; margin: 0 auto; background-image: url('<?= DIR_MODS_PRODUTOS_ADMIN_URL . $l_n['capa_produto'] ?>'); background-position: 50% 50%; background-repeat: no-repeat; background-size: auto 150px;">
                                    </div>

                                    <h1><?=$l_n['nome_produto']?>
                                        <!--<a href="#"><i class="fa fa-arrow-circle-o-down" title="Baixar Preescrição"></i></a>-->
                                    </h1>

                                </div>
                            </div>
                        </a>
                        <? }
                        }else{
                            echo "<p>Nenhum produto cadastrado para esta categoria no momento.</p>";
                        }?>

                    </div>
                </div>
            </div>



            <div style="clear:both;"></div>
        </div>
        <!-- End grid-16 -->

</div>

<div id="inline" class="inline" style="display:none;">
    <div id="divTitulo">Produtos</div>
    <div class="fanFoto">
        <div id="divFoto">
            <img src="" />
        </div>
    </div>

    <div id="fanDesc">
        <p class="ben">Quantidade:</p>
        <p id="divDescricao">
            60 Caps 500mg
        </p>
        <p class="ben">Beneficios:</p>
        <p id="divBeneficio">
            Carticálcio é um suplemento de cartilagem de tubarão, cálcio de ostra e vitamina C para fortalecer, músculos, nervos, dentes, renovar as células dos ossos, ajuda a fortalecer o tecido epitelial devido ao colágeno e fortalece o sistema imunológico. Carticálcio é um  suplemento natural indicado para as pessoas idosas. Nesta faixa etária é comum ocorrer fraturas, sendo necessário um complemento alimentar para estas pessoas. A vitamina C participa da síntese de colágeno, ou seja, ajuda o organismo a captar e fixar está proteína, o cálcio de ostra fornece o mineral cálcio para os ossos e nervos.
        </p>
    </div>

    <!--
    <h2 id="divTitulo"></h2>

    <div class="ifoto" id="divFoto">
		<img src="" />
    </div>


    <p id="divDescricao">
    	60 Caps 500mg
    </p>

	<h2>Benefícios</h2>

	<p id="divBeneficio">
    	Carticálcio é um suplemento de cartilagem de tubarão, cálcio de ostra e vitamina C para fortalecer, músculos, nervos, dentes, renovar as células dos ossos, ajuda a fortalecer o tecido epitelial devido ao colágeno e fortalece o sistema imunológico. Carticálcio é um  suplemento natural indicado para as pessoas idosas. Nesta faixa etária é comum ocorrer fraturas, sendo necessário um complemento alimentar para estas pessoas. A vitamina C participa da síntese de colágeno, ou seja, ajuda o organismo a captar e fixar está proteína, o cálcio de ostra fornece o mineral cálcio para os ossos e nervos.
    </p>
    -->
</div>

<style>
</style>
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