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
        $id = uniqid();
        $count=$this->model->insertSingle($id, $params);

        return ['success'=>($count>0), 'id'=> $id];
    }

    public function getAd($id) {
        $ad = $this->model->retrieveSingle($id);
        if (isset($ad->category)) {
            $modelCategory = new CategoryModel();
            $category = $modelCategory->getCategory($ad->category);
            $ad->categoryname = $category->name;
        }
        return $ad;
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