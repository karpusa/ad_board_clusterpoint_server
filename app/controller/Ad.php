<?php
namespace App\Controller;

use App\Model\CategoryModel;
use App\Model\AdModel;

class Ad {
    public $app;

    public function getAction() {
        $get = $this->app->request->get(
                array('id'),
                array('id'=>'required')
            );
        if (!$get['success']) {
            unset($get['result']);
            //Show errors
            $this->app->renderJson($get);
            return;
        }
        if ($get['success']) {
            $ad = new AdModel();
            $this->app->renderJson(['result'=>$ad->getAd($get['result']['id'])]+(array)$get);
        }
    }

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
            unset($post['result']);
            //Show errors
            $this->app->renderJson($post);
            return;
        }
        if ($post['success']) {
            $ad = new AdModel();
            $this->app->renderJson($ad->Add($post['result']));
        }
    }

    public function listByCategoryAction() {
        $get = $this->app->request->get(
                array('id'),
                array('id'=>'required')
            );
        if (!$get['success']) {
            unset($get['result']);
            //Show errors
            $this->app->renderJson($get);
            return;
        }
        if ($get['success']) {
            $ad = new AdModel();
            $this->app->renderJson(['result'=>$ad->getAdsByCategory($get['result']['id'])]+(array)$get);
        }
    }
}