<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\SampleClass;

class HomeController extends Controller {

	public function __construct() {

		$this->SampleClass = new SampleClass();

		$this->dataReturn = [ 'message' => 'Hello World!' ];

	}

	public function index() {

		$this->render('home', $this->dataReturn);

	}

	public function test($id= null) {
		if($id) {
			$this->dataReturn['message'] = 'Hello World! '.$id;
		}
		$this->render('home', $this->dataReturn);

	}

}