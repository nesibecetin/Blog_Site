<?php include 'connection/baglan.php' ;
include 'Admin/production/function.php' ;

$ayar_sor=$db->prepare("select*from tablo_ayar where ayar_id=?");
$ayar_sor->execute(array(0));
$ayar_cek=$ayar_sor->fetch(PDO::FETCH_ASSOC); 
?>
<!DOCTYPE html>
<html>
<head>
  <base href="http://localhost/project/Pdo/magexpress/" />
  <title><?php echo $ayar_cek['ayar_title']; ?></title>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="<?php echo $ayar_cek['ayar_description']; ?>">
  <meta name="keywords" content="<?php echo $ayar_cek['ayar_keywords']; ?>">
  <meta name="author" content="<?php echo $ayar_cek['ayar_author']; ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="assets/css/animate.css">
  <link rel="stylesheet" type="text/css" href="assets/css/slick.css">
  <link rel="stylesheet" type="text/css" href="assets/css/theme.css">
  <link rel="stylesheet" type="text/css" href="assets/css/style.css">
<style>
.menu_section{z-index:9999;height:100%; width: 0;overflow-x: hidden; transition: 0.5s;position:fixed;background-color:#111; padding: 100px 0 0 0;}

.menu_section a {

  font-size: 25px;
  color: #818181;
  display:inline;
  transition: 0.3s;
}

.menu_section a:hover {
  color: #f1f1f1;

}

.menu_section .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

#main {
  transition: margin-left .5s;
  padding: 16px;
}


@media screen and (max-height: 400px) {
  .menu_section {padding-top: 15px;}
  .menu_section a {font-size: 18px;}
}
</style>



<script>
function openNav() {
  $("#YanMenu").css("min-width"," 200px");
}

function closeNav() {
   $("#YanMenu").css("min-width"," 0");
}
</script>

<body style="background-color: #333; " >
  <div id="preloader">
    <div id="status">&nbsp;</div>
  </div>
  <a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a> 

  <header  id="header">
     

    <div class="top_nav">
      <span style="color:white;float:left;font-size:20px;cursor:pointer" onclick="openNav()">&#9776;</span>
     <form action="#" class="search_form">
      <input type="text" placeholder="Text to Search">
      <button type="submit"><i class="fa fa-search"></i></button> 
    </form>
    
    
    
  </div>
  
  
</header>



    <div id="YanMenu" class="menu_section">
       <a href="javascript:void(0)" class="closebtn" onclick="closeNav()"> &times;</a>
      <div>

       <ul >
         <?php 
         $menu_sor=$db->prepare("select*from tablo_menu order by menu_sira ASC");    
         $menu_sor->execute();
         
         while($menu_cek=$menu_sor->fetch(PDO::FETCH_ASSOC)){
          $menu_id=$menu_cek['menu_id'];
          $kategori_sor=$db->prepare("select*from tablo_kategori where menu_id=:menu_id order by kategori_sira ASC");    
          $kategori_sor->execute(array('menu_id'=> $menu_id));
          ?> 
          <li class="dropdown" ><a href="<?php echo $menu_cek['menu_url'] ?>"><i class="<?php echo $menu_cek['menu_icon'] ?>"></i> &nbsp; &nbsp; <?php echo $menu_cek['menu_ad'] ?></a>
            <ul class="dropdown-content" role="menu">
              <?php  
              while($kategori_cek=$kategori_sor->fetch(PDO::FETCH_ASSOC)){ ?> 

                <li>
                 <a href="haberler.php?kategori_id=<?php echo $kategori_cek['kategori_id'] ?>"><?php echo $kategori_cek['kategori_ad'] ?></a>
               </li>

             <?php } ?>
           </ul>
         </li>
       <?php }?>
     </ul>
   </div>
 </div>
    <div  class="menu_section">
      <div >
       <ul >
         <?php 
         $menu_sor=$db->prepare("select*from tablo_menu order by menu_sira ASC");    
         $menu_sor->execute();
         
         while($menu_cek=$menu_sor->fetch(PDO::FETCH_ASSOC)){
          $menu_id=$menu_cek['menu_id'];
          $kategori_sor=$db->prepare("select*from tablo_kategori where menu_id=:menu_id order by kategori_sira ASC");    
          $kategori_sor->execute(array('menu_id'=> $menu_id));
          ?> 
          <li class="dropdown" ><a href="<?php echo $menu_cek['menu_url'] ?>"><i class="<?php echo $menu_cek['menu_icon'] ?>"></i><br><?php echo $menu_cek['menu_ad'] ?></a>
            <ul class="dropdown-content" role="menu">
              <?php  
              while($kategori_cek=$kategori_sor->fetch(PDO::FETCH_ASSOC)){ ?> 

                <li>
                 <a href="haberler.php?kategori_id=<?php echo $kategori_cek['kategori_id'] ?>"><?php echo $kategori_cek['kategori_ad'] ?></a>
               </li>

             <?php } ?>
           </ul>
         </li>
       <?php }?>
     </ul>
   </div>
 </div>


  <div id="main" class="container">
    <section id="mainContent">
<!--<div id="navarea">
    <nav class="navbar navbar-default" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
               <?php 
             $menu_sor=$db->prepare("select*from tablo_menu order by menu_sira ASC");    
             $menu_sor->execute();
              
             while($menu_cek=$menu_sor->fetch(PDO::FETCH_ASSOC)){
              $menu_id=$menu_cek['menu_id'];
              $kategori_sor=$db->prepare("select*from tablo_kategori where menu_id=:menu_id order by kategori_sira ASC");    
                    $kategori_sor->execute(array('menu_id'=> $menu_id));
             ?> 
              <li class="dropdown" ><a href="<?php echo $menu_cek['menu_url'] ?>"><?php echo $menu_cek['menu_ad'] ?></a>
                <ul class="dropdown-menu" role="menu">
                  <?php  
                    while($kategori_cek=$kategori_sor->fetch(PDO::FETCH_ASSOC)){ ?> 

                  <li>
                     <a href="haberler.php?kategori_id=<?php echo $kategori_cek['kategori_id'] ?>"><?php echo $kategori_cek['kategori_ad'] ?></a>
                  </li>

                <?php } ?>
                </ul>
              </li>
           <?php }?>
          </ul>
        </div>
      </div>
    </nav>
  </div>-->


  


