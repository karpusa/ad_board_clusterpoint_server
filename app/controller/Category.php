<?php
namespace App\Controller;

class Category {
    public $app;

    public function listAction() {
        $category = $this->app->db->connect('category');

        $ordering = CPS_StringOrdering('name', 'lv', 'ascending');
        $documents = $category->search('*', null, null, null, $ordering);

        $result=array();
        foreach ($documents as $id => $document) {
            $result[] = $document;
        }
        $this->app->header();
        echo json_encode($result);
    }


}