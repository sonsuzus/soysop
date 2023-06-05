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
<style type="text/css">

.accordion {
	width: 650px;
	border-bottom: solid 1px #c4c4c4;
}
.accordion h3 {
	background: #e9e7e7 url(images/arrow-square.gif) no-repeat right -51px;
	padding: 7px 15px;
	margin: 0;
	font: bold "Trebuchet MS", Verdana, Tahoma;
	border: solid 1px #c4c4c4;
	border-bottom: none;
	cursor: pointer;
}
.accordion h3:hover {
/*	background-color: #e3e2e2; */
	background-color: #1C478E;
	color: #FFF;
}
.accordion h3.active {
	background-position: right 5px;
	background-color: #1C478E;
	color: #FFF;
}
.accordion p {
	background: #f7f7f7;
	margin: 0;
	padding: 10px 15px 20px;
	border-left: solid 1px #c4c4c4;
	border-right: solid 1px #c4c4c4;
}
</style>
<script src="js/jquery-1.4.4.js"></script>
<script src="js/tooltip.js"></script>

</head>

<body>

<script type="text/javascript">
$(document).ready(function(){
	
	$(".accordion h3:first").addClass("active");
	$(".accordion p:not(:first)").hide();

	$(".accordion h3").click(function(){
		$(this).next("p").slideToggle("slow")
		.siblings("p:visible").slideUp("slow");
		$(this).toggleClass("active");
		$(this).siblings("h3").removeClass("active");
	});

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
		     
        	<h2>Ziyaretçi defteri</h2> 
       	  <p>&nbsp;<?php vt_baglan(); 
		  if($_POST['isim'] AND $_POST['mesaj'] AND $_POST['resim']=="sonsuz us")
		  {
			$isim = $_POST['isim'];
			$zaman = date("d-m-Y H:m");
			$mesaj = $_POST['mesaj'];
			$sql = "INSERT INTO defter (isim, zaman, mesaj) VALUES ('$isim', '$zaman', '$mesaj')";
	        mysql_query($sql, $GLOBALS[baglan]);
		  }
		  
		  ?></p>
            
            <form id="form1" name="form1" method="post" action="defter.php">
              <p>İsminiz: 
                <input name="isim" type="text" id="isim" maxlength="50" />
                
              </p>
              <p>   
              Mesajınız:<br />             
                  <textarea name="mesaj" cols="70" rows="3" id="mesaj" ></textarea>
              </p>
              <p>
              <img src="images/resim.jpg" /> <br />
               Resimde ki metni yazınız: <input name="resim" type="text" id="resim" maxlength="20" /> 
              </p>
              <p>
                <label>
                  <input type="submit" name="submit" id="submit" value="Gönder" />
                </label>
              </p>
            </form>
           	
       	  
<br /><br /><br />



<div class="accordion">
  <?php
  $sql = "SELECT * FROM defter ORDER BY mid DESC LIMIT 0 , 10";
	$sorgu = mysql_query($sql, $GLOBALS[baglan]);	
	while($row = mysql_fetch_array($sorgu))
     {
      echo ("<h3>".$row['isim']." &nbsp;&nbsp;&nbsp;&nbsp; ".$row['zaman']."</h3>");
	  echo ("<p>".$row['mesaj']."</p>");
     }
  
  ?>

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
