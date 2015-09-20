<?php
namespace App\Core;

use App\Core\Routing;
use App\Core\Request;

class Application {
    private $routing;
    public $db;

    public function __construct() {
        //$this->db=new Database();

        $this->routing=new Routing();
        $this->request=new Request();

        $class = 'App\Controller\\' . $this->routing->controller;
        $controller = new $class();
        $controller->app = $this;
        $controller->{$this->routing->action}();
    }

    /**
    * @todo Add to config adress with access allow origin
    **/
    public function headerJson() {
        header('Content-Type: application/json');
        header("Access-Control-Allow-Origin: *");
    }

    public function renderJson($html) {
        $this->headerJson();
        echo json_encode($html);
    }

}