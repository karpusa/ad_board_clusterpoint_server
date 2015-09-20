<?php
namespace App\Core;

class Database {
    private $db;

    public $connectionStrings = array(
        'tcp://cloud-eu-0.clusterpoint.com:9007',
        'tcp://cloud-eu-1.clusterpoint.com:9007',
        'tcp://cloud-eu-2.clusterpoint.com:9007',
        'tcp://cloud-eu-3.clusterpoint.com:9007'
    );

    public function __construct()
    {
        include dirname(__FILE__).'/../config/config.php';
        $this->db = $db;
        unset($db);
    }

    public function connect($dbname) {
        if (!isset($this->db[$dbname])){
            return false;
        }
        //if cached
        if ($this->{$dbname}){
            return $this->{$dbname};
        }
        $CPSConnection = new \CPS_Connection(
            new \CPS_LoadBalancer($this->connectionStrings),
            $dbname,
            $this->db[$dbname]['username'],
            $this->db[$dbname]['password'],
            $this->db[$dbname]['documentRootXpath'],
            $this->db[$dbname]['documentIdXpath'],
            $this->db[$dbname]['params']
        );
        //$CPSConnection->setDebug(true);
        $this->{$dbname} = new \CPS_Simple($CPSConnection);
        return $this->{$dbname};
    }

}