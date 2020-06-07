<?php 

date_default_timezone_set('Europe/Istanbul');
ob_start();
session_start();
include 'baglan.php' ;

if (isset($_POST['genel_ayar_guncelle'])) {

	$ayar_kaydet=$db->prepare("UPDATE tablo_ayar SET ayar_author=:author,ayar_site_url=:url,ayar_title=:title,ayar_description=:description,ayar_keywords=:keywords WHERE ayar_id=0 ");
	$update=$ayar_kaydet->execute(array('author'=>$_POST['author'],'url'=>$_POST['url'],'title'=>$_POST['title'],'description'=>$_POST['description'],'keywords'=>$_POST['keywords']));

	if($update)
		header('location:../Admin/production/genel_ayarlar.php?durum=ok');
	else
		header('location:../Admin/production/genel_ayarlar.php?durum=no');
}


if (isset($_POST['iletisim_ayar_guncelle'])) {

	$ayar_kaydet=$db->prepare("UPDATE tablo_ayar SET ayar_tel=:tel,ayar_gsm=:gsm,ayar_mail=:mail,ayar_linkedin=:linkedin,ayar_github=:github,ayar_il=:il,ayar_ilce=:ilce WHERE ayar_id=0 ");
	$update=$ayar_kaydet->execute(array('tel'=>$_POST['tel'],'gsm'=>$_POST['gsm'],'mail'=>$_POST['mail'],'linkedin'=>$_POST['linkedin'],'github'=>$_POST['github'],'il'=>$_POST['il'],'ilce'=>$_POST['ilce']));

	if($update)
		header('location:../Admin/production/iletisim_ayarlar.php?durum=ok');
	else
		header('location:../Admin/production/iletisim_ayarlar.php?durum=no');
}


if (isset($_POST['api_ayar_guncelle'])) {

	$ayar_kaydet=$db->prepare("UPDATE tablo_ayar SET ayar_recapctha=:recapctha,ayar_googlemaps=:googlemaps,ayar_analystic=:analystic   WHERE ayar_id=0 ");
	$update=$ayar_kaydet->execute(array('recapctha'=>$_POST['recapctha'],'googlemaps'=>$_POST['googlemaps'],'analystic'=>$_POST['analystic'] ));

	if($update)
		header('location:../Admin/production/api_ayarlar.php?durum=ok');
	else
		header('location:../Admin/production/api_ayarlar.php?durum=no');
}


if (isset($_POST['smtp_ayar_guncelle'])) {

	$ayar_kaydet=$db->prepare("UPDATE tablo_ayar SET ayar_smtphost=:smtphost,ayar_smtpuser=:smtpuser,ayar_smtppassword=:smtppassword,ayar_smtpport=:smtpport   WHERE ayar_id=0 ");
	$update=$ayar_kaydet->execute(array('smtphost'=>$_POST['smtphost'],'smtpuser'=>$_POST['smtpuser'],'smtppassword'=>$_POST['smtppassword'],'smtpport'=>$_POST['smtpport'] ));

	if($update)
		header('location:../Admin/production/smtp_mail_ayarlar.php?durum=ok');
	else
		header('location:../Admin/production/smtp_mail_ayarlar.php?durum=no');
}


if (isset($_POST['hakkimda_guncelle'])) {

	$ayar_kaydet=$db->prepare("UPDATE tablo_hakkimizda SET hakkimda_baslik=:baslik, hakkimda_icerik=:icerik,hakkimda_resim=:resim   WHERE hakkimda_id=0 ");
	$update=$ayar_kaydet->execute(array('baslik'=>$_POST['baslik'], 'icerik' => $_POST['hakkimda'] , 'resim'=>$_POST['resim'] ));

	if($update)
		header("location:../Admin/production/hakkimda.php?durum=ok");
	else
		header("location:../Admin/production/hakkimda.php?durum=no");
}



if(isset($_POST['slider_ekle'])){

	$uploads_dir="../Admin/production/images/slider";
	@$tmp_name=$_FILES['slider_resim']["tmp_name"];
	@$name=$_FILES['slider_resim']["name"];
	$sayi1=rand(2000,3200);
	$sayi2=rand(2000,3200);
	$sayi3=rand(2000,3200);
	$sayi4=rand(2000,3200);
	$benzersizad=$sayi1."-".$sayi2."-".$sayi3."-".$sayi4;
	$imgyol=substr($uploads_dir,20)."/".$benzersizad.$name;
	@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");
	$slider_ekle=$db->prepare("INSERT INTO tablo_slider SET slider_baslik=:baslik,slider_resimyol=:resimyol,slider_sira=:sira");	
	$insert=$slider_ekle->execute(array('baslik'=>$_POST['slider_baslik'],'resimyol'=>$imgyol,'sira'=>$_POST['slider_sira']));

	if($insert)
		header("location:../Admin/production/slider_ekle.php?durum=ok");
	else
		header("location:../Admin/production/slider_ekle.php?durum=no");	
}

if(isset($_GET['slider_sil']) == 'ok'){

	$slider_sil=$db->prepare("DELETE FROM tablo_slider WHERE slider_id=:slider_id");	
	$delete=$slider_sil->execute(array('slider_id'=>$_GET['slider_id'] ));

	if($delete){
		$resim=$_GET['slider_resim_sil'];
		unlink("../Admin/production/$resim");
		header("location:../Admin/production/slider.php?durum=ok");
	}
	else
		header("location:../Admin/production/slider.php?durum=no");
}

if (isset($_POST['slider_duzenle'])) {

	if($_FILES['slider_resim']['size']>0){

	$uploads_dir="../Admin/production/images/slider";
	@$tmp_name=$_FILES['slider_resim']["tmp_name"];
	@$name=$_FILES['slider_resim']["name"];
	$sayi1=rand(2000,3200);
	$sayi2=rand(2000,3200);
	$sayi3=rand(2000,3200);
	$sayi4=rand(2000,3200);
	$benzersizad=$sayi1."-".$sayi2."-".$sayi3."-".$sayi4;
	$imgyol=substr($uploads_dir,20)."/".$benzersizad.$name;
	@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");
	$Slider_id=$_POST['slider_id'];
	$slider_kaydet=$db->prepare("UPDATE tablo_slider SET slider_baslik=:baslik, slider_resimyol=:resimyol,slider_sira=:sira  WHERE slider_id={$_POST['slider_id']} ");	
	$update=$slider_kaydet->execute(array('baslik'=>$_POST['slider_baslik'],'resimyol'=>$imgyol, 'sira' => $_POST['slider_sira'] ));

	if($update){
		$resim=$_POST['slider_resim'];
		unlink("../Admin/production/$resim");
		header("location:../Admin/production/slider_duzenle.php?slider_id=$Slider_id&durum=ok");}
	else
		header("location:../Admin/production/slider_duzenle.php?durum=no");

	}
	else{
	$Slider_id=$_POST['slider_id'];
	$slider_kaydet=$db->prepare("UPDATE tablo_slider SET slider_baslik=:baslik, slider_sira=:sira  WHERE slider_id={$_POST['slider_id']} ");	
	$update=$slider_kaydet->execute(array('baslik'=>$_POST['slider_baslik'], 'sira' => $_POST['slider_sira'] ));

	if($update)
		header("location:../Admin/production/slider_duzenle.php?slider_id=$Slider_id&durum=ok");
	else
		header("location:../Admin/production/slider_duzenle.php?durum=no");
	}  
}
if(isset($_POST['icerik_ekle'])){
	$Zaman=date('Y-m-d H:i');
	$uploads_dir="../Admin/production/images/icerik";
	@$tmp_name=$_FILES['icerik_resim']["tmp_name"];
	@$name=$_FILES['icerik_resim']["name"];
	$sayi1=rand(2000,3200);
	$sayi2=rand(2000,3200);
	$sayi3=rand(2000,3200);
	$sayi4=rand(2000,3200);
	$benzersizad=$sayi1."-".$sayi2."-".$sayi3."-".$sayi4."-";
	$imgyol=substr($uploads_dir,20)."/".$benzersizad.$name;
	@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");
	$icerik_ekle=$db->prepare("INSERT INTO tablo_icerik SET  kategori_id=:id,icerik_zaman=:zaman,icerik_baslik=:baslik,icerik_resim=:resim,icerik_anahtar_kelime=:anahtar_kelime,icerik_detay=:detay");	
	$insert=$icerik_ekle->execute(array('id'=>$_POST['secenek'],'zaman'=>$Zaman,'baslik'=>$_POST['icerik_baslik'],'anahtar_kelime'=>$_POST['icerik_anahtar_kelime'],'resim'=>$imgyol,'detay'=>$_POST['icerik']));

	if($insert)
		header("location:../Admin/production/icerik_ekle.php?durum=ok");
	else
		header("location:../Admin/production/icerik_ekle.php?durum=no");	
}
if(isset($_GET['icerik_sil']) == 'ok'){

	$icerik_sil=$db->prepare("DELETE FROM tablo_icerik WHERE icerik_id=:icerik_id");	
	$delete=$icerik_sil->execute(array('icerik_id'=>$_GET['icerik_id'] ));

	if($delete){
		$resim=$_GET['icerik_resim_sil'];
		unlink("../Admin/production/$resim");
		header("location:../Admin/production/icerik.php?durum=ok");
	}
	else
		header("location:../Admin/production/icerik.php?durum=no");
}
if (isset($_POST['icerik_duzenle'])) {

	if($_FILES['icerik_resim']['size']>0){
	$uploads_dir="../Admin/production/images/icerik";
	@$tmp_name=$_FILES['icerik_resim']["tmp_name"];
	@$name=$_FILES['icerik_resim']["name"];
	$sayi1=rand(2000,3200);
	$sayi2=rand(2000,3200);
	$sayi3=rand(2000,3200);
	$sayi4=rand(2000,3200);
	$benzersizad=$sayi1."-".$sayi2."-".$sayi3."-".$sayi4;
	$imgyol=substr($uploads_dir,20)."/".$benzersizad.$name;
	@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");
	$icerik_id=$_POST['icerik_id'];
	$icerik_kaydet=$db->prepare("UPDATE tablo_icerik SET kategori_id=:id, icerik_baslik=:baslik, icerik_resim=:resim,icerik_anahtar_kelime=:anahtar_kelime ,icerik_detay=:detay  WHERE icerik_id={$_POST['icerik_id']} ");	
	$update=$icerik_kaydet->execute(array('id'=>$_POST['secenek'],'baslik'=>$_POST['icerik_baslik'],'resim'=>$imgyol,'anahtar_kelime' => $_POST['icerik_anahtar_kelime'], 'detay' => $_POST['icerik'] ));

	if($update){
		$resim=$_POST['icerik_resim'];
		unlink("../Admin/production/$resim");
		header("location:../Admin/production/icerik_duzenle.php?icerik_id=$icerik_id&durum=ok");}
	else
		header("location:../Admin/production/icerik_duzenle.php?durum=no");

	}
	else{

	$icerik_id=$_POST['icerik_id'];
	$icerik_kaydet=$db->prepare("UPDATE tablo_icerik SET kategori_id=:id,icerik_baslik=:baslik,icerik_anahtar_kelime=:anahtar_kelime ,icerik_detay=:detay  WHERE icerik_id={$_POST['icerik_id']} ");	
	$update=$icerik_kaydet->execute(array('id'=>$_POST['secenek'],'baslik'=>$_POST['icerik_baslik'],'anahtar_kelime' => $_POST['icerik_anahtar_kelime'], 'detay' => $_POST['icerik'] ));

	if($update){
		
		header("location:../Admin/production/icerik_duzenle.php?icerik_id=$icerik_id&durum=ok");}
	else
		header("location:../Admin/production/icerik_duzenle.php?durum=no");
	}  
}


if(isset($_POST['menu_ekle'])){

	$menu_ekle=$db->prepare("INSERT INTO tablo_menu SET menu_ad=:ad,menu_url=:url,menu_sira=:sira");	
	$insert=$menu_ekle->execute(array('ad'=>$_POST['menu_ad'],'url'=>$_POST['url'],'sira'=>$_POST['menu_sira']));
	if($insert)
		header("location:../Admin/production/menu_ekle.php?durum=ok");
	else
		header("location:../Admin/production/menu_ekle.php?durum=no");	
}

if(isset($_GET['menu_sil']) == 'ok'){

	$menu_sil=$db->prepare("DELETE FROM tablo_menu where menu_id=:id");
	$delete=$menu_sil->execute(array('id'=>$_GET['menu_id']));
	if($delete)
		header("location:../Admin/production/menu.php?durum=ok");
	else
		header("location:../Admin/production/menu.php?durum=no");
}

if (isset($_POST['menu_duzenle'])) {
	
	$menu_id=$_POST['menu_id'];
	$menu_kaydet=$db->prepare("UPDATE tablo_menu SET menu_ad=:ad,menu_url=:url,menu_sira=:sira  WHERE menu_id={$_POST['menu_id']} ");	
	$update=$menu_kaydet->execute(array('ad'=>$_POST['menu_ad'],'url'=>$_POST['url'],'sira'=>$_POST['menu_sira']));
	if($update)
		header("location:../Admin/production/menu_duzenle.php?menu_id=$menu_id&durum=ok");
	else
		header("location:../Admin/production/menu_duzenle.php?durum=no");
}    


if(isset($_POST['kategori_ekle'])){

	$kategori_ekle=$db->prepare("INSERT INTO tablo_kategori SET menu_id=:id,kategori_ad=:ad,kategori_sira=:sira");	
	$insert=$kategori_ekle->execute(array('id'=>$_POST['secenek'],'ad'=>$_POST['kategori_ad'],'sira'=>$_POST['kategori_sira']));
	if($insert)
		header("location:../Admin/production/kategori_ekle.php?durum=ok");
	else
		header("location:../Admin/production/kategori_ekle.php?durum=no");	
}

if(isset($_GET['kategori_sil']) == 'ok'){

	$kategori_sil=$db->prepare("DELETE FROM tablo_kategori where kategori_id=:id");
	$delete=$kategori_sil->execute(array('id'=>$_GET['kategori_id']));
	if($delete)
		header("location:../Admin/production/kategori.php?durum=ok");
	else
		header("location:../Admin/production/kategori.php?durum=no");
}
if (isset($_POST['kategori_duzenle'])) {
	$kategori_id=$_POST['kategori_id'];
	$kategori_kaydet=$db->prepare("UPDATE tablo_kategori SET menu_id=:id,kategori_ad=:ad,kategori_sira=:sira  WHERE kategori_id={$_POST['kategori_id']} ");	
	$update=$kategori_kaydet->execute(array('id'=>$_POST['secenek'],'ad'=>$_POST['kategori_ad'],'sira'=>$_POST['kategori_sira']));
	if($update)
		header("location:../Admin/production/kategori_duzenle.php?kategori_id=$kategori_id&durum=ok");
	else
		header("location:../Admin/production/kategori_duzenle.php?durum=no");
}    

if(isset($_POST['giris']))
{
    $kullanici_ad=$_POST['kullanici_ad'];
	$kullanici_sifre=md5($_POST['sifre']);
    
	if($kullanici_ad && $kullanici_sifre){
		$login=$db->prepare("Select*from tablo_kullanici where kullanici_ad=:ad and kullanici_sifre=:sifre");
		$login->execute(array('ad'=>$kullanici_ad,'sifre'=> $kullanici_sifre));
		 $say=$login->rowCount();
		 if ($say>0) {
		 	
		 	$_SESSION['kullanici_ad']=$kullanici_ad;
		 	header("location:../Admin/production/index.php");
		 	# code...
		 }
		 else
		 	header("location:../Admin/production/login.php?durum=no");
		


	}

	
}




?>
