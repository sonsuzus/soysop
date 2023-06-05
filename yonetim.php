<?php ob_start(); error_reporting(0); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="soy ağacı soylar ağaç akraba akrabalık ata dede sop soplar sopum soyum">
<link rel="stylesheet" type="text/css" href="style.css" />

<title>Soyum Sopum Net</title>
<style type="text/css">
.fixedColumn .fixedTable td
        {
            color: #FFFFFF;
            background-color: #187BAF;
            font-size: 12px;
            font-weight: normal;
        }
        
        .fixedHead td, .fixedFoot td
        {
            color: #FFFFFF;
            background-color: #187BAF;
            font-size: 12px;
            font-weight: normal;
            padding: 5px;
            border: 1px solid #187BAF;
        }
        .fixedTable td
        {
            font-size: 8.5pt;
            background-color: #FFFFFF;
            padding: 5px;
            text-align: left;
            border: 1px solid #CEE7FF;
        }

</style>
<style type="text/css" title="currentStyle">
			@import "js/media/css/demo_page.css";
			@import "js/media/css/demo_table.css";
		</style>
<script src="js/jquery-1.4.4.js"></script>
<script type="text/javascript" language="javascript" src="js/media/js/jquery.dataTables.js"></script>
<script language="javascript" type="text/javascript">
function buyuk_harfe_cevir(s){
	return (s.replace("ı","I").replace("i","İ")).toUpperCase();
}
 

</script>
</head>
<body>

<script>
var oTable;
$(document).ready(
function() {
$("p#1").hide("fast");
$("p#2").hide("fast");
$("p#3").hide("fast");
$("p#1").show("slow");
$("p#2").delay(800).show("slow");
$("p#3").delay(1600).show("slow");
$('#form_c').submit( function() {
					var sData = $('input', oTable.fnGetNodes()).serialize();
					$("div.toolbar").html('Seçtiğiniz çocuklar eklendi.');
					$.get("yeni.php", {data: sData});
					return false;
				} );
				
				oTable = $('#example').dataTable({
		"sDom": '<"toolbar">frtip',
		"aaSorting": [[ 1, "asc" ]]

	});
$("div.toolbar").html('Aşağıdaki tablodan kayıt seçiniz.');
	
	

});

function soy(obj) {
id = obj.getAttribute("id");
window.location="yonetim.php?uye="+id;
}
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
	   
	   vt_baglan(); 
	   ?>
        </div>
        
        
        
        
		<div id="content">
        
        
        <div id="content_top"></div>
        <div id="content_main">
        
        <h2>Yönetim </h2> 
        <p>&nbsp;</p>
       	  <p>
            <?php
			
		if($_POST["sifre"]=="pass")
		{
			$sifre = $_POST["sifre"];
			setcookie("Sifre", $sifre);
			header("Location: yonetim.php");
            exit; 
			
			
		}
		
		
		
		?>
          
            </p>
            <p><form id="sess" name="sess" method="post" action="yonetim.php">
            <label>Parola:<input type="text" name="sifre" id="sifre" /></label><input name="submit1" id="submit1" type="submit" value="Oturum aç">
            </form></p>
            
          
 <?php if($_COOKIE["Sifre"]=="pass")
 {
 
 include("yonet.php"); 
 }
 ?>
</div>
        <div id="content_bottom"></div>
            
            <div id="footer"><h3><a href="http://www.soyumsopum.net">Soyum Sopum Net&copy; 2011</a></h3></div>
            <div id="sayac">Sayfa gösterimi <?php echo(stats_ekle($_SERVER['HTTP_REFERER'], date("d-m-Y H:m"), $_SERVER['REMOTE_ADDR'])); ?></div>
      </div>
   </div>
   <?php vt_baglanti_kapat();  ?>
</body>
</html>
<?php ob_end_flush(); ?> 
