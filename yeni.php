<?php ob_start(); ?>
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
<style type="text/css" title="currentStyle">
			@import "js/media/css/demo_page.css";
			@import "js/media/css/demo_table.css";
		</style>
<script src="js/jquery-1.4.4.js"></script>
<script src="js/tooltip.js"></script>
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
$("div.toolbar").html('Aşağıdaki tablodan (eğer varsa) çocuklarını seçip Çocuk Ekle butonuna basınız.<a class="tooltip" title="Daha önce eklediğiniz bir kayıt tabloda görünmüyorsa, tekrar aynı kaydı yeniden ekleyebilirsiniz. Çocuğu seçeniğinin işaretli olmasına dikkat ediniz">Tabloda yok?</a>');
	
	

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
        
        <h2>Yeni Kayıt </h2> 
        <p>&nbsp;</p>
       	  <p>
            <?php
			$cocuk_form = "hidden";
			$hicbiri_sec = "checked=\"checked\"";
			/* Data yoluyla (tablo yoluyla) çocuk ekleme bölümü */
			if($_GET["data"]!="")
			{
				$cocuklar = explode("&", $_GET["data"]);
				$i = 0;
				while($i<=count($cocuklar))
				{
				$a = explode("=", $cocuklar[$i]);
				cocuk_ekle($a[0], $a[1]);
				$i++;
				} 
			}
			
		/* Posttan gelen bilgiler */	
		if($_POST["ad"]!="" AND $_POST["cins"]!="" AND $_POST["dyil"]!=""){
		$ad = $_POST["ad"];
		$soyad = $_POST["soyad"];
		$sehir = $_POST["sehir"];
		$dyil = $_POST["dyil"];
		$cins = $_POST["cins"];
		$email = $_POST["email"];
		setcookie("EMail", $email); //cookie oluşturmak için
		$sonuc = kayit_ekle($ad, $soyad, $sehir, $dyil, $cins, $email, $_SERVER['REMOTE_ADDR']);
		$uid = $sonuc;
		$diz = kayit_bul($sonuc);
		echo ("Kayıt eklendi: <a href=\"soy.php?uye=".$diz[0]."\"> $diz[1] $diz[2] - ".sehir_yaz($diz[3])." - $diz[4]</a>");
		
		/* post yoluyla gleen bilgiyle çocuk ouşturma */
		if($_POST["radio_akraba"]!="hicbiri")
		{
			$akraba = explode("-",$_POST["radio_akraba"]);
			if($akraba[0]=="cocuk"){ cocuk_ekle($akraba[1], $sonuc); }
			if($akraba[0]=="baba"){ cocuk_ekle($sonuc, $akraba[1]); }
			if($akraba[0]=="anne"){ cocuk_ekle($sonuc, $akraba[1]); }
		}
		$cocuk_form = "visible";
		}
		else
		{
			echo "Formu doldururken Ad, <a class=\"tooltip\" title=\"Bilmesenizde tahmini olarak girmelisiniz\">Doğum yılı</a> ve Cinsiyet alanlarını mutlaka belirtmeniz gerekiyor.";
		}
		
		// get yoluyla düzenlemeden gelmek çocuk
		if($_GET["cocuk"]=="ekle" AND $_GET["uid"]!="")
		{
			$uid = $_GET["uid"];
			$diz = kayit_bul($uid);
			echo ("<br><br>Kayıt: <a href=\"soy.php?uye=".$diz[0]."\"> $diz[1] $diz[2] - ".sehir_yaz($diz[3])." - $diz[4]</a>");
			$cocuk_form = "visible"; 
			$cocuk_sec = "checked=\"checked\"";
			$hicbiri_sec = "";
		}
		// get yoluyla düzenlemeden gelmek baba
		if($_GET["baba"]=="ekle" AND $_GET["uid"]!="")
		{
			$uid = $_GET["uid"];
			$diz = kayit_bul($uid);
			echo ("<br><br>Kayıt: <a href=\"soy.php?uye=".$diz[0]."\"> $diz[1] $diz[2] - ".sehir_yaz($diz[3])." - $diz[4]</a>");
			$cocuk_form = "visible"; 
			$baba_sec = "checked=\"checked\"";
			$hicbiri_sec = "";
		}
		// get yoluyla düzenlemeden gelmek anne
		if($_GET["anne"]=="ekle" AND $_GET["uid"]!="")
		{
			$uid = $_GET["uid"];
			$diz = kayit_bul($uid);
			echo ("<br><br>Kayıt: <a href=\"soy.php?uye=".$diz[0]."\"> $diz[1] $diz[2] - ".sehir_yaz($diz[3])." - $diz[4]</a>");
			$cocuk_form = "visible"; 
			$anne_sec = "checked=\"checked\"";
			$hicbiri_sec = "";
		}
		?>
            
            </p>
            
          
                 	<form id="yeni" name="yeni" method="post" action="yeni.php">
           	  <p style="visibility:<?php echo ($cocuk_form); ?>" id="1"> Yeni ekleyeceğiniz kişi öncekinin nesi?<br />
           	    <label>
           	      <input type="radio" name="radio_akraba" value="cocuk-<?php echo($uid); ?>" id="radio_akraba_0" style="visibility:<?php echo ($cocuk_form); ?>" <?php echo ($cocuk_sec); ?>/>
           	      Çocuğu</label>
           	    <br />
                 <label>
           	      <input type="radio" name="radio_akraba" value="baba-<?php echo($uid); ?>" id="radio_akraba_2" style="visibility:<?php echo ($cocuk_form); ?>" <?php echo ($baba_sec); ?>/>
           	      Babası</label>
           	    <br />
                 <label>
           	      <input type="radio" name="radio_akraba" value="anne-<?php echo($uid); ?>" id="radio_akraba_3" style="visibility:<?php echo ($cocuk_form); ?>" <?php echo ($anne_sec); ?>/>
           	      Annesi</label>
           	    <br />
           	               	    <label>
           	      <input name="radio_akraba" type="radio" id="radio_akraba_1" value="hicbiri" <?php echo ($hicbiri_sec); ?> style="visibility:<?php echo ($cocuk_form); ?>" />
           	      Hiç birşeyi</label>
                  
           	    
       	      </p>
   	      
         
           	
   	    <h3>Yeni Kayıt için lütfen aşağıdaki formu doldurunuz.</h3>
        	<p>
            </p>
            
        	
        	<p>
            <table width="100%">
            <tr>
            <td width="34%" height="50">
              
        	    <label>Ad:
        	      <input type="text" name="ad" id="ad" onKeyUp="this.value=buyuk_harfe_cevir(this.value);" />
       	        </label><br /> </td><td width="33%">
        	    <label>Soyad:
        	      <input type="text" name="soyad" id="soyad" onKeyUp="this.value=buyuk_harfe_cevir(this.value);" />
       	        </label></td>
                <td width="33%">&nbsp;</td>
      	    </tr><tr>
        	  <td width="34%" height="50">
        	    <label>Doğum Yeri:
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
<OPTION selected VALUE="34">İSTANBUL</OPTION>
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
        	    </label><br /></td><td width="33%">
        	    <label>Doğum Yılı
        	      <input name="dyil" type="text" id="dyil" size="4" maxlength="4" onKeyUp="if(isNaN(this.value)) this.value='';"/>
        	    </label></td><td width="33%">
        	    <label>Cinsiyet:
        	      <input name="cins" type="radio" id="c_e" value="c_e" />
        	      Erkek</label>
        	    |
        	    <label>
        	      <input name="cins" type="radio" id="c_k" value="c_k" />
        	      Kadın</label></td>
       	     </tr><tr><td width="34%" height="50">
        	    <label>Eposta Adresiniz
        	      <input type="text" name="email" id="email"  value="<?php echo ($_COOKIE["EMail"]); ?>"/>
      	      </label><br /></td>
       	     <td colspan="2">Daha sonra kayıtları değiştirmek veya güncellemek için eposta adresinizi doğru bir şekilde girmelisiniz.</td>
              </tr><tr><td height="50">&nbsp;</td><td colspan="2">
        	  <label>
        	  <input type="submit" name="submit" id="submit" value="Kaydet" />
        	Formu tamamladıktan sonra kaydedin.</label></td></tr>
            </table>
      	    </p>
          </form>
        	
<p></p>
        <?php if($cocuk_form!="visible") echo ("<!--"); ?>
		<div id="demo" style="visibility:<?php echo ($cocuk_form); ?>">
            <form id="form_c">
					<div style="text-align:right; padding-bottom:1em;">
						<button type="submit">Çocukları Ekle</button>
					</div>
<table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
	<thead>
		<tr>
			<th>Adı</th>

			<th>Soyadı</th>
			<th>Şehir</th>
			<th>Doğum Yılı</th>
			<th>İşaretle</th>
		</tr>

	</thead>
	<tbody>
 <?php
    
		$sql = "SELECT * FROM uye WHERE (soyad='$diz[2]' OR sehir='$diz[3]') AND dyil>$diz[4]+10";
	$sorgu = mysql_query($sql, $GLOBALS[baglan]);
	while($row = mysql_fetch_array($sorgu))
  	{
		echo ("<tr class=\"".$row['uid']."\">");
		echo ("<td>".$row['ad']."</td>");
		echo ("<td>".$row['soyad']."</td>");
		echo ("<td>".sehir_yaz($row['sehir'])."</td>");
		echo ("<td>".$row['dyil']."</td>");
		echo ("<td>"."<input type=\"checkbox\" name=\"".$diz[0]."\" value=\"".$row['uid']."\"></td></tr>");
	}
	?>
		
		
	</tbody>
	
</table>
</form>
</div>
 <?php if($cocuk_form!="visible") echo ("-->"); ?>
</div>
        <div id="content_bottom"></div>
            
            <div id="footer"><h3><a href="http://www.soyumsopum.net">Soyum Sopum Net&copy; 2011</a></h3></div>
            <div id="sayac">Sayfa gösterimi <?php echo(stats_ekle($_SERVER['HTTP_REFERER'], date("d-m-Y H:m"), $_SERVER['REMOTE_ADDR'])); ?></div>
      </div>
   </div>
   <?php vt_baglanti_kapat(); ?>
</body>
</html>
<?php ob_end_flush(); ?> 