<?php include 'header.php';
$icerik_sor=$db->prepare("select*from tablo_icerik INNER JOIN tablo_kategori ON tablo_icerik.kategori_id=tablo_kategori.kategori_id WHERE icerik_id=:icerik_id");  
$icerik_sor->execute(array('icerik_id'=>$_GET['icerik_id'] ));
$icerik_cek=$icerik_sor->fetch(PDO::FETCH_ASSOC);
$icerik_hit=$icerik_cek['icerik_hit'];
$icerik_hit++;
$icerik_hit=$db->prepare("update tablo_icerik set icerik_hit ='".$icerik_hit."'  where icerik_id=:icerik_id");
$icerik_hit->execute(array('icerik_id'=>$_GET['icerik_id'] ));
?>
<div class="content_bottom">
  <div class="row">
    <div class="col-lg-8 col-md-8">
      <div class="content_bottom_left">
        <div class="single_page_area">
          <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li><a href="#"><?php echo $icerik_cek['kategori_ad']; ?></a></li>
            <li class="active"><?php echo $icerik_cek['icerik_baslik']; ?></li>
          </ol>
          <h2 class="post_titile"><?php echo $icerik_cek["icerik_baslik"]; ?> </h2>
          <div class="single_page_content">
            <div class="post_commentbox"> <a href="#"><i class="fa fa-user"></i>Nesibe Çetin</a> <span><i class="fa fa-calendar"></i>6:49 AM</span> <a href="#"><i class="fa fa-tags"></i><?php echo $icerik_cek['kategori_ad']; ?></a> </div>
            <img style="width: 400px; height: 300px;" class="img-center" src="Admin/production/<?php echo $icerik_cek['icerik_resim']; ?>" alt="">
            <div class="detay"><p><?php echo $icerik_cek['icerik_detay']; ?></p></div>              
          </div>
          <div class="keyword"><h4>Etiketler:</h4>
            <?php $etiketler=explode(',', $icerik_cek['icerik_anahtar_kelime']) ;
            foreach ($etiketler as $etiket_cek) {?>

              <a  class="key">
                <?php
                echo $etiket_cek;?>
              </a>
            <?php } ?>
          </div>
          <div class="post_pagination">
            <div class="prev"> <a class="angle_left" href="#"><i class="fa fa-angle-double-left"></i></a>
              <div class="pagincontent"> <span>Önceki Post</span> <a href="#">Aliquam quam orci in molestie a tempor nec</a> </div>
            </div>
            <div class="next">
              <div class="pagincontent"> <span>Sıradaki Post</span> <a href="#">Aliquam quam orci in molestie a tempor nec</a> </div>
              <a class="angle_right" href="#"><i class="fa fa-angle-double-right"></i></a> </div>
            </div>
            <div class="share_post"><a class="linkedin" href="#"><i class="fa fa-linkedin"></i>LinkedIn</a><a class="Github" href="#"><i class="fa fa-github"></i>GitHub</a></div>
            <div class="similar_post">
              <h2>Sevebileceğin Benzer Postlar<i class="fa fa-thumbs-o-up"></i></h2>
              <ul class="small_catg similar_nav wow fadeInDown animated">
                <li>
                  <div class="media wow fadeInDown animated" style="visibility: visible; animation-name: fadeInDown;"> <a class="media-left related-img" href="#"><img src="../images/112x112.jpg" alt=""></a>
                    <div class="media-body">
                      <h4 class="media-heading"><a href="#">Duis condimentum nunc pretium lobortis </a></h4>
                      <p>Nunc tincidunt, elit non cursus euismod, lacus augue ornare metus, egestas imperdiet nulla nisl quis mauris. Suspendisse a pharetra </p>
                    </div>
                  </div>
                </li>
              </ul>
            </div>
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
