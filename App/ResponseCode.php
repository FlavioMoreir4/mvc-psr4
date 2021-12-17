<?php

namespace App;

class ResponseCode {

	public function __construct() {

	}
	
	static public function setCode($code = NULL) {

		if ($code !== NULL) {
			switch ($code) {
				case 100: $message = 'Continue'; break;
				case 101: $message = 'Trocando protocolos'; break;
				case 200: $message = 'OK'; break;
				case 201: $message = 'Criado'; break;
				case 202: $message = 'Aceito'; break;
				case 203: $message = 'Informação não autorizada'; break;
				case 204: $message = 'Sem conteúdo'; break;
				case 205: $message = 'Redefinir conteúdo'; break;
				case 206: $message = 'Conteúdo parcial'; break;
				case 300: $message = 'Múltiplas escolhas'; break;
				case 301: $message = 'Movido permanentemente'; break;
				case 302: $message = 'Movido temporariamente'; break;
				case 303: $message = 'Ver Outro'; break;
				case 304: $message = 'Não modificado'; break;
				case 305: $message = 'Usar proxy'; break;
				case 400: $message = 'Bad Request'; break;
				case 401: $message = 'Não autorizado'; break;
				case 402: $message = 'Pagamento necessário'; break;
				case 403: $message = 'Proibido'; break;
				case 404: $message = 'Não encontrado'; break;
				case 405: $message = 'Método não permitido'; break;
				case 406: $message = 'Não Aceitável'; break;
				case 407: $message = 'Autenticação de proxy necessária'; break;
				case 408: $message = 'Solicitar tempo limite'; break;
				case 409: $message = 'Conflito'; break;
				case 410: $message = 'Gone'; break;
				case 411: $message = 'Comprimento necessário'; break;
				case 412: $message = 'A condição prévia falhou'; break;
				case 413: $message = 'Solicitar Entidade Muito Grande'; break;
				case 414: $message = 'Request-URI Too Large'; break;
				case 415: $message = 'Tipo de mídia não suportado'; break;
				case 500: $message = 'Erro interno do servidor'; break;
				case 501: $message = 'Não implementado'; break;
				case 502: $message = 'Gateway inválido'; break;
				case 503: $message = 'Serviço indisponível'; break;
				case 504: $message = 'Tempo limite do gateway'; break;
				case 505: $message = 'Versão HTTP não suportada'; break;
				default:
					exit ('Código de status http desconhecido "'. htmlentities ($code). '"');
				break;
			}

			$protocol = (isset($_SERVER['SERVER_PROTOCOL']) ? $_SERVER['SERVER_PROTOCOL'] : 'HTTP/1.0');
			header($protocol . ' ' . $code . ' ' . $message);
			$GLOBALS['http_response_code'] = $code;
			$GLOBALS['http_response_text'] = $message;

		} else {
			$message = (isset($GLOBALS['http_response_text']) ? $GLOBALS['http_response_text'] : 'OK');
			$code = (isset($GLOBALS['http_response_code']) ? $GLOBALS['http_response_code'] : 200);
			
		}
		
		return array(
			'code' => $code,
			'message' => $message
		);

	}
}