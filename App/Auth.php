<?php

namespace App;
use App\Models\Sites;
use App\ResponseCode;

class Auth {
    public function __construct(){
        // $this->SITE_ORIGIN = $this->giveHost($_SERVER['HTTP_HOST']);
        // $this->Sites = Sites::getSite($this->SITE_ORIGIN);
        


        // if (isset($this->Sites['site'])) {
        //     if (isset($this->Sites['status']) && $this->Sites['status']) {
        //         // Decide if the origin in $_SERVER['HTTP_ORIGIN'] is one
        //         // you want to allow, and if so:

        //         header("Access-Control-Allow-Origin: {$_SERVER['REQUEST_SCHEME']}://{$_SERVER['HTTP_HOST']}");
        //         header('Access-Control-Allow-Credentials: true');
        //         header('Access-Control-Max-Age: 86400');    // cache for 1 day
        //     }
        // }else{
        //     $this->ResponseCode = ResponseCode::setCode(401);
        //     echo json_encode(array(
        //             "status" => $this->ResponseCode,
        //             "site" => $this->SITE_ORIGIN,
        //         )
        //     );
            

        //     exit;
        // }

        // // Access-Control headers are received during OPTIONS requests
        // if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {

        //     if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
        //         // may also be using PUT, PATCH, HEAD etc
        //         header("Access-Control-Allow-Methods: GET, POST, OPTIONS");         

        //     if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
        //         header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");

        //     exit(0);
        // }

        
        header("Access-Control-Allow-Origin: * ");
        header('Access-Control-Allow-Credentials: true');
        header('Access-Control-Max-Age: 86400');    // cache for 1 day
    }

    public function giveHost($host_with_subdomain) {
        $array = explode(".", $host_with_subdomain);
        if(count($array) == 4){
            return (array_key_exists(count($array) - 3, $array) ? $array[count($array) - 3] : "").".".$array[count($array) - 2].".".$array[count($array) - 1];
        }else{
            return (array_key_exists(count($array) - 2, $array) ? $array[count($array) - 2] : "").".".$array[count($array) - 1];
        }
    }
}
?>