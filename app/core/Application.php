<?php
namespace App\Core;

use App\Core\Db;
use App\Core\Routing;

class Application {
    private $routing;
    public $db;

    public function __construct() {
        $this->db=new Database();

        $this->routing=new Routing();

        $class = 'App\Controller\\' . $this->routing->controller;
        $controller=new $class();
        $controller->app=$this;
        $controller->{$this->routing->action}();
    }

    public function header() {
        header('Content-Type: application/json');
        header("Access-Control-Allow-Origin: *");
    }

}