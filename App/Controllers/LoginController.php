<?php

namespace App\Controllers;

use App\Core\Controller;

class LoginController extends Controller {

	public function __construct() {

		$this->dataReturn = [
			'userName' => 'Queliom Elias de Assis'
		];

	}

	public function index() {

		$this->render('login', $this->dataReturn);
	}

	public function loginAction() {
		print_r($_POST);
	}

}