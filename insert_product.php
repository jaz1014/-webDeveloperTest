<?php
	include 'conection.php';
	$con = Connect();
	$qry  = "INSERT INTO `store`.`products` (`name`, `description`, `price`, `category_id`, `created`) VALUES ('{$_POST['name']}' , '{$_POST['description']}' , '{$_POST['price']}', '{$_POST['category']}' , CURRENT_TIMESTAMP)" ;

	$q = $con->prepare($qry);
	$res = $q->execute(); 

	if($res){
		include 'product_list.php'; 							
	}				
?>