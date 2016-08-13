<?php
	include 'conection.php';
	$con = Connect();
	$qry  = "INSERT INTO products ( id, name, price, description, category_id, created) VALUES ( null ,'{$_POST['name']}' , '{$_POST['price']}' , '{$_POST['category']}' , '{$_POST['description']}' , CURRENT_TIMESTAMP  ) ";	
	$q = $con->prepare($qry);
	$res = $q->execute(); 

	if($res){
		include 'product_list.php'; 							
	}				
?>