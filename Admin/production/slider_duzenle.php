<?php include 'header.php';
$slider_sor=$db->prepare("SELECT * FROM tablo_slider WHERE slider_id=:slider_id");
$slider_sor->execute(array('slider_id'=>$_GET['slider_id'] ));
$slider_cek=$slider_sor->fetch(PDO::FETCH_ASSOC);?>
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Slider</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Slider Düzenle <small>

                      <?php if(isset($_GET['durum']) == 'ok') {?><b style="color: green;"> Düzenleme Başarılı...</b>
                     
                      <?php } else if(isset($_GET['durum'])=='no'){?><b style="color: red;"> Bir Şeyler Ters Gitti...</b> <?php }?>  
                    </small></h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <form action="../../connection/islem.php" method="POST" class="form-horizontal form-label-left" enctype="multipart/form-data" novalidate>

                      <input type="hidden" name="slider_id" value="<?php echo $slider_cek['slider_id'] ?>">
                      <input type="hidden" name="slider_resim" value="<?php echo $slider_cek['slider_resimyol'] ?>">

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="website">Resim <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <img width="200px;" height="150px;"src="<?php echo $slider_cek['slider_resimyol'] ;?>">
                        </div>
                      </div>
                                          
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="website">Slider Resim <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="file"  name="slider_resim" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="website">Slider Başlık  <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text"  name="slider_baslik" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $slider_cek['slider_baslik'] ?>">
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Slider Sıra <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input class="form-control col-md-7 col-xs-12"  name="slider_sira"  required="required" type="text" value="<?php echo $slider_cek['slider_sira'] ?>">
                        </div>
                      </div>

                      <div class="ln_solid"></div>
                      <div align="right"class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <button  name="slider_duzenle" type="submit" class="btn btn-primary">Kaydet</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

<?php include 'footer.php';?>       