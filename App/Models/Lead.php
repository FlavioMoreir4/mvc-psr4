<?php
namespace App\Models;

use App\Core\Model;

class Lead extends Model {

	// static function alterTable($table, $data){
	// 	try{	
	// 		foreach($data as $key => $value){
	// 			$query = "SHOW COLUMNS FROM $table LIKE '$key'";
	// 			$stmt = self::conn()->prepare($query);
	// 			$stmt->execute();
	// 			$result = $stmt->fetchAll();
	// 			return $result;
				
	// 			if(empty(empty($stmt->num_rows))) { 
	// 				$alter = "ALTER TABLE $table ADD $key varchar(255) NOT NULL"; 
	// 				$stmt->prepare($alter);
	// 				$stmt->execute();
	// 				return true;
	// 			} else { 
	// 				return false;
	// 			}
	// 		}
	// 	}
	// 	catch(\PDOException $e){
	// 		return $e->getMessage();
	// 	}
	// }

	static function alterTable($table, $column){
		try{
			$exists = false;
			$columns = $stmt = self::conn()->query("SHOW COLUMNS FROM `$table` LIKE '$column'");
			if(!empty($columns->num_rows)){
				$exists = true;
			}
			if(!$exists){
				$stmt = self::conn()->query("ALTER TABLE `$table` ADD `$column` VARCHAR(255) NULL" );
			}
		}
		catch(\PDOException $e){
			return $e->getMessage();
		}

	}
		

	static function setLead($data) {
		foreach ($data as $key => $value) {
			try{
				self::alterTable('leads', $key);
				$params[":$key"] = $value;
			}
			catch(\PDOException $e) {
				return array(
					'statusCode' => 500,
					'data' => array(
						"code" => $e->getCode(),
						'message' => $e->getMessage()
					)
				);
			}
		}

		$columns = implode(", ",array_keys($data));
		$values  = implode(", ", array_keys($params));
		
		try{
			$query = "INSERT INTO leads ($columns) VALUES ($values)";
			$stmt = self::conn()->prepare($query);
			$params = $data;
			$stmt->execute($params);

			return array(
				"statusCode" => 201,
				"data" => array(
					"id" => self::conn()->lastInsertId(),
					"message" => "Lead Adicionado com sucesso"
				)
			);

		}catch(\PDOException $e){
			 return array(
				"statusCode" => 500,
				"data" => array(
					"code" =>$e->getCode(),
					"message" => $e->getMessage()
				)
			 );
			
		}
	}

	static function getLeads() {
		try{
			$query = "SELECT * FROM leads";
			$stmt = self::conn()->prepare($query);
			$stmt->execute();

			return $stmt->fetchAll(\PDO::FETCH_ASSOC);

		}catch(\PDOException $e){
			return $e->getMessage();
		}
	}

	static function getLead($id) {
		try{
			$query = "SELECT * FROM leads WHERE id = :id";
			$stmt = self::conn()->prepare($query);
			$stmt->execute(array(':id' => $id));

			return $stmt->fetch(\PDO::FETCH_ASSOC);

		}catch(\PDOException $e){
			return $e->getMessage();
		}
	}

	static function updateLead($id, $data) {
		foreach ($data as $key => $value) {
			$params[":$key"] = $value;	
		}
		try{
			$query = "UPDATE leads SET nome = :nome, email = :email, whatsapp = :whatsapp WHERE id = :id";
			$stmt = self::conn()->prepare($query);
			$params = $data;
			$stmt->execute($params);

			return self::conn()->lastInsertId();

		}catch(\PDOException $e){
			return $e->getMessage();
		}
	}

	static function deleteLead($id) {
		try{
			$query = "DELETE FROM leads WHERE id = :id";
			$stmt = self::conn()->prepare($query);
			$stmt->execute(array(':id' => $id));

			return self::conn()->lastInsertId();

		}catch(\PDOException $e){
			return $e->getMessage();
		}
	}

	static function getLeadsByEmail($email) {
		try{
			$query = "SELECT * FROM leads WHERE email = :email";
			$stmt = self::conn()->prepare($query);
			$stmt->execute(array(':email' => $email));

			return $stmt->fetch(\PDO::FETCH_ASSOC);

		}catch(\PDOException $e){
			return $e->getMessage();
		}
	}

	static function getLeadsByWhatsapp($whatsapp) {
		try{
			$query = "SELECT * FROM leads WHERE whatsapp = :whatsapp";
			$stmt = self::conn()->prepare($query);
			$stmt->execute(array(':whatsapp' => $whatsapp));

			return $stmt->fetch(\PDO::FETCH_ASSOC);

		}catch(\PDOException $e){
			return $e->getMessage();
		}
	}

	static function getLeadsByNome($nome) {
		try{
			$query = "SELECT * FROM leads WHERE nome = :nome";
			$stmt = self::conn()->prepare($query);
			$stmt->execute(array(':nome' => $nome));

			return $stmt->fetch(\PDO::FETCH_ASSOC);

		}catch(\PDOException $e){
			return $e->getMessage();
		}
	}

	static function getLeadsByEmailAndWhatsapp($email, $whatsapp) {
		try{
			$query = "SELECT * FROM leads WHERE email = :email AND whatsapp = :whatsapp";
			$stmt = self::conn()->prepare($query);
			$stmt->execute(array(':email' => $email, ':whatsapp' => $whatsapp));

			return $stmt->fetch(\PDO::FETCH_ASSOC);

		}catch(\PDOException $e){
			return $e->getMessage();
		}
	}

	static function getLeadsByEmailAndNome($email, $nome) {
		try{
			$query = "SELECT * FROM leads WHERE email = :email AND nome = :nome";
			$stmt = self::conn()->prepare($query);
			$stmt->execute(array(':email' => $email, ':nome' => $nome));

			return $stmt->fetch(\PDO::FETCH_ASSOC);

		}catch(\PDOException $e){
			return $e->getMessage();
		}
	}

	static function getLeadsByWhatsappAndNome($whatsapp, $nome) {
		try{
			$query = "SELECT * FROM leads WHERE whatsapp = :whatsapp AND nome = :nome";
			$stmt = self::conn()->prepare($query);
			$stmt->execute(array(':whatsapp' => $whatsapp, ':nome' => $nome));

			return $stmt->fetch(\PDO::FETCH_ASSOC);

		}catch(\PDOException $e){
			return $e->getMessage();
		}
	}

	static function getLeadsByEmailAndWhatsappAndNome($email, $whatsapp, $nome) {
		try{
			$query = "SELECT * FROM leads WHERE email = :email AND whatsapp = :whatsapp AND nome = :nome";
			$stmt = self::conn()->prepare($query);
			$stmt->execute(array(':email' => $email, ':whatsapp' => $whatsapp, ':nome' => $nome));

			return $stmt->fetch(\PDO::FETCH_ASSOC);

		}catch(\PDOException $e){
			return $e->getMessage();
		}
	}

}

