<?php
$default = 'default';
$routing = array(
    'default'=>array('controller'=>'Index','action'=>'indexAction'),
    'categories'=>array('controller'=>'Category','action'=>'listAction'),
    'categorieswithcount'=>array('controller'=>'Category','action'=>'listWithCountAction'),
    'category'=>array('controller'=>'Category','action'=>'getAction'),
    'ad'=>array('controller'=>'Ad','action'=>'getAction'),
    'ad/add'=>array('controller'=>'Ad','action'=>'addAction'),
    'ad/listbycategory'=>array('controller'=>'Ad','action'=>'listByCategoryAction')
);