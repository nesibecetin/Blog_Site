<?php 
try {
	
	$db=new PDO("mysql:host=localhost;dbname=my_blog",'root','');
} catch (PDOException $e) {
	echo $e->getMessage();
}



?>
