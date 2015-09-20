<?php
$default = 'default';
$routing = array(
    'default'=>array('controller'=>'Index','action'=>'indexAction'),
    'categories'=>array('controller'=>'Category','action'=>'listAction'),
    'category'=>array('controller'=>'Category','action'=>'getAction'),
    'ad/add'=>array('controller'=>'Ad','action'=>'addAction')
);