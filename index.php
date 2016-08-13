<?php 
include 'conection.php';
	$con = Connect();
	
	$qryCat  = "SELECT id, name ";
	$qryCat .= "FROM category ";
	$stmt = $con->prepare($qryCat);
	$resCat = $stmt->execute(); 
	$categories = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>..:: Store ::..</title>
  
    <!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Latest jQuery form server -->
    <script src="https://code.jquery.com/jquery.min.js"></script>
	
	<!-- Latest compiled and minified JavaScript -->
	<script src="js/bootstrap.min.js"></script>
	
    <!-- Custom CSS -->

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

	<link href='https://fonts.googleapis.com/css?family=Nunito:400,300,700' rel='stylesheet' type='text/css'>
	<script type="text/javascript" src="js/ajax.js"></script>
	
	<script src="js/moment-with-locales.js"></script>  
	<script src="js/bootstrap-datetimepicker.js"></script>
	
	<script>
	$(function () {
		$('#date1').datetimepicker({
			format: 'YYYY/MM/DD',
			locale: 'en'
		});
	});

	$(function () {
		$('#date2').datetimepicker({
			format: 'YYYY/MM/DD',
			locale: 'en'
		});
	});
	function edit(id,name,price,description,category){
			document.frmEdit.id.value = id;
			document.frmEdit.name.value = name;
			document.frmEdit.price.value = price;
			document.frmEdit.description.value = description;
			document.frmEdit.category.value = category;
			
			$("#editModal").modal("show");
		}
	</script>
</head>
<style>
.search_button{
	color: #fff;
    background: #2196F3;
    border: 1px solid #2196F3;
    border-radius: 0px 5px 5px 0px;
}
th{
	color:#2196f3;
}
</style>
<body>	
	<div class="container">
		<div class="row">
		<h1>Read Products</h1>
		<div class="filter">
		<form id="frmFilter" class="form-inline" role="form" method="post" action="">
			
			<div class="input-group">
				<input type="text" id="search" name="search" onkeyup="searchProduct()" class="form-control"  placeholder="Type product, name or description" />						
				<div class="input-group-addon search_button" >
				<span class="glyphicon glyphicon-search" > </span>
				</div>	
			</div>
			
			<div class="input-group">		
				<div class="input-group">
					<input type="text" name="" id="date1" value=""  class="form-control" placeholder="Date from"/>	
				</div>	
				<div class="input-group">
					<input type="text" name="" id="date2" value=""  class="form-control" placeholder="Date to"/>	
				</div>
				<div class="input-group-addon search_button">
					<span class="glyphicon glyphicon-search" > </span>
				</div>	
			</div>

			
			<div class="form-group">
				<button type="button" class="btn btn-danger btn-sm" onclick="multiDeleteProduct()">
				  <span class="glyphicon glyphicon-remove " aria-hidden="true"></span> Delete Selected
				</button>
			</div>
			
			<div class="form-group">
				<div class="input-group">
					<button type="button" class="btn btn-info btn-sm">
					  <span class="glyphicon glyphicon-save " aria-hidden="true"></span> Export CSV
					</button>
				</div>
			</div>
			
			<div class="form-group">
				<button type="button" class="btn btn-primary btn-sm" data-toggle="collapse" data-target="#add_product">
				  <span class="glyphicon glyphicon-plus " aria-hidden="true"></span> Create Product
				</button>
			</div>			
	
		</form>
		</div>
			<table class="table table-striped">
				<thead>
					<tr>
						<th width="1%"></th>
						<th>Name</th>
						<th>Price</th>
						<th>Description</th>
						<th>Category</th>
						<th>Created</th>
						<th colspan= "2" >Actions</th>
					</tr>
					<tr id="add_product" class="collapse">
						<form name="frmProducts" role="form" method="" action="" onsubmit="insertProduct(); return false">
							<td colspan="2"><input type="text" name="name" id="" maxlength="150" value=""  class="form-control" placeholder="Name"/></td>
							<td><input type="text" name="price" id="" maxlength="150" value=""  class="form-control" placeholder="Price "/></td>			
							<td><input type="text" name="description" id="" maxlength="150" value=""  class="form-control" placeholder="Description "/></td>
							<td colspan="2">
								<select name="category" id="" name="category" class="form-control" >
									<option value="">Category </option>
									<?php
									foreach($categories as $cat){
									?>
										<option value="<?php echo $cat["id"]?>"><?php echo $cat["name"]?></option>
									<?php 
									}
									?>
								</select>
							</td>
							<td colspan="2">
								<button type="submit" class="btn btn-success btn-md" >
									<span class="glyphicon glyphicon-ok " aria-hidden="true"></span> Insert
								</button>
							</td>
						</form>
					</tr>
				<thead>	
				<tbody id="resultado" >
								
					<?php include 'product_list.php'; ?>			
				</tbody>
			</table>
			
			<div id="editModal" class="modal fade" role="dialog">
			  <div class="modal-dialog">

				<!-- Modal content-->
				<div class="modal-content">
				  <div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Modal Header</h4>
				  </div>
				  <div class="modal-body">								
					<form name="frmEdit" role="form" method="" action="" onsubmit="editProduct().modal('hide'); return false">
						<input type="hidden" name="id"  value=""  class="form-control" />
						<div class="form-group">
							<label for="name">Name</label>
							<input type="text" name="name"  maxlength="150" value=""  class="form-control" />
						</div>
						
						<div class="form-group">
							<label for="price">Price</label>
							<input type="text" name="price"  maxlength="150" value=""  class="form-control" />
						</div>
						<div class="form-group">
							<label for="category">Category</label>
							<select name="category" id="" class="form-control" >
								<option value=""></option>
								<?php
								foreach($categories as $cat){
								?>
									<option value="<?php echo $cat["id"]?>"><?php echo $cat["name"]?></option>
								<?php 
								}
								?>
							</select>
						</div>

						<div class="form-group">
							<label for="description">Description</label>
							<input type="text" name="description"  value=""  class="form-control" />
						</div>

						<button type="submit" class="btn btn-success btn-md"  >
							<span class="glyphicon glyphicon-ok " aria-hidden="true"></span> Update
						</button>	
						
					</form>
				
				  </div>
				  <div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				  </div>
				</div>

			  </div>
			</div>
			
		</div>
	</div>
  </body>
</html>
