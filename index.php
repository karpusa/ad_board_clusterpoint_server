<?php
require __DIR__ . '/vendor/autoload.php';

// Connection hubs
$connectionStrings = array(
    'tcp://cloud-eu-0.clusterpoint.com:9007',
    'tcp://cloud-eu-1.clusterpoint.com:9007',
    'tcp://cloud-eu-2.clusterpoint.com:9007',
    'tcp://cloud-eu-3.clusterpoint.com:9007'
);

// Creating a CPS_Connection instance
$cpsConn = new CPS_Connection(
    new CPS_LoadBalancer($connectionStrings), 'category', 'aduser', 'ad12345', 'document',
    '//document/id', array('account' => 1907)
);

$cpsConn->setDebug(true);
$cpsSimple = new CPS_Simple($cpsConn);

//$document = $cpsSimple->retrieveSingle('1');
//echo $document->title . '<br />';
