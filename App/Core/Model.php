<?php

namespace App\Core;

use App\Core\Conn;

class Model {

	public static function conn() {
		return Conn::getConn();
	} 

}