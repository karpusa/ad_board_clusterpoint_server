<?php
    spl_autoload_extensions('.php');
    spl_autoload_register();

    require __DIR__ . '/vendor/autoload.php';

    use App\Core\Application;

    $app=new Application();

//$document = $cpsSimple->retrieveSingle('1');
//echo $document->title . '<br />';