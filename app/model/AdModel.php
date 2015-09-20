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
        if (!$modelCategory->IsCategory(1)) {
            return false;
        }

        $count=$this->model->insertSingle(uniqid(), $params);

        return ($count>0);
    }
}