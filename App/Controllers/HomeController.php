<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\SampleClass;
use App\ResponseCode;

class HomeController extends Controller {

	public function __construct() {

		$this->ResponseCode = ResponseCode::setCode(200);

		$this->data = [
			'dataReturn' => array(
				"status" => $this->ResponseCode,
				"data" => array(
					"message" => "Hello World!"
				)
			)			
		];

	}

	public function index() {
		$this->render('home', $this->data);

	}

	public function log($args = null) {
		$this->data['dataReturn']['data']['message'] = $args;
		$this->render('home', $this->data);

	}

}