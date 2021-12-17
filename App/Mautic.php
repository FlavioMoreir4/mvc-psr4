<?php

namespace App;
use \Mautic\Auth\ApiAuth;
use Mautic\Auth\OAuthClient;
use \Mautic\MauticApi;

class Mautic {
    public function __construct(){
        $settings = array(
            'clientKey'    => '1_pawvmgo29rkscs4sk40swskw0gs8gcgww808wco8okcw0ossw',
            'clientSecret' => '3gk8dng0haww8k4cck48cw0o4sk80wg40s0g84gogww8088gog',
            'userName'   => 'flavio',             // Create a new user       
            'password'   => 'Knaks09091919',             // Make it a secure password
        );
        
        // Initiate the auth object specifying to use BasicAuth
        $initAuth = new ApiAuth();
        $auth     = $initAuth->newAuth($settings, 'BasicAuth');
        $timeout  = 10;
        $auth->setCurlTimeout($timeout);
        $apiUrl= 'https://mautic.mktcode.digital/api';
        $this->api        = new MauticApi();

        $this->contactApi = $this->api->newApi('contacts', $auth, $apiUrl);
        $this->campaignApi = $this->api->newApi("campaigns", $auth, $apiUrl);
        $this->segmentApi = $this->api->newApi("segments", $auth, $apiUrl);
    }
}
?>