<?php include 'header.php' ?>

  <!-- <div class="content_top">
    <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-8">
        <div class="content_middle_leftbar">
            <div  class="slick_slider2">
             <?php 
              $slider_sor=$db->prepare("select*from tablo_slider ");                        
              $slider_sor->execute();
              while($slider_cek=$slider_sor->fetch(PDO::FETCH_ASSOC)){ ?>
              <div class="single_featured_slide"> <a href="haber_sayfasi.php"> <img style="width:100%; height:100%" src="Admin/production/<?php echo $slider_cek['slider_resimyol'] ?>" alt=""></a>              
               <div class="title_caption"><a href="haber_sayfasi.php"><?php echo $slider_cek['slider_baslik'] ?></a></div>
                </div>     

             <?php } ?>                 
          
        </div>
    </div>
    </div>
         <div class="col-lg-4 col-md-4 col-sm-4">
        <div class="content_middle_rightbar">
       
            <ul class="featured_nav wow fadeInDown">           
            
              <li><img src="images/300x215x1.jpg" alt="">
                <div class="title_caption"><a href="pages/single.html">Sed luctus semper odio aliquam rhoncus</a></div>
              </li>
              <li><img src="images/300x215x2.jpg" alt="">
                <div class="title_caption"><a href="pages/single.html">Sed luctus semper odio aliquam rhoncus</a></div>
              </li>
            </ul>
          
        </div>
      </div>
    </div> 
  </div>-->
  <div class="content_bottom">
    <div class="row">
      <div class="col-lg-8 col-md-8">
        <div class="content_bottom_left">         
          <div class="single_category wow fadeInDown">
           <h2 style="margin-left: 15px; margin-right:15px; " > <a  href="haberler.php?kategori_id=16">Artırılmış Gerçeklik</a> </h2>
           <?php     
           $icerik_sor=$db->prepare("SELECT * FROM tablo_icerik INNER JOIN tablo_kategori ON tablo_icerik.kategori_id=tablo_kategori.kategori_id WHERE kategori_ad=? order by icerik_zaman Desc limit 4");
           $icerik_sor->execute(array('Artıtılmış Gerçeklik'));        
           while($icerik_cek=$icerik_sor->fetch(PDO::FETCH_ASSOC)){ ?> 
            <div class="col-lg-6 col-md-6 col-sm-6">
              <div class="business_category_left wow fadeInDown">
                <ul class="fashion_catgnav">
                  <li>
                    <div class="catgimg2_container"> <a href="haber-detay/<?=$icerik_cek['kategori_id'].'/'.seo($icerik_cek['icerik_baslik']).'/'.$icerik_cek['icerik_id']?>"><img alt="" src="Admin/production/<?php echo $icerik_cek['icerik_resim'];?> "></a> </div>
                    <div class="baslik"><h4 class="catg_titile"><a href="haber-detay/<?=$icerik_cek['kategori_id'].'/'.seo($icerik_cek['icerik_baslik']).'/'.$icerik_cek['icerik_id']?>"><?php echo $icerik_cek['icerik_baslik'];?></a></h4></div>
                    <div class="comments_box"> <span class="meta_date">14/12/2045</span> <span class="meta_comment">No Comments</span> <span class="meta_more"><a href="haber-detay/<?=$icerik_cek['kategori_id'].'/'.seo($icerik_cek['icerik_baslik']).'/'.$icerik_cek['icerik_id']?>">Read More...</a></span> </div>
                    <div class="detay"><p><?php echo $icerik_cek['icerik_detay']?>...</p></div>
                  </li>
                </ul>
              </div>
            </div>
          <?php } ?>
        </div>
        <div class="single_category wow fadeInDown">
         <h2  style="margin-left: 15px; margin-right:15px;"> <a  href="haberler.php?kategori_id=17">Yapay Zeka & Makine Öğrenmesi</a> </h2>
         <?php 
         $icerik_sor=$db->prepare("SELECT * FROM tablo_icerik INNER JOIN tablo_kategori ON tablo_icerik.kategori_id=tablo_kategori.kategori_id WHERE kategori_ad=? limit 4");
         $icerik_sor->execute(array('Yapay Zeka ve Makine Öğrenmesi'));
         while($icerik_cek=$icerik_sor->fetch(PDO::FETCH_ASSOC)){?>
          <div class="col-lg-6 col-md-6  col-sm-6">
           <div class="business_category_left wow fadeInDown">
            <ul class="fashion_catgnav wow fadeInDown">
              <li>
                <div class="catgimg2_container"> <a href="haber-detay/<?=$icerik_cek['kategori_id'].'/'.seo($icerik_cek['icerik_baslik']).'/'.$icerik_cek['icerik_id']?>"><img alt="" src="Admin/production/<?php echo $icerik_cek['icerik_resim'];?> "></a> </div>
                <div class="baslik"><h4 class="catg_titile"><a href="haber-detay/<?=$icerik_cek['kategori_id'].'/'.seo($icerik_cek['icerik_baslik']).'/'.$icerik_cek['icerik_id']?>"><?php echo $icerik_cek['icerik_baslik'];?></a></h4></div>
                <div class="comments_box"> <span class="meta_date">14/12/2045</span> <span class="meta_comment">No Comments</span> <span class="meta_more"><a href="haber-detay/<?=$icerik_cek['kategori_id'].'/'.seo($icerik_cek['icerik_baslik']).'/'.$icerik_cek['icerik_id']?>">Read More...</a></span> </div>
                <div class="detay"><p><?php echo substr($icerik_cek['icerik_detay'],0,200)?>...</p></div>
              </li>
            </ul>     
          </div>
        </div>
      <?php } ?>
    </div> 
    <div class="single_category wow fadeInDown">
           <h2 style="margin-left: 15px; margin-right:15px; " > <a  href="haberler.php?kategori_id=15">C#</a> </h2>
           <?php     
           $icerik_sor=$db->prepare("SELECT * FROM tablo_icerik INNER JOIN tablo_kategori ON tablo_icerik.kategori_id=tablo_kategori.kategori_id WHERE kategori_ad=? order by icerik_zaman Desc limit 4");
           $icerik_sor->execute(array('C#'));        
           while($icerik_cek=$icerik_sor->fetch(PDO::FETCH_ASSOC)){ ?> 
            <div class="col-lg-6 col-md-6 col-sm-6">
              <div class="business_category_left wow fadeInDown">
                <ul class="fashion_catgnav">
                  <li>
                    <div class="catgimg2_container"> <a href="haber-detay/<?=$icerik_cek['kategori_id'].'/'.seo($icerik_cek['icerik_baslik']).'/'.$icerik_cek['icerik_id']?>"><img alt="" src="Admin/production/<?php echo $icerik_cek['icerik_resim'];?> "></a> </div>
                    <div class="baslik"><h4 class="catg_titile"><a href="haber-detay/<?=$icerik_cek['kategori_id'].'/'.seo($icerik_cek['icerik_baslik']).'/'.$icerik_cek['icerik_id']?>"><?php echo $icerik_cek['icerik_baslik'];?></a></h4></div>
                    <div class="comments_box"> <span class="meta_date">14/12/2045</span> <span class="meta_comment">No Comments</span> <span class="meta_more"><a href="haber-detay/<?=$icerik_cek['kategori_id'].'/'.seo($icerik_cek['icerik_baslik']).'/'.$icerik_cek['icerik_id']?>">Read More...</a></span> </div>
                    <div class="detay"><p><?php echo $icerik_cek['icerik_detay']?>...</p></div>
                  </li>
                </ul>
              </div>
            </div>
          <?php } ?>
        </div>
        <div class="single_category wow fadeInDown">
           <h2 style="margin-left: 15px; margin-right:15px; " > <a  href="haberler.php?kategori_id=21">PHP</a> </h2>
           <?php     
           $icerik_sor=$db->prepare("SELECT * FROM tablo_icerik INNER JOIN tablo_kategori ON tablo_icerik.kategori_id=tablo_kategori.kategori_id WHERE kategori_ad=? order by icerik_zaman Desc limit 4");
           $icerik_sor->execute(array('php'));        
           while($icerik_cek=$icerik_sor->fetch(PDO::FETCH_ASSOC)){ ?> 
            <div class="col-lg-6 col-md-6 col-sm-6">
              <div class="business_category_left wow fadeInDown">
                <ul class="fashion_catgnav">
                  <li>
                    <div class="catgimg2_container"> <a href="haber-detay/<?=$icerik_cek['kategori_id'].'/'.seo($icerik_cek['icerik_baslik']).'/'.$icerik_cek['icerik_id']?>"><img alt="" src="Admin/production/<?php echo $icerik_cek['icerik_resim'];?> "></a> </div>
                    <div class="baslik"><h4 class="catg_titile"><a href="haber-detay/<?=$icerik_cek['kategori_id'].'/'.seo($icerik_cek['icerik_baslik']).'/'.$icerik_cek['icerik_id']?>"><?php echo $icerik_cek['icerik_baslik'];?></a></h4></div>
                    <div class="comments_box"> <span class="meta_date">14/12/2045</span> <span class="meta_comment">No Comments</span> <span class="meta_more"><a href="haber-detay/<?=$icerik_cek['kategori_id'].'/'.seo($icerik_cek['icerik_baslik']).'/'.$icerik_cek['icerik_id']?>">Read More...</a></span> </div>
                    <div class="detay"><p><?php echo $icerik_cek['icerik_detay']?>...</p></div>
                  </li>
                </ul>
              </div>
            </div>
          <?php } ?>
        </div>
        <div class="single_category wow fadeInDown">
           <h2 style="margin-left: 15px; margin-right:15px; " > <a  href="haberler.php?kategori_id=19">React-Native</a> </h2>
           <?php     
           $icerik_sor=$db->prepare("SELECT * FROM tablo_icerik INNER JOIN tablo_kategori ON tablo_icerik.kategori_id=tablo_kategori.kategori_id WHERE kategori_ad=? order by icerik_zaman Desc limit 4");
           $icerik_sor->execute(array('react-native'));        
           while($icerik_cek=$icerik_sor->fetch(PDO::FETCH_ASSOC)){ ?> 
            <div class="col-lg-6 col-md-6 col-sm-6">
              <div class="business_category_left wow fadeInDown">
                <ul class="fashion_catgnav">
                  <li>
                    <div class="catgimg2_container"> <a href="haber-detay/<?=$icerik_cek['kategori_id'].'/'.seo($icerik_cek['icerik_baslik']).'/'.$icerik_cek['icerik_id']?>"><img alt="" src="Admin/production/<?php echo $icerik_cek['icerik_resim'];?> "></a> </div>
                    <div class="baslik"><h4 class="catg_titile"><a href="haber-detay/<?=$icerik_cek['kategori_id'].'/'.seo($icerik_cek['icerik_baslik']).'/'.$icerik_cek['icerik_id']?>"><?php echo $icerik_cek['icerik_baslik'];?></a></h4></div>
                    <div class="comments_box"> <span class="meta_date">14/12/2045</span> <span class="meta_comment">No Comments</span> <span class="meta_more"><a href="haber-detay/<?=$icerik_cek['kategori_id'].'/'.seo($icerik_cek['icerik_baslik']).'/'.$icerik_cek['icerik_id']?>">Read More...</a></span> </div>
                    <div class="detay"><p><?php echo $icerik_cek['icerik_detay']?>...</p></div>
                  </li>
                </ul>
              </div>
            </div>
          <?php } ?>
        </div>  
        <div class="single_category wow fadeInDown">
           <h2 style="margin-left: 15px; margin-right:15px; " > <a  href="haberler.php?kategori_id=20">Siber Güvenlik</a> </h2>
           <?php     
           $icerik_sor=$db->prepare("SELECT * FROM tablo_icerik INNER JOIN tablo_kategori ON tablo_icerik.kategori_id=tablo_kategori.kategori_id WHERE kategori_ad=? order by icerik_zaman Desc limit 4");
           $icerik_sor->execute(array('Siber Güvenlik'));        
           while($icerik_cek=$icerik_sor->fetch(PDO::FETCH_ASSOC)){ ?> 
            <div class="col-lg-6 col-md-6 col-sm-6">
              <div class="business_category_left wow fadeInDown">
                <ul class="fashion_catgnav">
                  <li>
                    <div class="catgimg2_container"> <a href="haber-detay/<?=$icerik_cek['kategori_id'].'/'.seo($icerik_cek['icerik_baslik']).'/'.$icerik_cek['icerik_id']?>"><img alt="" src="Admin/production/<?php echo $icerik_cek['icerik_resim'];?> "></a> </div>
                    <div class="baslik"><h4 class="catg_titile"><a href="haber-detay/<?=$icerik_cek['kategori_id'].'/'.seo($icerik_cek['icerik_baslik']).'/'.$icerik_cek['icerik_id']?>"><?php echo $icerik_cek['icerik_baslik'];?></a></h4></div>
                    <div class="comments_box"> <span class="meta_date">14/12/2045</span> <span class="meta_comment">No Comments</span> <span class="meta_more"><a href="haber-detay/<?=$icerik_cek['kategori_id'].'/'.seo($icerik_cek['icerik_baslik']).'/'.$icerik_cek['icerik_id']?>">Read More...</a></span> </div>
                    <div class="detay"><p><?php echo $icerik_cek['icerik_detay']?>...</p></div>
                  </li>
                </ul>
              </div>
            </div>
          <?php } ?>
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


<?php include 'footer.php' ?>
</body>

</html> 

