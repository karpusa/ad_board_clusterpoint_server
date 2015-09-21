<?php
namespace App\Controller;

use App\Model\CategoryModel;

class Category {
    public $app;

    public function listAction() {
        $category = new CategoryModel();
        $this->app->renderJson($category->getCategories());
    }

    public function listWithCountAction() {
        $category = new CategoryModel();
        $this->app->renderJson($category->getCategoriesWithCount());
    }

    public function getAction() {
        $get = $this->app->request->get(
                array('id'),
                array('id'=>'int')
            );

        if (!$get['success']) {
            unset($get['result']);
            //Show errors
            $this->app->renderJson($get);
            return;
        }

        if ($get['success']) {
            $category = new CategoryModel();
            $this->app->renderJson(['result'=>$category->getCategory($get['result']['id'])]+(array)$get);
        }
    }
}