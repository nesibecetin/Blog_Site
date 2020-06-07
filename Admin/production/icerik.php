<?php include 'header.php';
if(isset($_POST['arama']))
{
  $aranan=$_POST['aranan'];
  $icerik_sor=$db->prepare("select*from tablo_icerik where icerik_baslik LIKE '%$aranan%'");                     
  $icerik_sor->execute();

}
else
{
   $icerik_sor=$db->prepare("select*from tablo_icerik INNER JOIN tablo_kategori ON tablo_icerik.kategori_id=tablo_kategori.kategori_id");
  $icerik_sor->execute();

}
?>
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>İçerik Yönetimi</h3>
              </div>
              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  
                  <form action="" method="POST">
                  <div class="input-group">
                    <input type="text" class="form-control" name="aranan" placeholder="Anahtar Kelime Giriniz...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" name="arama" type="submit">Go!</button>
                    </span>
                  </div>
                  </form>

                </div>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Ekli Olan İçerikler</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">  
                    <div align="right"><a href="icerik_ekle.php" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> &nbsp; Yeni Ekle </a> </div>         
                     <table class="table table-striped jambo_table bulk_action">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>İçerik Resim</th>
                          <th>İçerik Zaman</th>
                          <th>İçerik Başlık</th>
                          <th>İçerik Anahtar Kelime</th>
                          <th>Kategori Adı</th>
                          <th style="width: 10%;"></th>
                          <th style="width: 10%;"></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                       
                          while($icerik_cek=$icerik_sor->fetch(PDO::FETCH_ASSOC)){ ?> 
                        <tr>
                          <td><?php echo $icerik_cek['icerik_id'] ?> </td>
                          <td><img width="200px;" height="150px;"src="<?php echo $icerik_cek['icerik_resim'] ?> "></td>
                          <td><?php echo $icerik_cek['icerik_zaman'] ?> </td>
                          <td><?php echo $icerik_cek['icerik_baslik'] ?> </td>
                          <td><?php echo $icerik_cek['icerik_anahtar_kelime'] ?> </td>
                          <td><?php echo $icerik_cek['kategori_ad'] ?> </td>
                          <td><a href="icerik_duzenle.php?icerik_id=<?php echo $icerik_cek['icerik_id'];?>" class="btn btn-info btn-sm"><i class="fa fa-pencil"></i> &nbsp; Düzenle </a></td>
                          <td><a href="../../connection/islem.php?icerik_id=<?php echo $icerik_cek['icerik_id'];?>&icerik_sil=ok&icerik_resim_sil=<?php echo $icerik_cek['icerik_resim'] ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i>&nbsp; Sil </a></td>
                        </tr>

                          <?php } ?>
                      
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
<?php include 'footer.php';?>       