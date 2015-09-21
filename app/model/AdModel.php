<?php
namespace App\Model;

use App\Core\Database;
use App\Model\CategoryModel;

class AdModel extends Database {
    private $name = 'ad';
    private $model;

    public function __construct()
    {
        parent::__construct();
        $this->model = $this->connect($this->name);
    }

    public function Add($params) {
        $modelCategory = new CategoryModel();
        if (!$modelCategory->isCategory($params['category'])) {
            return false;
        }

        $count=$this->model->insertSingle(uniqid(), $params);

        return ($count>0);
    }

    public function getAdsByCategory($id) {
        $query = CPS_Term($id, 'category');
        $documents = $this->model->search($query, null, null, null, null);

        $result=array();
        foreach ($documents as $id => $document) {
            $result[] = $document;
        }

        return $result;

    }

    public function countAdsByCategory($id) {
        $query = CPS_Term($id, 'category');
        $documents = $this->model->search($query, null, null, array('document' => 'no', 'id' => 'yes'), null);

        return count($documents);
    }
}