<?php

namespace App\Core;

use App\Core\RouterBase;

class Router extends RouterBase {
    
    public $Routes;

    public function get(string $endpoint, string $trigger) {
        $this->Routes['get'][$endpoint] = $trigger;
    }

    public function post(string $endpoint, string $trigger) {
        $this->Routes['post'][$endpoint] = $trigger;
    }

    public function put(string $endpoint, string $trigger) {
        $this->Routes['put'][$endpoint] = $trigger;
    }

    public function delete(string $endpoint, string $trigger) {
        $this->Routes['delete'][$endpoint] = $trigger;
    }

}