<?php
namespace App\Models;

use App\Core\Model;

class SampleClass extends Model {

	public function sampleMethod() {

		$return_data = [];

		$query = "SELECT * FROM usuarios  LIMIT 1";

		$stmt = self::conn()->query($query);

		if($stmt->rowCount() > 0) {

			$return_data = $stmt->fetchAll(\PDO::FETCH_ASSOC);

		}

		return $return_data;

	}

	public function sampleInsertMethod($argumentOne, $argumentTwo) { // Sample

		$query = "INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?";

		$stmt = self::conn()->prepare($query);

		$stmt->bindValue(1, $argumentOne);
		$stmt->bindValue(2, $argumentTwo);

		$stmt->execute();

		return self::conn()->lastInsertId();

	}

}