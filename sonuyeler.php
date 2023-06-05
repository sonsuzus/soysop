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
<script src="js/jquery-1.4.4.js"></script>
<script src="js/tooltip.js"></script>
<style type="text/css" title="currentStyle">
			@import "js/media/css/demo_page.css";
			@import "js/media/css/demo_table.css";
		</style>
	<!--	<script type="text/javascript" language="javascript" src="js/media/js/jquery.js"></script> -->

		<script type="text/javascript" language="javascript" src="js/media/js/jquery.dataTables.js"></script>
		

    

</head>

<body >

<script type="text/javascript" charset="utf-8">
$(document).ready(
function() {
	$("p#1").hide("fast");
$("p#2").hide("fast");
$("p#3").hide("fast");
$("p#1").show("slow");
$("p#2").delay(800).show("slow");
$("p#3").delay(1600).show("slow");
$('#example').dataTable( {
		"sDom": '<"toolbar">frtip',
		"aaSorting": [[ 1, "asc" ]]

	} );
	$("div.toolbar").html('Soyada göre sıralanmıştır. Tablo başlıklarına tıklayarak sıralamayı değiştirebilirsiniz.');


});
function soy(obj) {
id = obj.getAttribute("id");
window.location="soy.php?uye="+id;
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
	   ?>
        </div>
        
        
        
        
		<div id="content">
        
        
        <div id="content_top"></div>
        <div id="content_main">
      <h2>Son Kayıtlar</h2> 
        	<p>&nbsp;</p>
           	<p>&nbsp;<?php vt_baglan(); ?></p>
       	  <h3>Soyunu görmek istediğiniz üyenin üzerine tıklayınız.</h3>
   <div id="demo">
<table cellpadding="0" cellspacing="0" border="0" class="display" id="example" >
	<thead>
		<tr>

			<th>Ad</th>
			<th>Soyad</th>
			<th>Şehir</th>
			<th>Doğum Yılı</th>
			<th>Cinsiyet</th>
            
		</tr>

	</thead>
	<tbody style="cursor:pointer" >
    <?php
    
		$sql = "SELECT * FROM uye ORDER BY uid DESC LIMIT 0, 10";
	$sorgu = mysql_query($sql, $GLOBALS[baglan]);
	while($row = mysql_fetch_array($sorgu))
  	{
		echo ("<tr class=\"".$row['uid']."\" id=\"".$row['uid']."\" onclick=\"soy(this)\">");
		echo ("<td>".$row['ad']."</td>");
		echo ("<td>".$row['soyad']."</td>");
		echo ("<td>".sehir_yaz($row['sehir'])."</td>");
		echo ("<td>".$row['dyil']."</td>");
		echo ("<td>".cins_yaz($row['cins'])."</td></tr>");
		
	}
	?>
		
		
	</tbody>
	<tfoot>
		<tr>
			<th>Ad</th>

			<th>Soyad</th>
			<th>Şehir</th>
			<th>Doğum Yılı</th>
			<th>Cinsiyet</th>
            
		</tr>
	</tfoot>
</table>

			</div>

<p>&nbsp;</p>
        </div>
		

        <div id="content_bottom"></div>
            
            <div id="footer"><h3><a href="http://www.soyumsopum.net">Soyum Sopum Net&copy;  2011</a></h3></div>
            <div id="sayac">Sayfa gösterimi <?php echo(stats_ekle($_SERVER['HTTP_REFERER'], date("d-m-Y H:m"), $_SERVER['REMOTE_ADDR'])); ?></div>
      </div>
   </div>
 <?php vt_baglanti_kapat(); ?>
</body>
</html>
