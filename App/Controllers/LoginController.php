<?php

namespace App\Controllers;

use App\Core\Controller;

class LoginController extends Controller {

	public function __construct() {

		$this->dataReturn = [
			'pageTitle' => 'Login',
			'pageScript' => 'login.js',
			'pageStyles' => 'login.css'
		];

	}

	public function index() {

		$this->render('login', $this->dataReturn);
	}

	public function loginAction() {
		print_r($_POST);
	}

}