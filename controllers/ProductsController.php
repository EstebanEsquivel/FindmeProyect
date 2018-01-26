<?php
include_once("../models/Product.php");
include_once("../models/Cleaner.php");


if (isset($_POST["action"])) {
	$nombre 	 = Cleaner::cleanInput($_POST["name"]);
	$precio 	 = (int)Cleaner::cleanInput($_POST["price"]);
	$descripcion = Cleaner::cleanInput($_POST["description"]);

  	$producto = new Product($nombre, $precio, $descripcion, 1);

  	if($producto->insert()) {
  		echo "Registrado correctamente";
  	}else {
  		echo "Registrado incorrectamente!!";
  	}
  	
} else {
  $products = Product::get();

  $products = json_encode($products);

  echo $products;
}