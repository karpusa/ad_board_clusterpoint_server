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
        $ordering = CPS_StringOrdering('name', 'lv', 'ascending');
        $documents = $this->model->search('*', null, null, array('post'=>'no'), $ordering);

        $result=array();
        foreach ($documents as $id => $document) {
            $result[] = $document;
        }

        return $result;
    }

    public function IsCategory($id) {
        $category = $this->model->lookupSingle($id, array('document' => 'no', 'id' => 'yes'));
        return isset($category->id);
    }
}