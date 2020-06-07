<?php include 'header.php';
$sayfada=10;
$sorgu=$db->prepare("select * from tablo_icerik where kategori_id=:id ");
$sorgu->execute(array('id' => $_GET['kategori_id'] )); 
$toplam_icerik=$sorgu->rowCount();
$toplam_sayfa=ceil($toplam_icerik / $sayfada);
$sayfa =isset($_GET['sayfa']) ? (int) $_GET['sayfa'] : 1;
if($sayfa<1) $sayfa=1;
if($sayfa>$toplam_sayfa)$sayfa=$toplam_sayfa;
$limit=($sayfa -1)*$sayfada;
$icerik_sor=$db->prepare("select * from tablo_icerik where kategori_id=:id order by icerik_zaman DESC limit $limit,$sayfada");
$icerik_sor->execute(array('id' => $_GET['kategori_id'] ));  

?>
<div class="content_bottom">
  <div class="row">
    <div class="col-lg-8 col-md-8 ">
     <div class="content_bottom_left">
      <div class="single_category wow fadeInDown">
        <div class="archive_style_1">
          <div style="margin-top:15px;">
            <ol class="breadcrumb">
              <li><a href="#">Home</a></li>
              <li><a href="#">Technology</a></li>
              <li class="active">Duis quis erat non nunc fringilla </li>
            </ol>
          </div>
          
          <?php          
          while($icerik_cek=$icerik_sor->fetch(PDO::FETCH_ASSOC)){ ?> 

            <div class="col-lg-6 col-md-6 col-sm-6">
              <div class="business_category_left wow fadeInDown">
                <ul style="margin-bottom:50px;"class="fashion_catgnav">
                  <li>
                    <div class="catgimg2_container"> <a href="haber_sayfasi.php?icerik_id=<?php echo $icerik_cek['icerik_id'];?>"><img alt="" src="Admin/production/<?php echo $icerik_cek['icerik_resim'];?> "></a> </div>
                    <div class="baslik"><h4 class="catg_titile"><a href="haber_sayfasi.php?icerik_id=<?php echo $icerik_cek['icerik_id'];?>"><?php echo $icerik_cek['icerik_baslik'];?></a></h4></div>
                    <div class="comments_box"> <span class="meta_date">14/12/2045</span> <span class="meta_comment">No Comments</span> <span class="meta_more"><a href="haber-detay/<?=$icerik_cek['kategori_id'].'/'.seo($icerik_cek['icerik_baslik']).'/'.$icerik_cek['icerik_id']?>">Read More...</a></span> </div>
                    <div class="detay"><p><?php echo substr($icerik_cek['icerik_detay'],0,200)?>...</p></div>
                  </li>
                </ul>
              </div>
            </div>

          <?php } ?>

        </div>
      </div>
      <div class="pagination_area">
        <center>
          <nav>
            <ul class="pagination">
              <li><a href="#"><span aria-hidden="true">&laquo;</span><span class="sr-only">Previous</span></a></li>
              <?php   $s=0;
              while($s<$toplam_sayfa){
                $s++;?>
                <li> <a href="haberler.php?sayfa=<?php echo $s;?>"><?php echo $s; ?></a></li>
              <?php } ?>
              <li><a href="#"><span aria-hidden="true">&raquo;</span><span class="sr-only">Next</span></a></li>
            </ul>
          </nav>
        </center>
      </div>    
    </div>
    
  </div>  
  
  <?php include 'sidebar.php'?>
</div>
</div> 

</section>
</div>

<script src="assets/js/jquery.min.js"></script> 
<script src="assets/js/bootstrap.min.js"></script> 
<script src="assets/js/wow.min.js"></script> 
<script src="assets/js/slick.min.js"></script> 
<script src="assets/js/custom.js"></script>
</div>
</div>
<?php include 'footer.php' ?> 
</body>

</html>