<?php

namespace App\Controllers;

use App\Core\Controller;
use App\ResponseCode;

class NotFoundController extends Controller {

	public function index() {
		$this->ResponseCode = ResponseCode::setCode(404);
		header("content-type: application/json");
		echo json_encode(
			array(
				"status" => $this->ResponseCode,
			)
		);
	}

}