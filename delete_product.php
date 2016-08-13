<?php
	include 'conection.php';
	$con = Connect();
	$qryDel = "DELETE FROM products WHERE CONCAT(id) IN ('{$_POST['id']}')";
	
	$qDel = $con->prepare($qryDel);
	$resDel = $qDel->execute(); 

	if($resDel){	
		include 'product_list.php'; 								
}				
?>