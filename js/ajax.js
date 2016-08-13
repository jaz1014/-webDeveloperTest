	
	function objetoAjax(){
		var xmlhttp=false;
		try {
			   xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
		} catch (e) {
			   try {
				  xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			   } catch (E) {
					   xmlhttp = false;
			   }
		}
		if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
			   xmlhttp = new XMLHttpRequest();
		}
		return xmlhttp;
	}
	
	function insertProduct(){
		divResultado = document.getElementById('resultado');
		
		name = document.frmProducts.name.value;
		price = document.frmProducts.price.value;
		category = document.frmProducts.category.value;
		description = document.frmProducts.description.value;		
		ajax=objetoAjax();
		ajax.open("POST", "insert_product.php", true);
		ajax.onreadystatechange=function(){
			if(ajax.readyState == 4){
				divResultado.innerHTML = ajax.responseText 
			}
		}
		ajax.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		ajax.send("name="+name+"&price="+price+"&category="+category+"&description="+description);
		
	}
	
	function editProduct(){
		divResultado = document.getElementById('resultado');
		
		id = document.frmEdit.id.value;
		name = document.frmEdit.name.value;
		price = document.frmEdit.price.value;
		category = document.frmEdit.category.value;
		description = document.frmEdit.description.value;		

		ajax=objetoAjax();
		ajax.open("POST", "edit_product.php", true);
		ajax.onreadystatechange=function(){
			if(ajax.readyState == 4){
				divResultado.innerHTML = ajax.responseText 
			}
		}
		ajax.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		ajax.send("id="+id+"&name="+name+"&price="+price+"&category="+category+"&description="+description);
	}

	function deleteProduct(id){		
		
		divResultado = document.getElementById('resultado');
		
		ajax=objetoAjax();
		ajax.open("POST", "delete_product.php", true);
		ajax.onreadystatechange=function(){
			if(ajax.readyState == 4){				
				divResultado.innerHTML = ajax.responseText 
			}
		}
		ajax.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		ajax.send("id="+id);
	}
	

	function searchProduct(){		
		
		divResultado = document.getElementById('resultado');
		var n = document.getElementById('search').value;
		
		ajax=objetoAjax();
		ajax.open("POST", "search_product.php", true);
		ajax.onreadystatechange=function(){
			if(ajax.readyState == 4){				
				divResultado.innerHTML = ajax.responseText 
			}
		}
		ajax.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		ajax.send("q="+n);
	}
	
	function multiDeleteProduct(){		
		
		divResultado = document.getElementById('resultado');
		
		ajax=objetoAjax();
		ajax.open("POST", "delete_product.php", true);
		ajax.onreadystatechange=function(){
			if(ajax.readyState == 4){				
				divResultado.innerHTML = ajax.responseText 
			}
		}
		ajax.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		ajax.send("id="+id);
	}
