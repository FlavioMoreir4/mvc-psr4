<?php

namespace App;

class Config extends Environment {
		
		const BASE_URL =
		(self::ENVIRONMENT == 'development') ? 'http://localhost/mvc-psr4/' : 'https://mysite.com' ;
		const DB_NAME =
		(self::ENVIRONMENT == 'development') ? 'u960321487_app_api' : 'u960321487_app_api' ;
		const DB_HOST =
		(self::ENVIRONMENT == 'development') ? 'sql543.main-hosting.eu' : 'sql543.main-hosting.eu' ;
		const DB_USER =
		(self::ENVIRONMENT == 'development') ? 'u960321487_app_api' : 'u960321487_app_api' ;
		const DB_PASS =
		(self::ENVIRONMENT == 'development') ? 'SHE150298AwDr' : 'SHE150298AwDr' ;

		const PATH_VIEWS_TWIG = '/../Views/twig';
		const FB_APP_PIXEL = '180989842470107';
		const FB_APP_TOKEN = 'EAAFH4Q7Ot5IBAM2E42w59h2XcORe1A6YLAgs53I5lZA0NtFYGopopjuOwBQI0vRp2rTbAByNQ4ZAdpFwuZBiUhDotprs2xEoA3UPmS4It31bPxoP79WsZAU5ZADAitZC0ZBaCsLFAZB0DZBtKTHaxI9n9UVeW9fsjKOL9CuCZAgVVzEeIZAxGZC60H24';
}