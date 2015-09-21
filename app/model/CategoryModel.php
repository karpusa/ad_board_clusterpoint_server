<?php
namespace App\Model;

use App\Core\Database;
use App\Model\AdModel;

class CategoryModel extends Database {
    private $name = 'category';
    private $model;

    public function __construct()
    {
        parent::__construct();
        $this->model = $this->connect($this->name);
    }

    public function getCategories() {
        $ordering = CPS_StringOrdering('name', 'en', 'ascending');
        $documents = $this->model->search('*', null, null, array('post'=>'no'), $ordering);

        $result=array();
        foreach ($documents as $id => $document) {
            $result[] = $document;
        }

        return $result;
    }

    public function getCategoriesWithCount() {
        $ordering = CPS_StringOrdering('name', 'en', 'ascending');
        $documents = $this->model->search('*', null, null, array('post'=>'no'), $ordering);
        $ad = new AdModel();
        $result=array();
        foreach ($documents as $id => $document) {
            $document->count = $ad->countAdsByCategory($document->id);
            $result[] = $document;
        }

        return $result;
    }

    public function getCategory($id) {
        return $this->model->retrieveSingle($id);
    }

    public function isCategory($id) {
        $category = $this->model->lookupSingle($id, array('document' => 'no', 'id' => 'yes'));
        return isset($category->id);
    }
}