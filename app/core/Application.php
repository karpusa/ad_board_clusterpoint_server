<?php
namespace App\Core;

use App\Core\Routing;

class Application {
    private $routing;
    public $db;

    public function __construct() {
        //$this->db=new Database();

        $this->routing=new Routing();

        $class = 'App\Controller\\' . $this->routing->controller;
        $controller = new $class();
        $controller->app = $this;
        $controller->{$this->routing->action}();
    }

    public function headerJson() {
        header('Content-Type: application/json');
        header("Access-Control-Allow-Origin: *");
    }

    public function renderJson($html) {
        $this->headerJson();
        echo json_encode($html);
    }

}