<?php
namespace App\Models;

use App\Core\Model;

class Sites extends Model {

	static function getSite($site) {
		try{
			$query = "SELECT * FROM sites WHERE `site`= :site";
			$stmt = self::conn()->prepare($query);
			$stmt->bindValue(':site', $site);
			$stmt->execute();

			if($stmt->rowCount() > 0) {
				return $stmt->fetch(\PDO::FETCH_ASSOC);
			}else{
				return "Dominio não autorizado: {$site}";
			}
		}catch(\PDOException $e){
			return $e->getMessage();
		}
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