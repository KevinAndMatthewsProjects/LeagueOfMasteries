
<?php 
            
require_once '/home/ubuntu/workspace/cps_simple.php';

var_dump($_POST);

//Connection hubs
$connectionStrings = array(
	'tcp://cloud-us-0.clusterpoint.com:9007',
	'tcp://cloud-us-1.clusterpoint.com:9007',
	'tcp://cloud-us-2.clusterpoint.com:9007',
	'tcp://cloud-us-3.clusterpoint.com:9007'
);

// Creating a CPS_Connection instance
$cpsConn = new CPS_Connection(
	new CPS_LoadBalancer($connectionStrings),
	'DATABASE NAME',
	'USERNAME',
	'PASSWORD',
	'document',
	'//document/id',
	array('account' => ACCOUNT NUMBER)
);

 $cpsSimple = new CPS_Simple($cpsConn);
$currentCmds = (array)$cpsSimple->search(CPS_Term("cmdExecuter"), 0, 2)['1'];
var_dump($currentCmds);
// Sends an xml request to database to update with request to check a champ
$xmlstr = 
"<?xml version='1.0' standalone='yes'?>
<document>
	<id>1</id>
	<champ>:cmdExecuter</champ>
	<SID>". $currentCmds['SID'] . ";" .$_POST['sid'] . "/" . strtolower($_POST['region']) ."</SID>
</document>";
var_dump ($xmlstr);
$cpsSimple->updateSingle("1", $xmlstr);
            
header('Location: https://riotgamesapi2016-matthewpham.c9users.io/summonerHome.php?summonerName='. str_replace(" ", "", $_POST['name']).'&region=' . $_POST['region']);
            
?>
