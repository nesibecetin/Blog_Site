	

<div class="col-lg-4 col-md-4">
  <div class="content_bottom_right">
    <div class="single_bottom_rightbar">
          <!--<div class="business_category_right wow fadeInDown">
            <ul class="small_catg popular_catg wow fadeInDown">        
                  <div style="text-align: center;"><a style="text-align: center;"href="#" ><h4>Nesibe ÇETİN</h4></a></div>
                   <div class="detay"><p>sssssssssdd fffffffffff fffffffffff ffffffff</p></div>             
               <div class="share_post"><a class="linkedin" href="#"><i class="fa fa-linkedin"></i>LinkedIn</a><a class="Github" href="#"><i class="fa fa-github"></i>GitHub</a></div>       
            </ul>
          </div>-->

        </div>
        <div class="single_bottom_rightbar">
          <h2>SON EKLENENLER</h2>
          <div class="business_category_right wow fadeInDown">
            <ul class="small_catg popular_catg wow fadeInDown">
             <?php 
             $icerik_sor=$db->prepare("select*from tablo_icerik order by icerik_zaman DESC limit 4 ");                        
             $icerik_sor->execute();
             while($icerik_cek=$icerik_sor->fetch(PDO::FETCH_ASSOC)){ ?>
              <li>
                <div class="media wow fadeInDown"> <a href="#" class="media-left"><img alt="" src="Admin/production/<?php echo $icerik_cek['icerik_resim']?>"> </a>
                  <div class="media-body">
                    <h4 class="media-heading"><a href="#"><?php echo $icerik_cek['icerik_baslik']?></a></h4>
                    <div class="comments_box"> <span class="meta_date"><?php echo $icerik_cek['icerik_zaman']?></span></div>
                  </div>
                </div>
              </li>
            <?php }?>
          </ul>
        </div>
      </div>
      <div class="single_bottom_rightbar">
            <!--<ul role="tablist" class="nav nav-tabs custom-tabs">
              <li class="active" role="presentation"><a data-toggle="tab" role="tab" aria-controls="home" href="#mostPopular">Most Popular</a></li>
              <li role="presentation"><a data-toggle="tab" role="tab" aria-controls="messages" href="#recentComent">Recent Comment</a></li>
            </ul>-->
            <h2>EN POPÜLERLER</h2>
            <div class="tab-content">
              <div id="mostPopular" class="tab-pane fade in active">
                <ul class="small_catg popular_catg wow fadeInDown">
                  <?php 
                  $icerik_sor=$db->prepare("select*from tablo_icerik order by icerik_hit DESC limit 4 ");                        
                  $icerik_sor->execute();
                  while($icerik_cek=$icerik_sor->fetch(PDO::FETCH_ASSOC)){ ?>
                    <li>
                      <div class="media wow fadeInDown"> <a class="media-left" href="#"><img src="Admin/production/<?php echo $icerik_cek['icerik_resim']?>" alt=""></a>
                        <div class="media-body">
                          <h4 class="media-heading"><a href="#"><?php echo $icerik_cek['icerik_baslik']?></a></h4>
                          <div class="comments_box"> <span class="meta_date"><?php echo $icerik_cek['icerik_zaman']?></span></div>
                        </div>
                      </div>
                    </li>
                  <?php }?>
                </ul>
              </div>
             <!-- <div id="recentComent" class="tab-pane fade" role="tabpanel">
                <ul class="small_catg popular_catg">
                  <li>
                    <div class="media wow fadeInDown"> <a class="media-left" href="#"><img src="images/112x112.jpg" alt=""></a>
                      <div class="media-body">
                        <h4 class="media-heading"><a href="#">Duis condimentum nunc pretium lobortis </a></h4>
                        <p>Nunc tincidunt, elit non cursus euismod, lacus augue ornare metus, egestas imperdiet nulla nisl quis mauris. Suspendisse a pharetra </p>
                      </div>
                    </div>
                  </li>
                  <li>
                    <div class="media wow fadeInDown"> <a class="media-left" href="#"><img src="images/112x112.jpg" alt=""></a>
                      <div class="media-body">
                        <h4 class="media-heading"><a href="#">Duis condimentum nunc pretium lobortis </a></h4>
                        <p>Nunc tincidunt, elit non cursus euismod, lacus augue ornare metus, egestas imperdiet nulla nisl quis mauris. Suspendisse a pharetra </p>
                      </div>
                    </div>
                  </li>
                  <li>
                    <div class="media wow fadeInDown"> <a class="media-left" href="#"><img src="images/112x112.jpg" alt=""></a>
                      <div class="media-body">
                        <h4 class="media-heading"><a href="#">Duis condimentum nunc pretium lobortis </a></h4>
                        <p>Nunc tincidunt, elit non cursus euismod, lacus augue ornare metus, egestas imperdiet nulla nisl quis mauris. Suspendisse a pharetra </p>
                      </div>
                    </div>
                  </li>
                </ul>
              </div>-->

            </div>
          </div>
        </div>
      </div>

