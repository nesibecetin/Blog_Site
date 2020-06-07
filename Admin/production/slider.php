<?php include 'header.php';

if(isset($_POST['arama']))
{
  $aranan=$_POST['aranan'];
  $slider_sor=$db->prepare("select*from tablo_slider where slider_baslik LIKE '%$aranan%'");                     
  $slider_sor->execute();

}
else
{
   $slider_sor=$db->prepare("select*from tablo_slider ");                     
  $slider_sor->execute();

}


?>
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Slider</h3>
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
                    <h2>Ekli Olan Sliderlar</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">  
                    <div align="right"><a href="slider_ekle.php" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> &nbsp; Yeni Ekle </a> </div>         
                     <table class="table table-striped jambo_table bulk_action">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Slider Resim</th>
                          <th>Slider Başlık</th>
                          <th>Slider Sıra</th>
                          <th style="width: 10%;"></th>
                          <th style="width: 10%;"></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                       
                          while($slider_cek=$slider_sor->fetch(PDO::FETCH_ASSOC)){ ?> 
                        <tr>
                          <td><?php echo $slider_cek['slider_id'] ?> </td>
                          <td><img width="200px;" height="150px;"src="<?php echo $slider_cek['slider_resimyol'] ?> "></td>
                          <td><?php echo $slider_cek['slider_baslik'] ?> </td>
                          <td><?php echo $slider_cek['slider_sira'] ?> </td>
                          <td><a href="slider_duzenle.php?slider_id=<?php echo $slider_cek['slider_id'];?>" class="btn btn-info btn-sm"><i class="fa fa-pencil"></i> &nbsp; Düzenle </a></td>
                          <td><a href="../../connection/islem.php?slider_id=<?php echo $slider_cek['slider_id'];?>&slider_sil=ok&slider_resim_sil=<?php echo $slider_cek['slider_resimyol'];?>" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i>&nbsp; Sil </a></td>
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