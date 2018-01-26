<?php
require_once 'Database.php';

class Product
{
	public $name;
	public $price;
	public $description;
	public $categoria_id;


	public function __construct($name, $price, $description, $categoria_id)
	{
		$this->name = $name;
		$this->price = $price;
		$this->description = $description;
		$this->categoria_id = $categoria_id;
	}

	public function insert()
	{
		$sql = "INSERT INTO 
					PRODUCTOS (
						nombre,
						descripcion,
						precio,
						categoria_id
					)
					VALUES (
						'$this->name',
						'$this->description',
						$this->price,
						1
					)";

		$db = new Database();
		if($db->query($sql)) {
			$db->close();
			return true;
		}
		$db->close();
		return false;
	}

	public static function get()
	{
		$sql = "SELECT
				*
			   FROM
				productos";
		$db = new Database();
		if ($rows = $db->query($sql)) {
			$db->close();
			return $rows;
		}
		$db->close();
		return false;
	}
}
