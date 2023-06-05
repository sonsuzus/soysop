<?php

/* Veritabanı bağlantısı için, 
baglan global tanımlanacak her fonksiyonda*/

function vt_baglan()
{
//BAĞLANTI
$kullaniciadi="soyum_sopum";
$sifre= "password";
$host="localhost";
$veritabani="soyum_sopum";
	 
//VERİTABANI SEÇME
$GLOBALS[baglan]=mysql_connect($host,$kullaniciadi, $sifre);
if (!$GLOBALS[baglan])
  {
  die("Veritabanı bağlantısı kurulamadı: " . mysql_error());
  }
   else 
   {
mysql_select_db($veritabani,$GLOBALS[baglan]);
 mysql_query("SET NAMES 'utf8'", $GLOBALS[baglan]);
   };
   
}

/* KAYIT EKLEME
Önce kayıt varmı diye kontrol ediyor, eğer bulursa o kaydı döndürüyor,
bulamazsa yeni kaydı döndürüyor */

function kayit_ekle($ad, $soyad, $sehir, $dyil, $cins, $email, $ip)
{
//	$sonuc = 0;
	$sql = "SELECT uid FROM uye WHERE ad='$ad' AND soyad='$soyad' AND sehir='$sehir' AND dyil=$dyil AND cins='$cins'";
	$sorgu = mysql_query($sql, $GLOBALS[baglan]);
	while($row = mysql_fetch_array($sorgu))
  {
  $sonuc = $row['uid'];
  }
	if($sonuc)
	{
		return $sonuc;
	}
	else
	{
	$sql = "INSERT INTO uye (ad, soyad, sehir, dyil, cins, email, ip) VALUES ('$ad', '$soyad', '$sehir', $dyil, '$cins', '$email', '$ip')";
	mysql_query($sql, $GLOBALS[baglan]);
	$sql = "SELECT uid FROM uye WHERE ad='$ad' AND soyad='$soyad' AND sehir='$sehir' AND dyil=$dyil AND cins='$cins'";
	$sorgu = mysql_query($sql, $GLOBALS[baglan]);	
	while($row = mysql_fetch_array($sorgu))
     {
      $sonuc = $row['uid'];
     }
	}
	return $sonuc;
}

/* KAYIT BUL
uid i girilmiş bir kullanıcıyı dizi şeklinde döndürüyor */

function kayit_bul($uid)
{
	$sql = "SELECT * FROM uye WHERE uid=$uid";
	$sorgu = mysql_query($sql, $GLOBALS[baglan]);
	while($row = mysql_fetch_array($sorgu))
  	{
  	$dizi[0] = $row['uid'];
	$dizi[1] = $row['ad'];
	$dizi[2] = $row['soyad'];
	$dizi[3] = $row['sehir'];
	$dizi[4] = $row['dyil'];
	$dizi[5] = $row['cins'];
	$dizi[6] = $row['email'];
  	}
	return $dizi;

}

/* Şehir ismi almak için */
function sehir_yaz($n)
{
	switch($n)
{
case "01": $sehir="ADANA";  break;
case "02": $sehir="ADIYAMAN";  break;
case "03": $sehir="AFYON";  break;
case "04": $sehir="AĞRI";  break;
case "05": $sehir="AMASYA";  break;

case "06": $sehir="ANKARA";  break;
case "07": $sehir="ANTALYA";  break;
case "08": $sehir="ARTVİN";  break;
case "09": $sehir="AYDIN";  break;
case "10": $sehir="BALIKESİR";  break;
case "11": $sehir="BİLECİK";  break;
case "12": $sehir="BİNGÖL";  break;
case "13": $sehir="BİTLİS";  break;
case "14": $sehir="BOLU";  break;

case "15": $sehir="BURDUR";  break;
case "16": $sehir="BURSA";  break;
case "17": $sehir="ÇANAKKALE";  break;
case "18": $sehir="ÇANKIRI";  break;
case "19": $sehir="ÇORUM";  break;
case "20": $sehir="DENİZLİ";  break;
case "21": $sehir="DİYARBAKIR";  break;
case "22": $sehir="EDİRNE";  break;
case "23": $sehir="ELAZIĞ";  break;

case "24": $sehir="ERZİNCAN";  break;
case "25": $sehir="ERZURUM";  break;
case "26": $sehir="ESKİŞEHİR";  break;
case "27": $sehir="GAZİANTEP";  break;
case "28": $sehir="GİRESUN";  break;
case "29": $sehir="GÜMÜŞHANE";  break;
case "30": $sehir="HAKKARİ";  break;
case "31": $sehir="HATAY";  break;
case "32": $sehir="ISPARTA";  break;

case "33": $sehir="MERSİN";  break;
case "34": $sehir="İSTANBUL";  break;
case "35": $sehir="İZMİR";  break;
case "36": $sehir="KARS";  break;
case "37": $sehir="KASTAMONU";  break;
case "38": $sehir="KAYSERİ";  break;
case "39": $sehir="KIRKLARELİ";  break;
case "40": $sehir="KIRŞEHİR";  break;
case "41": $sehir="KOCAELİ";  break;

case "42": $sehir="KONYA";  break;
case "43": $sehir="KÜTAHYA";  break;
case "44": $sehir="MALATYA";  break;
case "45": $sehir="MANİSA";  break;
case "46": $sehir="KAHRAMANMARAŞ";  break;
case "47": $sehir="MARDİN";  break;
case "48": $sehir="MUĞLA";  break;
case "49": $sehir="MUŞ";  break;
case "50": $sehir="NEVŞEHİR";  break;

case "51": $sehir="NİĞDE";  break;
case "52": $sehir="ORDU";  break;
case "53": $sehir="RİZE";  break;
case "54": $sehir="SAKARYA";  break;
case "55": $sehir="SAMSUN";  break;
case "56": $sehir="SİİRT";  break;
case "57": $sehir="SİNOP";  break;
case "58": $sehir="SİVAS";  break;
case "59": $sehir="TEKİRDAĞ";  break;

case "60": $sehir="TOKAT";  break;
case "61": $sehir="TRABZON";  break;
case "62": $sehir="TUNCELİ";  break;
case "63": $sehir="ŞANLIURFA";  break;
case "64": $sehir="UŞAK";  break;
case "65": $sehir="VAN";  break;
case "66": $sehir="YOZGAT";  break;
case "67": $sehir="ZONGULDAK";  break;
case "68": $sehir="AKSARAY";  break;

case "69": $sehir="BAYBURT";  break;
case "70": $sehir="KARAMAN";  break;
case "71": $sehir="KIRIKKALE";  break;
case "72": $sehir="BATMAN";  break;
case "73": $sehir="ŞIRNAK";  break;
case "74": $sehir="BARTIN";  break;
case "75": $sehir="ARDAHAN";  break;
case "76": $sehir="IĞDIR";  break;
case "77": $sehir="YALOVA";  break;

case "78": $sehir="KARABÜK";  break;
case "79": $sehir="KİLİS";  break;
case "80": $sehir="OSMANİYE";  break;
case "81": $sehir="DÜZCE";  break;
case "98": $sehir="KIBRIS";  break;
case "99": $sehir="YABANCI";  break;
default: $sehir="İSTANBUL";
}
return $sehir;

}

/*Çocuk Ekleme fonksiyonu */
function cocuk_ekle($ebeveyn, $cocuk)
{
	$dizi = kayit_bul($ebeveyn);
	$dizi_c = kayit_bul($cocuk);
	if($dizi[5]=="c_e" and ($dizi[4]+10)<$dizi_c[4])
	{
		$sql = "SELECT * FROM baba WHERE cid=$cocuk";
	    $sorgu = mysql_query($sql, $GLOBALS[baglan]);	
		if(mysql_num_rows($sorgu)==0)
		{
			mysql_query("INSERT INTO baba (uid, cid) VALUES ($ebeveyn, $cocuk)", $GLOBALS[baglan]);
			return true;
		}
	}
	if($dizi[5]=="c_k" and ($dizi[4]+10)<$dizi_c[4])
	{
		$sql = "SELECT * FROM anne WHERE cid=$cocuk";
	    $sorgu = mysql_query($sql, $GLOBALS[baglan]);	
		if(mysql_num_rows($sorgu)==0)
		{
			mysql_query("INSERT INTO anne (uid, cid) VALUES ($ebeveyn, $cocuk)", $GLOBALS[baglan]);
			return true;
		}
	}
	return false;
}

/* Cinsiyet almak için */
function cins_yaz($n)
{
	switch($n)
	{
		case "c_e": $cins="ERKEK"; break;
		case "c_k": $cins="KADIN"; break;
		default: $cins="ERKEK";
	}
	return $cins;
}

/* Baba bulmak için */
function baba_bul($uid)
{
	$sonuc = 0;
	$sql = "SELECT * FROM baba WHERE cid=$uid";
	$sorgu = mysql_query($sql, $GLOBALS[baglan]);
	while($row = mysql_fetch_array($sorgu))
  	{
  	$sonuc = $row['uid'];
	}
	return $sonuc;	
}


/* Anne bulmak için */
function anne_bul($uid)
{
	$sonuc = 0;
	$sql = "SELECT * FROM anne WHERE cid=$uid";
	$sorgu = mysql_query($sql, $GLOBALS[baglan]);
	while($row = mysql_fetch_array($sorgu))
  	{
  	$sonuc = $row['uid'];
	}
	return $sonuc;	
}

/* Rastgele Üye bulmak için */

function rastgele_uye()
{
	$sql = "SELECT MAX(uid) FROM uye";
	$sonuc = mysql_query($sql, $GLOBALS[baglan]);
	$row=mysql_fetch_array($sonuc);      
	$son=$row['MAX(uid)'];
	$uye = rand(1,$son);
	$dizi = kayit_bul($uye);
	return $dizi[0];
	
}

/* Çocuk bulmak için 
Fonksiyonda bir hata var dizi döndüremedim. Web sayfasında halletmek lazım

function cocuk_bul($uid)
{
	$sonuc = 0;
	$i = 0;
	$sql = "SELECT * FROM anne WHERE uid=$uid";
	$sorgu = mysql_query($sql, $GLOBALS[baglan]);
	if(mysql_num_rows($sorgu))
	{
		while($row = mysql_fetch_array($sorgu))
  		{
  		$sonuc[$i] = $row['cid'];
		$i++;
		}
		
	}
	else
	{
		$sql = "SELECT * FROM baba WHERE uid=$uid";
	    $sorgu = mysql_query($sql, $GLOBALS[baglan]);
		if(mysql_num_rows($sorgu))
		{
		while($row = mysql_fetch_array($sorgu))
  			{
  			$sonuc[$i] = $row['cid'];
			$i++;
			}
		
		}
	}
	return $sonuc;	
}
*/

/* Linkli string döndür */

function linkli_yaz($uid, $sayi)
{
	$dizi = kayit_bul($uid);
	if($dizi)
	{
	$link = $dizi[0];
	$ad = $dizi[1];
	$soyad = $dizi[2];
	$isim = $ad." ".$soyad;
	if($sayi)
	{
		$ad = utf8_encode(substr(utf8_decode($ad), 0, $sayi));
		$ad = $ad.".";
		$soyad = utf8_encode(substr(utf8_decode($soyad), 0, $sayi));		
		$soyad = $soyad.".";
	}
	$yaz = "<a href=\"soy.php?uye=".$link."\" class=\"tooltip\" title=\"".$isim."\">".$ad." ".$soyad."</a>";
	}
	else
	{
		$yaz = 	"<a class=\"tooltip\" title=\"Yeni kayıt ekleyin\">??. ??.</a>";
	}
	return $yaz;
	
}

/* Kayıt silme */
function kayit_sil($uid)
{
	
	mysql_query("DELETE FROM uye WHERE uid=$uid");
	mysql_query("DELETE FROM anne WHERE uid='$uid' OR cid='$uid'");
	mysql_query("DELETE FROM baba WHERE uid='$uid' OR cid='$uid'");	
	
}

/* Stats ekleme */
function stats_ekle($ref, $zaman, $ip)
{
	$sql = "INSERT INTO stats (referer, zaman, ip) VALUES ('$ref', '$zaman', '$ip')";
	mysql_query($sql, $GLOBALS[baglan]);
	$sql = "SELECT MAX(sid) FROM stats";
	$sonuc = mysql_query($sql, $GLOBALS[baglan]);
	$row=mysql_fetch_array($sonuc);      
	$son=$row['MAX(sid)'];                
	return $son;
	
}

/* VT BAĞLANTISINI kapatmak için */

function vt_baglanti_kapat()
{
mysql_close($GLOBALS[baglan]);
}

?>
