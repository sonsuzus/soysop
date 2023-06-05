<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="soy ağacı soylar ağaç akraba akrabalık ata dede sop soplar sopum soyum">
<link rel="stylesheet" type="text/css" href="style.css" />
<link rel="stylesheet" type="text/css" href="soy.css" />

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
	   error_reporting(0); 
	   include_once("leftmenu.php");
	   include("fonksiyonlar.php");
	   vt_baglan();
	   ?>
        </div>
        
        
        
        
		<div id="content">
        
        
        <div id="content_top"></div>
        <div id="content_main">
        
        <h2>Soy Ağacı</h2> 
        	<div>
              <img src="images/soy.jpg" width="659" height="660" />
              <div id="apDiv1"><?php $uye1 = $_GET['uye']; 
			  if($uye1=="") $uye1=rastgele_uye();
			  echo (linkli_yaz($uye1));  ?></div>
              <div id="apDiv10">Çocukları<br /><br />
			  <?php 
			  $sql = "SELECT * FROM baba WHERE uid=$uye1";
	          $sorgu = mysql_query($sql, $GLOBALS[baglan]);
	          while($row = mysql_fetch_array($sorgu))
  	            {
  	             echo (linkli_yaz($row['cid'])."<br /><br />");
	            } 
				 $sql = "SELECT * FROM anne WHERE uid=$uye1";
	          $sorgu = mysql_query($sql, $GLOBALS[baglan]);
	          while($row = mysql_fetch_array($sorgu))
  	            {
  	             echo (linkli_yaz($row['cid'])."<br /><br />");
	            } 
				echo ("<a href=\"yeni.php?cocuk=ekle&uid=".$uye1."\">Çocuk Ekle</a>");
			  ?></div>
              
              <div id="apDiv11"><?php $uye11 = baba_bul($uye1); if($uye11!=0) { echo (linkli_yaz($uye11)); } else { echo ("<a href=\"yeni.php?baba=ekle&uid=".$uye1."\">Baba Ekle</a>"); } ?></div>
              <div id="apDiv12"><?php $uye12 = anne_bul($uye1); if($uye12!=0) { echo (linkli_yaz($uye12)); } else { echo ("<a href=\"yeni.php?anne=ekle&uid=".$uye1."\">Anne Ekle</a>"); } ?></div>
              
              <div id="apDiv111"><?php $uye111 = baba_bul($uye11); echo (linkli_yaz($uye111)); ?></div>
              <div id="apDiv112"><?php $uye112 = anne_bul($uye11); echo (linkli_yaz($uye112)); ?></div>
              <div id="apDiv121"><?php $uye121 = baba_bul($uye12); echo (linkli_yaz($uye121)); ?></div>
              <div id="apDiv122"><?php $uye122 = anne_bul($uye12); echo (linkli_yaz($uye122)); ?></div>
              
              <div id="apDiv1111"><?php $uye1111 = baba_bul($uye111); echo (linkli_yaz($uye1111, 2)); ?></div>
               <div id="apDiv1112"><?php $uye1112 = anne_bul($uye111); echo (linkli_yaz($uye1112, 2)); ?></div>
              <div id="apDiv1121"><?php $uye1121 = baba_bul($uye112); echo (linkli_yaz($uye1121, 2)); ?></div>
               <div id="apDiv1122"><?php $uye1122 = anne_bul($uye112); echo (linkli_yaz($uye1122, 2)); ?></div>
              <div id="apDiv1211"><?php $uye1211 = baba_bul($uye121); echo (linkli_yaz($uye1211, 2)); ?></div>
              <div id="apDiv1212"><?php $uye1212 = anne_bul($uye121); echo (linkli_yaz($uye1212, 2)); ?></div>
              <div id="apDiv1221"><?php $uye1221 = baba_bul($uye122); echo (linkli_yaz($uye1221, 2)); ?></div>
               <div id="apDiv1222"><?php $uye1222 = anne_bul($uye122); echo (linkli_yaz($uye1222, 2)); ?></div>
               
              <div id="apDiv11111"><?php $uye11111 = baba_bul($uye1111); echo (linkli_yaz($uye11111, 2)); ?></div>
               <div id="apDiv11112"><?php $uye11112 = anne_bul($uye1111); echo (linkli_yaz($uye11112, 2)); ?></div>
               <div id="apDiv11121"><?php $uye11121 = baba_bul($uye1112); echo (linkli_yaz($uye11121, 2)); ?></div>
               <div id="apDiv11122"><?php $uye11122 = anne_bul($uye1112); echo (linkli_yaz($uye11122, 2)); ?></div>
              <div id="apDiv11211"><?php $uye11211 = baba_bul($uye1121); echo (linkli_yaz($uye11211, 2)); ?></div>
              <div id="apDiv11212"><?php $uye11212 = anne_bul($uye1121); echo (linkli_yaz($uye11212, 2)); ?></div>
               <div id="apDiv11221"><?php $uye11221 = baba_bul($uye1122); echo (linkli_yaz($uye11221, 2)); ?></div>
               <div id="apDiv11222"><?php $uye11222 = anne_bul($uye1122); echo (linkli_yaz($uye11222, 2)); ?></div>
              <div id="apDiv12111"><?php $uye12111 = baba_bul($uye1211); echo (linkli_yaz($uye12111, 2)); ?></div>
              <div id="apDiv12112"><?php $uye12112 = anne_bul($uye1211); echo (linkli_yaz($uye12112, 2)); ?></div>
              <div id="apDiv12121"><?php $uye12121 = baba_bul($uye1212); echo (linkli_yaz($uye12121, 2)); ?></div>
              <div id="apDiv12122"><?php $uye12122 = anne_bul($uye1212); echo (linkli_yaz($uye12122, 2)); ?></div>
              <div id="apDiv12211"><?php $uye12211 = baba_bul($uye1221); echo (linkli_yaz($uye12211, 2)); ?></div>
              <div id="apDiv12212"><?php $uye12212 = anne_bul($uye1221); echo (linkli_yaz($uye12212, 2)); ?></div>
               <div id="apDiv12221"><?php $uye12221 = baba_bul($uye1222); echo (linkli_yaz($uye12221, 2)); ?></div>
               <div id="apDiv12222"><?php $uye12222 = anne_bul($uye1222); echo (linkli_yaz($uye12222, 2)); ?></div>
               
               <img src="images/logo.jpg" align="right" width="60">
              </div>
              
              
       
       	 
        </div>
		

        <div id="content_bottom"></div>
            
            <div id="footer"><h3><a href="http://www.soyumsopum.net">Soyum Sopum Net&copy;  2011</a></h3></div>
            <div id="sayac">Sayfa gösterimi <?php echo(stats_ekle($_SERVER['HTTP_REFERER'], date("d-m-Y H:m"), $_SERVER['REMOTE_ADDR'])); ?></div>
      </div>
   </div>
 <?php vt_baglanti_kapat(); ?>
</body>
</html>
