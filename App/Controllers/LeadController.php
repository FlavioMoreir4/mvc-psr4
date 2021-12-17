<?php

namespace App\Controllers;

use App\Mautic;
use App\ResponseCode;
use App\Core\Controller;
use App\Models\Lead;

use Curl\Curl;

class LeadController extends Controller {

	public function __construct() {
		$this->Mautic = new Mautic();
	}

	public function index() {
		$this->render('home', $this->data);

	}

	public function log($args = null) {		
		$this->ResponseCode = ResponseCode::setCode(200);
		$curl = new Curl();
		$curl->post('https://www.ircsystem.com.br/ip/api/atualizaalunos/30818/json', [
			'token' => '741E65359B13A13A8E02C5E8A7A3E1378CDC9179'
		]);


		if ($curl->error) {
			$this->data = [
				'dataReturn' => array(
					"status" => $this->ResponseCode,
					"data" => array(
						"Error" => $curl->errorCode,
						"Message" => $curl->errorMessage
					)
				)			
			];
		} else {
			$this->data = [
				'dataReturn' => array(
					"status" => $this->ResponseCode,
					"data" => array(
						"message" => $curl->response
					)
				)			
			];
		}

		$this->render('home', $this->data);
	}

	public function add($args = null) {
		$Lead = new Lead();
		$result = $Lead->setLead($_POST);

		$parts = explode(" ", $_POST["nome"]);
		if(count($parts) > 1) {
			$lastname = array_pop($parts);
			$firstname = implode(" ", $parts);
		}
		else{
			$firstname = $_POST["nome"];
			$lastname = " ";
		}



		if($result['statusCode'] == 201) {
			$data = array(
				'firstname' => $firstname,
				'lastname'  => $lastname,
				'email'     => $_POST['email'],
				'whatsapp' 	=> $_POST['whatsapp'],
				'interesse'	=> $_POST['interesse'],
				'ipAddress' => $_SERVER['REMOTE_ADDR'],
				'overwriteWithBlank' => true,
			);
			
			$contact = $this->Mautic->contactApi->create($data);
			$segmentId = 1;
			$contactId = $contact['contact']['id'];
			$response = $this->Mautic->segmentApi->addContact($segmentId, $contactId);
			if (!isset($response['success'])) {
				$segments = false;
			}else{
				$segments = $response;
			}
				
		}

		$this->data = [
			'dataReturn' => array(
				"status" => ResponseCode::setCode($result['statusCode']),
				"data" => $result['data'],
				"Mautic" => array(
					"segments" => $segments,
					"contact" => $contact['contact']
				)
			)			
		];

		$this->render('home', $this->data);
	}

}