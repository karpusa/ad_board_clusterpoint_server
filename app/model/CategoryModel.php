<?php
namespace App\Model;

use App\Core\Database;

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

    public function getCategory($id) {
        $category = $this->model->retrieveSingle($id);
        return $category;
    }

    public function isCategory($id) {
        $category = $this->model->lookupSingle($id, array('document' => 'no', 'id' => 'yes'));
        return isset($category->id);
    }
}