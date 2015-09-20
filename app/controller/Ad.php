<?php
namespace App\Controller;

use App\Model\CategoryModel;
use App\Model\AdModel;

class Ad {
    public $app;

    public function addAction() {

        $post = $this->app->request->post(
                array('title', 'message', 'price', 'category'),
                array(
                        'title'=>'required',
                        'message'=>'required',
                        'price'=>'price',
                        'category'=>'int',
                    )
            );

        if (!$post['success']) {
            unset($post['data']);
            //Show errors
            $this->app->renderJson($post);
            return;
        }
        if ($post['success']) {
            $ad = new AdModel();
            $this->app->renderJson([
                    'success' => $ad->Add($post['data'])
                ]);
        }


    }
}