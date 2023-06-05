<?php 
 $cocuk_form = "hidden";
			
		
		/* Posttan gelen bilgiler */
		if($_POST["ad"]!="" AND $_POST["uid"]!="" AND $_POST["degistir"]!=""){
		$uid = $_POST["uid"];
		$ad = $_POST["ad"];
		$soyad = $_POST["soyad"];
		$sehir = $_POST["sehir"];
		$dyil = $_POST["dyil"];
		$cins = $_POST["cins"];
		$email = $_POST["email"];
		$sql = "UPDATE uye SET ad='$ad', soyad='$soyad', sehir='$sehir', dyil=$dyil, cins='$cins' WHERE uid=$uid";
	$sorgu = mysql_query($sql, $GLOBALS[baglan]);
		
		echo ("<font color=\"red\">Kayıt düzenlendi:</font>");
		
		
		
		/* post yoluyla gleen bilgiyle çocuk ouşturma */
	}
	 if($_POST["sil"]!="" AND $_POST["uid"]!="")
					{
					kayit_sil($_POST["uid"]);	
					echo ("<font color=\"red\">Kayıt silindi:</font>");
					}
?>

<h3>Düzenlemek istediğiniz üyenin üzerine tıklayınız.</h3>
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
    $eposta = $_COOKIE["EMail"];
		$sql = "SELECT * FROM uye WHERE email='$eposta'";
	$sorgu = mysql_query($sql, $GLOBALS[baglan]);
	while($row = mysql_fetch_array($sorgu))
  	{
		echo ("<tr class=\"".$row['uid']."\" id=\"".$row['uid']."\" onclick=\"soy(this)\">");
		echo ("<td>".$row['ad']."</a></td>");
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
<br /><br />
<?php 
if($_GET['uye']!="")
{ 	
	$dizi = kayit_bul($_GET['uye']);
echo ("<a href=\"yeni.php?cocuk=ekle&uid=".$_GET['uye']."\">Çocuk Ekle</a>");
echo ("&nbsp;&nbsp;&nbsp;<a href=\"yeni.php?baba=ekle&uid=".$_GET['uye']."\">Baba Ekle</a>");
echo ("&nbsp;&nbsp;&nbsp;<a href=\"yeni.php?anne=ekle&uid=".$_GET['uye']."\">Anne Ekle</a>");
}
?>

               	<form id="yeni" name="yeni" method="post" action="duzenle.php">
           	    	      
         
           	
   	    <h3>Gerekli alanları düzenleyiniz.</h3>
        	<p>
            </p>
            
        	
        	<p>
            <table width="100%">
            <tr>
            <td width="34%" height="50">
              <input type="hidden" name="uid" id="uid" value="<?php echo($dizi[0]); ?>" />
        	    <label>Ad:
        	      <input type="text" name="ad" id="ad" onKeyUp="this.value=buyuk_harfe_cevir(this.value);" value="<?php echo($dizi[1]); ?>" />
       	        </label><br /> </td><td width="33%">
        	    <label>Soyad:
        	      <input type="text" name="soyad" id="soyad" onKeyUp="this.value=buyuk_harfe_cevir(this.value);" value="<?php echo($dizi[2]); ?>"/>
       	        </label></td>
                <td width="33%">&nbsp;</td>
      	    </tr><tr>
        	  <td width="34%" height="50">
        	    <label>Doğum Yeri:
        	      <select name="sehir" size="1" id="sehir" >
<OPTION <?php if($dizi[3]=="01") echo "selected"; ?> VALUE="01">ADANA</OPTION>
<OPTION <?php if($dizi[3]=="02") echo "selected"; ?> VALUE="02">ADIYAMAN</OPTION>
<OPTION <?php if($dizi[3]=="03") echo "selected"; ?> VALUE="03">AFYON</OPTION>
<OPTION <?php if($dizi[3]=="04") echo "selected"; ?> VALUE="04">AĞRI</OPTION>
<OPTION <?php if($dizi[3]=="05") echo "selected"; ?> VALUE="05">AMASYA</OPTION>

<OPTION <?php if($dizi[3]=="06") echo "selected"; ?> VALUE="06">ANKARA</OPTION>
<OPTION <?php if($dizi[3]=="07") echo "selected"; ?> VALUE="07">ANTALYA</OPTION>
<OPTION <?php if($dizi[3]=="08") echo "selected"; ?> VALUE="08">ARTVİN</OPTION>
<OPTION <?php if($dizi[3]=="09") echo "selected"; ?> VALUE="09">AYDIN</OPTION>
<OPTION <?php if($dizi[3]=="10") echo "selected"; ?> VALUE="10">BALIKESİR</OPTION>
<OPTION <?php if($dizi[3]=="11") echo "selected"; ?> VALUE="11">BİLECİK</OPTION>
<OPTION <?php if($dizi[3]=="12") echo "selected"; ?> VALUE="12">BİNGÖL</OPTION>
<OPTION <?php if($dizi[3]=="13") echo "selected"; ?> VALUE="13">BİTLİS</OPTION>
<OPTION <?php if($dizi[3]=="14") echo "selected"; ?> VALUE="14">BOLU</OPTION>

<OPTION <?php if($dizi[3]=="15") echo "selected"; ?> VALUE="15">BURDUR</OPTION>
<OPTION <?php if($dizi[3]=="16") echo "selected"; ?> VALUE="16">BURSA</OPTION>
<OPTION <?php if($dizi[3]=="17") echo "selected"; ?> VALUE="17">ÇANAKKALE</OPTION>
<OPTION <?php if($dizi[3]=="18") echo "selected"; ?> VALUE="18">ÇANKIRI</OPTION>
<OPTION <?php if($dizi[3]=="19") echo "selected"; ?> VALUE="19">ÇORUM</OPTION>
<OPTION <?php if($dizi[3]=="20") echo "selected"; ?> VALUE="20">DENİZLİ</OPTION>
<OPTION <?php if($dizi[3]=="21") echo "selected"; ?> VALUE="21">DİYARBAKIR</OPTION>
<OPTION <?php if($dizi[3]=="22") echo "selected"; ?> VALUE="22">EDİRNE</OPTION>
<OPTION <?php if($dizi[3]=="23") echo "selected"; ?> VALUE="23">ELAZIĞ</OPTION>

<OPTION <?php if($dizi[3]=="24") echo "selected"; ?> VALUE="24">ERZİNCAN</OPTION>
<OPTION <?php if($dizi[3]=="25") echo "selected"; ?>  VALUE="25">ERZURUM</OPTION>
<OPTION <?php if($dizi[3]=="26") echo "selected"; ?> VALUE="26">ESKİŞEHİR</OPTION>
<OPTION <?php if($dizi[3]=="27") echo "selected"; ?> VALUE="27">GAZİANTEP</OPTION>
<OPTION <?php if($dizi[3]=="28") echo "selected"; ?> VALUE="28">GİRESUN</OPTION>
<OPTION <?php if($dizi[3]=="29") echo "selected"; ?>  VALUE="29">GÜMÜŞHANE</OPTION>
<OPTION <?php if($dizi[3]=="30") echo "selected"; ?> VALUE="30">HAKKARİ</OPTION>
<OPTION <?php if($dizi[3]=="31") echo "selected"; ?> VALUE="31">HATAY</OPTION>
<OPTION <?php if($dizi[3]=="32") echo "selected"; ?> VALUE="32">ISPARTA</OPTION>

<OPTION <?php if($dizi[3]=="33") echo "selected"; ?> VALUE="33">MERSİN</OPTION>
<OPTION <?php if($dizi[3]=="34") echo "selected"; ?> VALUE="34">İSTANBUL</OPTION>
<OPTION <?php if($dizi[3]=="35") echo "selected"; ?> VALUE="35">İZMİR</OPTION>
<OPTION <?php if($dizi[3]=="36") echo "selected"; ?> VALUE="36">KARS</OPTION>
<OPTION <?php if($dizi[3]=="37") echo "selected"; ?> VALUE="37">KASTAMONU</OPTION>
<OPTION <?php if($dizi[3]=="38") echo "selected"; ?> VALUE="38">KAYSERİ</OPTION>
<OPTION <?php if($dizi[3]=="39") echo "selected"; ?> VALUE="39">KIRKLARELİ</OPTION>
<OPTION <?php if($dizi[3]=="40") echo "selected"; ?> VALUE="40">KIRŞEHİR</OPTION>
<OPTION <?php if($dizi[3]=="41") echo "selected"; ?> VALUE="41">KOCAELİ</OPTION>

<OPTION <?php if($dizi[3]=="42") echo "selected"; ?> VALUE="42">KONYA</OPTION>
<OPTION <?php if($dizi[3]=="43") echo "selected"; ?>  VALUE="43">KÜTAHYA</OPTION>
<OPTION <?php if($dizi[3]=="44") echo "selected"; ?> VALUE="44">MALATYA</OPTION>
<OPTION <?php if($dizi[3]=="45") echo "selected"; ?> VALUE="45">MANİSA</OPTION>
<OPTION <?php if($dizi[3]=="46") echo "selected"; ?>  VALUE="46">KAHRAMANMARAŞ</OPTION>
<OPTION <?php if($dizi[3]=="47") echo "selected"; ?> VALUE="47">MARDİN</OPTION>
<OPTION <?php if($dizi[3]=="48") echo "selected"; ?> VALUE="48">MUĞLA</OPTION>
<OPTION <?php if($dizi[3]=="49") echo "selected"; ?> VALUE="49">MUŞ</OPTION>
<OPTION <?php if($dizi[3]=="50") echo "selected"; ?> VALUE="50">NEVŞEHİR</OPTION>

<OPTION <?php if($dizi[3]=="51") echo "selected"; ?> VALUE="51">NİĞDE</OPTION>
<OPTION <?php if($dizi[3]=="52") echo "selected"; ?>  VALUE="52">ORDU</OPTION>
<OPTION <?php if($dizi[3]=="53") echo "selected"; ?> VALUE="53">RİZE</OPTION>
<OPTION <?php if($dizi[3]=="54") echo "selected"; ?> VALUE="54">SAKARYA</OPTION>
<OPTION <?php if($dizi[3]=="55") echo "selected"; ?> VALUE="55">SAMSUN</OPTION>
<OPTION <?php if($dizi[3]=="56") echo "selected"; ?> VALUE="56">SİİRT</OPTION>
<OPTION <?php if($dizi[3]=="57") echo "selected"; ?> VALUE="57">SİNOP</OPTION>
<OPTION <?php if($dizi[3]=="58") echo "selected"; ?> VALUE="58">SİVAS</OPTION>
<OPTION <?php if($dizi[3]=="59") echo "selected"; ?> VALUE="59">TEKİRDAĞ</OPTION>

<OPTION <?php if($dizi[3]=="60") echo "selected"; ?> VALUE="60">TOKAT</OPTION>
<OPTION <?php if($dizi[3]=="61") echo "selected"; ?> VALUE="61">TRABZON</OPTION>
<OPTION <?php if($dizi[3]=="62") echo "selected"; ?> VALUE="62">TUNCELİ</OPTION>
<OPTION <?php if($dizi[3]=="63") echo "selected"; ?> VALUE="63">ŞANLIURFA</OPTION>
<OPTION <?php if($dizi[3]=="64") echo "selected"; ?> VALUE="64">UŞAK</OPTION>
<OPTION <?php if($dizi[3]=="65") echo "selected"; ?> VALUE="65">VAN</OPTION>
<OPTION <?php if($dizi[3]=="66") echo "selected"; ?> VALUE="66">YOZGAT</OPTION>
<OPTION <?php if($dizi[3]=="67") echo "selected"; ?> VALUE="67">ZONGULDAK</OPTION>
<OPTION <?php if($dizi[3]=="68") echo "selected"; ?> VALUE="68">AKSARAY</OPTION>

<OPTION <?php if($dizi[3]=="69") echo "selected"; ?> VALUE="69">BAYBURT</OPTION>
<OPTION <?php if($dizi[3]=="70") echo "selected"; ?> VALUE="70">KARAMAN</OPTION>
<OPTION <?php if($dizi[3]=="71") echo "selected"; ?> VALUE="71">KIRIKKALE</OPTION>
<OPTION <?php if($dizi[3]=="72") echo "selected"; ?> VALUE="72">BATMAN</OPTION>
<OPTION <?php if($dizi[3]=="73") echo "selected"; ?> VALUE="73">ŞIRNAK</OPTION>
<OPTION <?php if($dizi[3]=="74") echo "selected"; ?> VALUE="74">BARTIN</OPTION>
<OPTION <?php if($dizi[3]=="75") echo "selected"; ?> VALUE="75">ARDAHAN</OPTION>
<OPTION <?php if($dizi[3]=="76") echo "selected"; ?> VALUE="76">IĞDIR</OPTION>
<OPTION <?php if($dizi[3]=="77") echo "selected"; ?> VALUE="77">YALOVA</OPTION>

<OPTION <?php if($dizi[3]=="78") echo "selected"; ?> VALUE="78">KARABÜK</OPTION>
<OPTION <?php if($dizi[3]=="79") echo "selected"; ?> VALUE="79">KİLİS</OPTION>
<OPTION <?php if($dizi[3]=="80") echo "selected"; ?> VALUE="80">OSMANİYE</OPTION>
<OPTION <?php if($dizi[3]=="81") echo "selected"; ?> VALUE="81">DÜZCE</OPTION>
<OPTION <?php if($dizi[3]=="98") echo "selected"; ?> VALUE="98">KIBRIS</OPTION>
<OPTION <?php if($dizi[3]=="99") echo "selected"; ?> VALUE="99">YABANCI</OPTION>



      	          </select>
        	    </label><br /></td><td width="33%">
        	    <label>Doğum Yılı
        	      <input name="dyil" type="text" id="dyil" size="4" maxlength="4" onKeyUp="if(isNaN(this.value)) this.value='';" value="<?php echo($dizi[4]); ?>"/>
        	    </label></td><td width="33%">
        	    <label>Cinsiyet:
        	      <input name="cins" type="radio" id="c_e" value="c_e" <?php if($dizi[5]=="c_e") echo ("checked=\"checked\""); ?> />
        	      Erkek</label>
        	    
        	    <label>
        	      <input name="cins" type="radio" id="c_k" value="c_k" <?php if($dizi[5]=="c_k") echo ("checked=\"checked\""); ?>/>
        	      Kadın</label></td>
       	     </tr><tr><td width="34%" height="50">
        	    <label>Eposta Adresiniz
        	      <input type="text" name="email" id="email"  value="<?php echo($eposta); ?>"/>
      	      </label><br /></td>
       	     <td colspan="2">Daha sonra kayıtları değiştirmek veya güncellemek için eposta adresinizi doğru bir şekilde girmelisiniz.</td>
              </tr><tr><td height="50">&nbsp;</td><td colspan="2">
        	  <label>
        	  <input type="submit" name="degistir" id="degistir" value="Kaydet" />
        	Formu tamamladıktan sonra kaydedin.</label><br /><br />
            <label><input type="submit" name="sil" id="sil" value="Kaydı Sil"  />Bu kaydı silmek için butona tıklayın</label>
            </td></tr>
            </table>
      	    </p>
          </form>
        	
<p></p>
        
		
 