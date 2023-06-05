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
<script language="javascript" type="text/javascript">
function buyuk_harfe_cevir(s){
	return (s.replace("ı","I").replace("i","İ")).toUpperCase();
}
 

</script>		

    

</head>

<body>

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
      <h2>Listelenen Kayıtlar</h2>
      <p id="1">Aşağıdaki alanları doldurarak arama kriterlerini belirtebilirsiniz. İsimlerin başlangıçlarından bir kaç harf yazabilirsiniz. Tabloda ilk 100 kayıt görüntülenmektedir.</p>
      <form id="form1" name="form1" method="post" action="arama.php">
        <table width="100%" border="0">
          <tr>
            <td width="30%" height="40"><label>Ad
              <input type="text" name="ad" id="ad" onKeyUp="this.value=buyuk_harfe_cevir(this.value);" />
            </label></td>
            <td width="30%"><label>Soyad
              <input type="text" name="soyad" id="soyad" onKeyUp="this.value=buyuk_harfe_cevir(this.value);" />
            </label></td>
            <td width="40%"> <label>Şehir:
       	        <select name="sehir" size="1" id="sehir">
                
<OPTION VALUE="01">ADANA</OPTION>
<OPTION VALUE="02">ADIYAMAN</OPTION>
<OPTION VALUE="03">AFYON</OPTION>
<OPTION VALUE="04">AĞRI</OPTION>
<OPTION VALUE="05">AMASYA</OPTION>

<OPTION VALUE="06">ANKARA</OPTION>
<OPTION VALUE="07">ANTALYA</OPTION>
<OPTION VALUE="08">ARTVİN</OPTION>
<OPTION VALUE="09">AYDIN</OPTION>
<OPTION VALUE="10">BALIKESİR</OPTION>
<OPTION VALUE="11">BİLECİK</OPTION>
<OPTION VALUE="12">BİNGÖL</OPTION>
<OPTION VALUE="13">BİTLİS</OPTION>
<OPTION VALUE="14">BOLU</OPTION>

<OPTION VALUE="15">BURDUR</OPTION>
<OPTION VALUE="16">BURSA</OPTION>
<OPTION VALUE="17">ÇANAKKALE</OPTION>
<OPTION VALUE="18">ÇANKIRI</OPTION>
<OPTION VALUE="19">ÇORUM</OPTION>
<OPTION VALUE="20">DENİZLİ</OPTION>
<OPTION VALUE="21">DİYARBAKIR</OPTION>
<OPTION VALUE="22">EDİRNE</OPTION>
<OPTION VALUE="23">ELAZIĞ</OPTION>

<OPTION VALUE="24">ERZİNCAN</OPTION>
<OPTION VALUE="25">ERZURUM</OPTION>
<OPTION VALUE="26">ESKİŞEHİR</OPTION>
<OPTION VALUE="27">GAZİANTEP</OPTION>
<OPTION VALUE="28">GİRESUN</OPTION>
<OPTION VALUE="29">GÜMÜŞHANE</OPTION>
<OPTION VALUE="30">HAKKARİ</OPTION>
<OPTION VALUE="31">HATAY</OPTION>
<OPTION VALUE="32">ISPARTA</OPTION>

<OPTION VALUE="33">MERSİN</OPTION>
<OPTION VALUE="34" selected="selected">İSTANBUL</OPTION>
<OPTION VALUE="35">İZMİR</OPTION>
<OPTION VALUE="36">KARS</OPTION>
<OPTION VALUE="37">KASTAMONU</OPTION>
<OPTION VALUE="38">KAYSERİ</OPTION>
<OPTION VALUE="39">KIRKLARELİ</OPTION>
<OPTION VALUE="40">KIRŞEHİR</OPTION>
<OPTION VALUE="41">KOCAELİ</OPTION>

<OPTION VALUE="42">KONYA</OPTION>
<OPTION VALUE="43">KÜTAHYA</OPTION>
<OPTION VALUE="44">MALATYA</OPTION>
<OPTION VALUE="45">MANİSA</OPTION>
<OPTION VALUE="46">KAHRAMANMARAŞ</OPTION>
<OPTION VALUE="47">MARDİN</OPTION>
<OPTION VALUE="48">MUĞLA</OPTION>
<OPTION VALUE="49">MUŞ</OPTION>
<OPTION VALUE="50">NEVŞEHİR</OPTION>

<OPTION VALUE="51">NİĞDE</OPTION>
<OPTION VALUE="52">ORDU</OPTION>
<OPTION VALUE="53">RİZE</OPTION>
<OPTION VALUE="54">SAKARYA</OPTION>
<OPTION VALUE="55">SAMSUN</OPTION>
<OPTION VALUE="56">SİİRT</OPTION>
<OPTION VALUE="57">SİNOP</OPTION>
<OPTION VALUE="58">SİVAS</OPTION>
<OPTION VALUE="59">TEKİRDAĞ</OPTION>

<OPTION VALUE="60">TOKAT</OPTION>
<OPTION VALUE="61">TRABZON</OPTION>
<OPTION VALUE="62">TUNCELİ</OPTION>
<OPTION VALUE="63">ŞANLIURFA</OPTION>
<OPTION VALUE="64">UŞAK</OPTION>
<OPTION VALUE="65">VAN</OPTION>
<OPTION VALUE="66">YOZGAT</OPTION>
<OPTION VALUE="67">ZONGULDAK</OPTION>
<OPTION VALUE="68">AKSARAY</OPTION>

<OPTION VALUE="69">BAYBURT</OPTION>
<OPTION VALUE="70">KARAMAN</OPTION>
<OPTION VALUE="71">KIRIKKALE</OPTION>
<OPTION VALUE="72">BATMAN</OPTION>
<OPTION VALUE="73">ŞIRNAK</OPTION>
<OPTION VALUE="74">BARTIN</OPTION>
<OPTION VALUE="75">ARDAHAN</OPTION>
<OPTION VALUE="76">IĞDIR</OPTION>
<OPTION VALUE="77">YALOVA</OPTION>

<OPTION VALUE="78">KARABÜK</OPTION>
<OPTION VALUE="79">KİLİS</OPTION>
<OPTION VALUE="80">OSMANİYE</OPTION>
<OPTION VALUE="81">DÜZCE</OPTION>
<OPTION VALUE="98">KIBRIS</OPTION>
<OPTION VALUE="99">YABANCI</OPTION>



      	          </select>
        	    </label></td>
          </tr>
          <tr>
            <td height="40">&nbsp;</td>
            <td>&nbsp;</td>
            <td align="center" valign="middle"><label>
              <input type="submit" name="submit" id="submit" value="Listele" />
            </label></td>
          </tr>
        </table>
      </form>
      <p>&nbsp;</p> 
   	    <p>&nbsp;</p>
           	<p>&nbsp;<?php vt_baglan(); ?></p>
       	  <h3>Soyunu görmek istediğiniz üyenin üzerine tıklayınız</h3>
   <div id="demo">
<table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
	<thead>
		<tr>

			<th>Ad</th>
			<th>Soyad</th>
			<th>Şehir</th>
			<th>Doğum Yılı</th>
			<th>Cinsiyet</th>
		</tr>

	</thead>
	<tbody style="cursor:pointer">
    <?php
	$arama_kriteri="";
    if($_POST['ad']!="" OR $_POST['soyad']!="" OR $_POST['sehir']!=""){
		$ad = $_POST['ad'];
		$soyad = $_POST['soyad'];
		$sehir = $_POST['sehir'];
		$arama_kriteri= " WHERE ad LIKE '%$ad%' AND soyad LIKE '%$soyad%' AND sehir='$sehir'";
	} 
	
	$arama_kriteri = $arama_kriteri." ORDER BY uid ASC LIMIT 0, 100";
	
	$sql = "SELECT * FROM uye".$arama_kriteri;
		
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
