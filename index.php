<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="soy ağacı soylar ağaç akraba akrabalık ata dede sop soplar sopum soyum">
<link rel="stylesheet" type="text/css" href="style.css" />


<title>Soyum Sopum Net</title>

<style type="text/css">
a.tooltip {
/*	color:#F00; */
/*	border-bottom: 3px double; */
	border: 1px solid ; 
	padding-left: 2px;
	padding-right: 2px;
	

}
#tooltip{
	position:absolute;
	border:1px solid #333;
	background:#ccffff;
	padding:2px 5px;
	color:#333;
	display:none;
	
	}	

</style>
<script src="js/jquery-1.4.4.js"></script>
<script src="js/tooltip.js"></script>

</head>

<body>

<script>
$(document).ready(
function() {
	$("p#1").hide("fast");
$("p#2").hide("fast");
$("p#3").hide("fast");
$("p#1").show("slow");
$("p#2").delay(800).show("slow");
$("p#3").delay(1600).show("slow");
});


</script>

<div id="container">
		<div id="header">
        	<h1>Soyum<span class="off">Sopum</span>.Net</h1>
            <h2>Soyağacı sitesi</h2>
        </div>           
        <div id="menu">
       <ul>
            	<li class="menuitem"><a href="index.php">AnaSayfa</a></li>
                <li class="menuitem"><a href="yeni.php">Yeni Kayıt</a></li>
                <li class="menuitem"><a href="arama.php">Kişi Arama</a></li>
                <li class="menuitem"><a href="soy.php">Soy Ağacı Görüntüle</a></li>
                <li class="menuitem"><a href="defter.php">Ziyaretçi Defteri</a></li>
            </ul>
        </div>
        
        <div id="leftmenu">

       <?php
	   include_once("leftmenu.php");
	   include("fonksiyonlar.php");
	   ?>
        </div>
        
        
        
        
		<div id="content">
        
        
        <div id="content_top"></div>
        <div id="content_main">
		     <img src="images/logo.jpg" align="right">
        	<h2>SoyumSopum.Net e Hoşgeldiniz</h2> 
        	<p>&nbsp;</p>
           	<p>&nbsp;<?php vt_baglan(); ?></p>
       	  <h3>Site Hakkında</h3>
        	<p id="1">  Web sitemizin kuruluş amacı, soylarımızı ekleyerek anılarını sonsuza kadar sürdürmek ve oluşacak uzaktan akrabalıkları keşfetmektir. Soy bildiğiniz gibi baba tarafını ifade eder. Sop ise anne tarafıdır. Sitemizde kendinizi ve aile fertlerinizi ekleyerek bir soyağacı oluşturmaya başlayabilirsiniz. Daha sonra oluşturduğunuz soyağacını başkaları ile paylaşabilir, başkalarının soyağaçlarını görebilir ve sizinle olan bağlarını tespit edebilirsiniz. Eğer soyunuzu tanıyorsanız, tanıtmak için doğru yerdesiniz. </p>
            
        	<p>&nbsp;</p>
<h3>Kullanımı</h3>
        	<p id="2">Site kullanımı çok kolaydır. Öncelikle <a href="yeni.php" title="Üye olmanıza gerek olmadan hızlıca kayıt ekleyebilirsiniz." class="tooltip">Yeni Kayıt</a> linkinden kendinizi veya çocuğunuzu ekleyerek <a class="tooltip" title="Çocuğunuzdan başlarsanız daha kolay ilerlesiniz. Küçükten büyüklere doğru.">başlayabilirsiniz</a> eklemeye. Kendinizi eklediğinizde sistemde kayıtlı olası çocuklarınız çıkacaktır. Eğer çocuklarınız varsa bunlarıda seçebilir veya kayıt edebilirsiniz. Daha sonra ki adım Babanız ve Annenizi ekleyerek sistemde çıkan çocuklardan kendinizi seçmektir. (Eğer sistemde çıkmazsa kendinizi yazabilirsiniz tekrar sistem sizi tanıyacaktır.) </p>
        	<p>&nbsp;</p>
        	<h3>Neler yapılabilir</h3>
            <p id="3">Sitemizde aile bireylerinizi ekleyebilir ve soyağacınızı oluşturabilirsiniz. Soyağacınızı görüntüleyebilir ve arkadaşlarınıza, tanıdıklarınıza maille gönderebilirsiniz. Başkalarının soyağaçlarını görebilir onlarla iletişim kurabilirsiniz. Uzaktan akrabalık bağlarını inceleyebilir veya kendi şehrinizde ki soyları görüntülüyebilirsiniz.</p>
            <hr />
            <br />
            <p>
    
		
            
            </p>
        </div>
		

        <div id="content_bottom"></div>
            
            <div id="footer"><h3><a href="http://www.soyumsopum.net">Soyum Sopum Net&copy;  2011</a></h3> </div>
            <div id="sayac">Sayfa gösterimi <?php echo(stats_ekle($_SERVER['HTTP_REFERER'], date("d-m-Y H:m"), $_SERVER['REMOTE_ADDR'])); ?></div>
      </div>
   </div>
 <?php vt_baglanti_kapat(); ?>
</body>
</html>
