
<?php 
            
require_once '/home/ubuntu/workspace/cps_simple.php';

var_dump($_POST);

if($_POST['clicked'] == "false") {

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
	'DATABSE NAME',
	'USER',
	'PASS',
	'document',
	'//document/id',
	array('account' => ID)
);

 $cpsSimple = new CPS_Simple($cpsConn);
$currentCmds = (array)$cpsSimple->search(CPS_Term("cmdExecuter"), 0, 2)['1'];
var_dump($currentCmds);
$xmlstr = 
"<?xml version='1.0' standalone='yes'?>
<document>
	<id>1</id>
	<champ>:cmdExecuter</champ>
	<SID>". $currentCmds['SID'] . ";" .$_POST['sid'] . "/" . strtolower($_POST['region']) ."</SID>
</document>";
var_dump ($xmlstr);
//$cpsSimple->updateSingle("1", $xmlstr);
            
header('Location: summonerHome.php?summonerName='. str_replace(" ", "", $_POST['name']).'&region=' . $_POST['region'] . '&clicked=true');
}  

if($_POST['clicked'] == "true" || $_POST['clicked'] == "again") {
header('Location: summonerHome.php?summonerName='. str_replace(" ", "", $_POST['name']).'&region=' . $_POST['region'] . '&clicked=again');	
}
//header('Location: summonerHome.php?summonerName='. str_replace(" ", "", $_POST['name']).'&region=' . $_POST['region'] . '&clicked=false');	


?>
