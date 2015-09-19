<?php
namespace App\Controller;

use App\Model\categoryModel;

class Category {
    public $app;

    public function listAction() {
        $category = new CategoryModel();

        $this->app->renderJson($category->getCategories());
    }
}