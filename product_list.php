<?php			
	$qryProd  = "SELECT p.id, p.name, p.description, p.price, c.name as category, p.created, p.category_id  ";
	$qryProd .= "FROM products p JOIN category c on category_id = c.id ";
	$stmt = $con->prepare($qryProd);
	$resProd = $stmt->execute(); 
	$products = $stmt->fetchAll();
	
	foreach($products as $row){	
?>								
	<tr>
		<td><input type="checkbox" name="delete[]" value="<?php echo $row["id"] ?>"  ></td>
		<td><?php echo $row["name"] ?></td>
		<td>$<?php echo $row["price"] ?></td>
		<td><?php echo $row["description"] ?></td>
		<td><?php echo $row["category"] ?></td>
		<td><?php echo $row["created"]?></td>
		<td>							
			<button type="button" onclick="edit(<?=$row["id"]?>,'<?=$row["name"] ?>',<?=$row["price"]?>,'<?=$row["description"]?>',<?=$row["category_id"]?>)" class="btn btn-primary btn-md" >
			  <span class="glyphicon glyphicon-edit " aria-hidden="true"></span> Edit
			</button>
		</td>
		<td>						
			<button type="button" class="btn btn-danger btn-md" onclick="deleteProduct(<?php echo $row["id"]?>); return false">
				<span class="glyphicon glyphicon-remove " aria-hidden="true"></span> Delete
			</button>
		</td>
		
	</tr>
<?php									
}																													
?>
