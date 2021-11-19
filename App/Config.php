<?php

namespace App;

class Config extends Environment {
		
		const BASE_URL =
		(self::ENVIRONMENT == 'development') ? 'http://localhost/mvc-psr4/' : 'https://mysite.com' ;
		const DB_NAME =
		(self::ENVIRONMENT == 'development') ? 'dev_mvc' : 'db_mvc' ;
		const DB_HOST =
		(self::ENVIRONMENT == 'development') ? 'localhost' : 'db_site.com' ;
		const DB_USER =
		(self::ENVIRONMENT == 'development') ? 'root' : 'db_user' ;
		const DB_PASS =
		(self::ENVIRONMENT == 'development') ? '' : 'db_pass' ;

		const PATH_VIEWS_TWIG = '/../Views/twig';
		
}