<?php
	include 'conection.php';
	$con = Connect();
	
	$qry  = "UPDATE `store`.`products`  SET  name = '{$_POST['name']}', price = '{$_POST['price']}', description= '{$_POST['description']}' , category_id = '{$_POST['category']}', modified = CURRENT_TIMESTAMP  WHERE id = {$_POST['id']} ";	
	$q = $con->prepare($qry);
	$res = $q->execute(); 

	if($res){
		include 'product_list.php'; 	
	}								
				
?>