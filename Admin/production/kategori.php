<?php include 'header.php';
if(isset($_POST['arama']))
{
  $aranan=$_POST['aranan'];
  $kategori_sor=$db->prepare("select*from  where kategori_ad LIKE '%$aranan%'");                     
  $kategori_sor->execute();

}
else
{
   $kategori_sor=$db->prepare("select*from tablo_kategori INNER JOIN tablo_menu ON tablo_kategori.menu_id=tablo_menu.menu_id order by kategori_sira ASC");  
   $kategori_sor->execute();

}
?>
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Kategori </h3>
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
                    <h2>Ekli Olan Kategoriler</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">  
                    <div align="right"><a href="kategori_ekle.php" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> &nbsp; Yeni Ekle </a> </div>         
                     <table class="table table-striped jambo_table bulk_action">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Kategori Adı</th>    
                          <th>Üst Menü</th>
                          <th>Kategori Sıra</th>
                          <th style="width: 10%;"></th>
                          <th style="width: 10%;"></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                       
                          while($kategori_cek=$kategori_sor->fetch(PDO::FETCH_ASSOC)){ ?> 
                        <tr>
                          <td><?php echo $kategori_cek['kategori_id'] ?> </td>
                          <td><?php echo $kategori_cek['kategori_ad'] ?> </td>        
                          <td><?php echo $kategori_cek['menu_ad'] ?> </td>
                          <td><?php echo $kategori_cek['kategori_sira'] ?> </td>
                          <td><a href="kategori_duzenle.php?kategori_id=<?php echo $kategori_cek['kategori_id'];?>" class="btn btn-info btn-sm"><i class="fa fa-pencil"></i> &nbsp; Düzenle </a></td>
                          <td><a href="../../connection/islem.php?kategori_id=<?php echo $kategori_cek['kategori_id'];?>&kategori_sil=ok" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i>&nbsp; Sil </a></td>
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