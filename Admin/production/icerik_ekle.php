<?php include 'header.php';?>
<head>
   <script src="js/ckeditor/ckeditor.js"></script>
</head>
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                 <h3>İçerik Yönetimi</h3>
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
                    <h2>İçerik Ekle <small>

                      <?php if(isset($_GET['durum']) == 'ok') {?><b style="color: green;"> Ekleme Başarılı...</b>
                     
                      <?php } else if(isset($_GET['durum'])=='no'){?><b style="color: red;"> Bir Şeyler Ters Gitti...</b> <?php }?>  
                    </small></h2>
                  
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <form action="../../connection/islem.php" method="POST" class="form-horizontal form-label-left" enctype="multipart/form-data" novalidate> <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="website">İçerik Resim <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="file"  name="icerik_resim" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Kategori <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                      
                          <select name="secenek" class="form-control">        
                            <?php
                             $kategori_sor=$db->prepare("select*from tablo_kategori order by kategori_sira ASC");    
                              $kategori_sor->execute();
                             while($kategori_cek=$kategori_sor->fetch(PDO::FETCH_ASSOC)){ ?> 
                            <option value="<?php echo $kategori_cek['kategori_id'];?>"><?php echo $kategori_cek['kategori_ad'];?></option>
                          <?php }?>
                          </select>
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="website">İçerik Başlık  <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text"  name="icerik_baslik" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                        <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="website">İçerik Anahtar Kelime  <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text"  name="icerik_anahtar_kelime" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">İçerik Detay <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                           <textarea name="icerik" class="ckeditor" ></textarea>
                            <script type="text/javascript" >
                              CKEDITOR.replace( 'editor1' );
                            </script>
                        </div>
                      </div>

                      <div class="ln_solid"></div>
                      <div align="right"class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <button  name="icerik_ekle" type="submit" class="btn btn-primary">Ekle</button>
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