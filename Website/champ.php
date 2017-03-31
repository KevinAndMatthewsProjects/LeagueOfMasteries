<?php

    include '/home/ubuntu/workspace/champData.php';

     $parsed_url = parse_url($_SERVER['REQUEST_URI']);
    $query = explode("&", $parsed_url['query']);
    
   
     $champName = (explode("=", $query[0])[1]) ;
     
     $champData = getAllChampData()['data'][ucfirst($champName)];
     $champName = $champData['name'];
     
     
    // var_dump($champData);

require_once '/home/ubuntu/workspace/cps_simple.php';

// Connection hubs
$connectionStrings = array(
	'tcp://cloud-us-0.clusterpoint.com:9007',
	'tcp://cloud-us-1.clusterpoint.com:9007',
	'tcp://cloud-us-2.clusterpoint.com:9007',
	'tcp://cloud-us-3.clusterpoint.com:9007'
);

// Creating a CPS_Connection instance
$cpsConn = new CPS_Connection(
	new CPS_LoadBalancer($connectionStrings),
	'riotgamesapi',
	'matthewpham55@gmail.com',
	'Matthewpham200',
	'document',
	'//document/id',
	array('account' => 102249)
);

$cpsSimple = new CPS_Simple($cpsConn);



?>
<!DOCTYPE html>
<html>
    <title><?php echo $champName ?></title>
   <head>
<meta charset="utf-8" />
<meta http-equiv='Content-Type' content='text/html; charset=utf-8'>
<script type="text/javascript">
function altRows(id){
	if(document.getElementsByTagName){  
		
		var table = document.getElementById(id);  
		var rows = table.getElementsByTagName("tr"); 
		 
		for(i = 0; i < rows.length; i++){          
			if(i % 2 == 0){
				rows[i].className = "evenrowcolor";
			}else{
				rows[i].className = "oddrowcolor";
			}      
		}
	}
}
window.onload=function(){
	altRows('alternatecolor');
}
</script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-77658836-1', 'auto');
  ga('send', 'pageview');

</script>

   </head>
   <link rel="icon" href="/img/Mastery.png">
<style>
body {

    background-image: <?php echo 'url("/img/'. $champName .'.gif")' ?>;
    background-repeat: no-repeat;
    -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
 background-attachment: fixed;
    background-position: center; 
}
div.background {
    background: url(klematis.jpg) repeat;
    border: 2px solid black;
}

div.transbox {
    margin: 30px;
    background-color: #ffffff;
    border: 1px solid black;
    opacity: 0.7;
    filter: alpha(opacity=60); /* For IE8 and earlier */
}

div.transbox p {
    margin: 5%;
    font-weight: bold;
    color: #000000;
}
ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #333;
}

li {
    float: left;
}

li a {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}


.active {
background-color:#33ccff;
}
a {
  color: #900;
  text-decoration: none;
}



table.altrowstable {
	font-family: verdana,arial,sans-serif;
	font-size:14px;
	color:#333333;
	border-width: 1px;
	border-color: #45686e;
	border-collapse: collapse;
	opacity: 100;
}
table.altrowstable th {
	border-width: 1px;
	padding: 8px;
	border-style: solid;
	border-color: #a9c6c9;
}
table.altrowstable td {
	border-width: 1px;
	padding: 8px;
	border-style: solid;
	border-color: #a9c6c9;
}
.oddrowcolor{
	background-color:#d4e3e5;
}
.evenrowcolor{
	background-color:#c3dde0;
}
h1 {
	font-family: Verdana, Geneva, sans-serif;
	font-size: 48px;
	font-style: normal;
	font-variant: normal;
	font-weight: 500;
	line-height: 26.4px;
}
h3 {
	font-family: Verdana, Geneva, sans-serif;
	font-size: 14px;
	font-style: normal;
	font-variant: normal;
	font-weight: 500;
	line-height: 15.4px;
}
p {
	font-family: Verdana, Geneva, sans-serif;
	font-size: 14px;
	font-style: normal;
	font-variant: normal;
	font-weight: 400;
	line-height: 20px;
}
blockquote {
	font-family: Verdana, Geneva, sans-serif;
	font-size: 21px;
	font-style: normal;
	font-variant: normal;
	font-weight: 400;
	line-height: 30px;
}
pre {
	font-family: Verdana, Geneva, sans-serif;
	font-size: 13px;
	font-style: normal;
	font-variant: normal;
	font-weight: 400;
	line-height: 18.5714px;
}
a.tooltip {outline:none; }
a.tooltip strong {line-height:30px;}
a.tooltip:hover {text-decoration:none;} 
a.tooltip span {
    z-index:10;display:none; padding:14px 20px;
    margin-top:60px; margin-left:-160px;
    width:300px; line-height:16px;
}
a.tooltip:hover span{
    display:inline; position:absolute; 
    border:2px solid #FFF;  color:#EEE;
    background:#333 url(cssttp/css-tooltip-gradient-bg.png) repeat-x 0 0;
}
.callout {z-index:20;position:absolute;border:0;top:-14px;left:120px;}
    
/*CSS3 extras*/
a.tooltip span
{
    border-radius:2px;        
    box-shadow: 0px 0px 8px 4px #666;
    /*opacity: 0.8;*/
}
#inner {
    width: 50%;
    margin: 0 auto; 
}

</style>

<ul>
  <li><a href="https://riotgamesapi2016-matthewpham.c9users.io/index.php">Home</a></li>
  <li><a class="active" href="https://riotgamesapi2016-matthewpham.c9users.io/builds.php">Champion Builds</a></li>
  <li><a href="https://riotgamesapi2016-matthewpham.c9users.io/about.php">About</a></li>
</ul>
<body>
<div class="background">
  <div class="transbox">
      <center>
           <h1><?php echo $champName ?></h1>
           <?php if($champName == "Wukong") { 
           $imgName = "MonkeyKing";
           } else if($champName == "Cho'Gath") {
               $imgName = "Chogath";
           } else if ($champName == "Dr. Mundo") {
               $imgName = "DrMundo";
           } else if($champName ==  "Fiddlesticks") {
               $imgName = "FiddleSticks";
           }
           else if($champName ==  "Kog'Maw") {
               $imgName = "KogMaw";
           }
           else if($champName ==  "Rek'Sai") {
               $imgName = "RekSai";
           }
           else if($champName ==  "Vel'Koz") {
               $imgName = "Velkoz";
           }
           else if($champName ==  "Kha'Zix") {
               $imgName = "Khazix";
           }
           else if($champName ==  "LeBlanc") {
               $imgName = "Leblanc";
           } 
           
           
           else {$imgName = str_replace(" ", "", $champName);}
           ?>
            <img src="http://ddragon.leagueoflegends.com/cdn/6.8.1/img/champion/<?php echo $imgName ?>.png" width=120px; height=120px;>
    <br>
<?php   include '/home/ubuntu/workspace/summonerHome.php'; 
include '/home/ubuntu/workspace/allItemData.php';
include '/home/ubuntu/workspace/allSpellData.php';
echo " <h2><b><i>". $champData['title'] ."</i></b></h2> ";
$allItemData = getAllItemData();
//var_dump($allItemData);
$allSpellData = getAllSpellData();
//var_dump($allItemData);

?>
    <p>
       
        <br>
        

    <?php
  //  echo "<h1>Aatrox</h1>";
   

//$documents2 = $cpsSimple->search($query2);
//$docuemnts = (array) array_merge($documents1, $documents2);
//var_dump($docuemnts);
 function getProfileIconUrl2($summonerName, $region = "na") {
   //  echo $SID;
       // $summonerName = getNameFromId($SID, $region);
    $urlSummonerName = str_replace(" ","%20",$summonerName);
      return 'https://avatar.leagueoflegends.com/'. $region.'/' . $urlSummonerName .'.png'; 
   }
  
  
   

echo '<table class=altrowstable id=alternatecolor>';


echo "<tr>";

//echo "<th></th>";
echo "<th><img src= http://ddragon.leagueoflegends.com/cdn/5.5.1/img/ui/champion.png width=25px height=25px></img> Summoner</th>";
echo "<th> Region </th>";
echo "<th> Role </th>";
echo "<th><img src= ui/spells.png ></img>Summoner Spells</th>";
echo "<th><img src= ui/items.png ></img>Items</th>";
echo "<th><img src= ui/score.png ></img>KDA</th>";
echo "<th><img src= ui/minion.png></img>CS</th>";
echo "<th><img src= ui/gold.png></img>Gold Earned</th>";
echo "<th><img src= /img/Mastery.png width=30px height=25px></img>Mastery Score</th>";
echo "</tr>";
echo "<tr>";
 echo'<tr><h2>Players with a High Mastery Score on '. $champName . ' Have Built:</h2><br><br></tr>';
     ini_set('xdebug.var_display_max_depth', 5);
ini_set('xdebug.var_display_max_children', 256);
ini_set('xdebug.var_display_max_data', 2000);
$documentCounter = 0;
$itemCounter = array();
$allDocSizes = 0;
for($j=0;$j<2;$j++) {
if($j==0) {
$query1 = CPS_Term($champName . " CHALLENGER");
$documents = $cpsSimple->search($query1, 0 , 3);
$allDocSizes = sizeof($documents);
//echo $allDocSizes;
} else if ($j == 1) {
   $query1 = CPS_Term($champName); 
   $documents = $cpsSimple->search($query1, 0 , 15);
   $allDocSizes = $allDocSizes + sizeof($documents);
   //echo $allDocSizes;
} else {
    break;
}
//$query2 = CPS_Term('Zed');

$docMax = 10;

foreach ($documents as $id => $document) {

    if((string)$document->id == "1") {
        continue;
    }

   // var_dump(json_decode((string)$document->data));
   
    $json = json_decode(ltrim((string)$document->data, ":"), true);
        if($documentCounter < $docMax) {
    $currentSID = ltrim((string)($document->SID), ":");
    $region = ltrim((string)($document->region), ":");
    $summonerData = getSummonerData($currentSID, $region);
    $summonerName = $summonerData['name'];
    $summonerIcon = $summonerData['profileIconId'];
   // echo $summonerIcon;
//    var_dump($summonerData);
    $role = $json['stats']['playerPosition'];
   // var_dump($role);
    if($role == 1) {$role = "Top"; }
    if($role == 2) {$role = "Mid"; }
    if($role == 3) {$role = "Jungle"; }
    if($role == 4) {
        $role = $json['stats']['playerRole'];
            if($role == 1) {$role = "Duo"; }
            if($role == 2) {$role = "Support"; }
            if($role == 3) {$role = "Bot"; }
            if($role == 4) {$role = "Solo"; }
    }
    
    //var_dump($json);
   // var_dump((string)$document->data);
   //var_dump ($json);
   
   echo "<tr>";
    echo '<td>  <img src=profileicon/' . $summonerIcon  . '.png> <a href=http://matchhistory.na.leagueoflegends.com/en/#match-details/'. RegionToServer($region) .'/'.ltrim($document->MatchId, ":") . '?tab=overview target="_blank">' . $summonerName . '</a> </td>';
    echo '<td>' . strtoupper($region) . '</td>';
    echo '<td> <img src="/img/' .  $role . '.png" onerror="putErrorPic(this)" style="border:0px;margin:0px" ><br>'. $role.'</td> ';
   // echo '<td> <img src="http://ddragon.leagueoflegends.com/cdn/6.9.1/img/champion/' .  champIdtoName($json['championId']) . '.png width=60px height=60px style="border:0px;margin:0px" ></td> ';
 // var_dump ($allSpellData[($json['spell1'])]);
   $spell1 = ($allSpellData[($json['spell1'])]);
   $spell2 = $allSpellData[($json['spell2'])];
  //var_dump($allSpellDatap[($json['spell1'])]);
     echo  "<td><a href=\"#\" class=\"tooltip\"> <img src=spells/" . $spell1['key'] . ".png hspace=5 vspace=5 ><span><img class=\"callout\" src=\"/img/callout_black.gif\" /><strong><i>". $spell1['name'] . "</i></strong><br>". $spell1['description'] . "</span></a>";
          echo  "<a href=\"#\" class=\"tooltip\"><img src=spells/" . $spell2['key'] . ".png hspace=5 vspace=5 ><span><img class=\"callout\" src=\"/img/callout_black.gif\" /><strong><i>". $spell2['name'] . "</i></strong><br>". $spell2['description'] . "</span></a></td>";
    echo '<td>';
        }
        for($i=0;$i<7;$i++) {
          //  var_dump(($json['stats']['item' . $i]));
            
            $itemnum = ($json['stats']['item' . $i]);
            if($itemnum == 1300 || $itemnum == 1300 ||  $itemnum == 1300 ||  $itemnum == 1300) { $itemnum = 3006; }
            if($itemnum == 1325 || $itemnum == 1326 ||  $itemnum == 1327 ||  $itemnum == 1328) { $itemnum = 3117; }
            if($itemnum == 1305 || $itemnum == 1306 ||  $itemnum == 1307 ||  $itemnum == 1308) { $itemnum = 3009; }
            if($itemnum == 1330 || $itemnum == 1331 ||  $itemnum == 1332 ||  $itemnum == 1333) { $itemnum = 3158; }
            if($itemnum == 1320 || $itemnum == 1321 ||  $itemnum == 1322 ||  $itemnum == 1323) { $itemnum = 3111; }
            if($itemnum == 1315 || $itemnum == 1316 ||  $itemnum == 1317 ||  $itemnum == 1318) { $itemnum = 3047; }
            if($itemnum == 1310 || $itemnum == 1311 ||  $itemnum == 1312 ||  $itemnum == 1313) { $itemnum = 3020; }
            if($itemnum == 3931) {$itemnum = 3006; }
            
            if($itemnum != null) {
            $currentItemData = $allItemData[$itemnum];
            if($itemCounter[$itemnum] == null) {
                $itemCounter[$itemnum] = 0;
            }
            $itemCounter[$itemnum]++;
                if($documentCounter < $docMax) {
            echo '<a href="#" class="tooltip"><img src=items/' . $json['stats']['item' . $i] . '.png  onerror="putErrorPic(this)"/><span><img class="callout" src="/img/callout_black.gif"/><strong><i>' . $currentItemData['name'] .'</i></strong><br>'. $currentItemData['description'] . '</span></a>';
                }
          //  echo "[" . $itemnum . "]";
                
            } 
        }
        if($documentCounter < $docMax) {
    echo "</td>";
    $kills = $json['stats']['championsKilled'];
    $deaths =  $json['stats']['numDeaths'];
    $assists = $json['stats']['assists'];
    if($kills == "") {$kills = "0";}
    if($deaths == "") {$deaths = "0";}
    if($assists == "") {$assists = "0";}
    echo ("<td>" .  $kills . "/" . $deaths . "/" . $assists  . "</td>");
    echo  "<td>" . $json['stats']['minionsKilled'] . "</td>";
    echo  "<td>" . round($json['stats']['goldEarned']/1000,1) . "k</td>";    
  //  echo $region . "  " . RegionToServer($region);
    echo "<td>" . number_format(getMastery($currentSID, $json['championId'], $region)['championPoints'], 0, ".", ",") . "</td>";
  //  var_dump( getMastery($currentSID, $json['championId'], $region));
     $rankdata = getLeague($currentSID, $region)[$currentSID][0];
 //   var_dump($rankdata['entries'][0]['division']);
     $rank = $rankdata['tier'] . "%20" .  $rankdata['entries'][0]['division'];
     //echo $rank;
     if($rank == "%20") {
         $rank = "Unranked";
     }
   echo "<td><img src=/img/".$rank.".png  width=50px height=50px></img ></td>";

//	echo $json['stats']['item0'];
	echo '</tr>';
        }
	$documentCounter++;
}

}


    echo "</table>";
//     arsort($itemCounter);
//   // var_dump($itemCounter);
//     echo '<table>';
    
//     echo "<br>";
//     echo "<br>";
//     echo "<br>";
//     echo "<br>";
    
// //    var_dump($itemCounter);
//     $counter = 0;
//   foreach($itemCounter as $itemId => $count) {
//       if($counter > 10) { break; }
//       echo '<td>';
//         $currentItemData = $allItemData[$itemId]; 
//         if( !($currentItemData['into']) == null && $currentItemData['group'] != "BootsUpgrades") {
//             continue;
//         }
// echo"<div class=\"inner\">";
//         echo '<a href="#" class="tooltip"><img src=items/' . $itemId . '.png  onerror="putErrorPic(this)"/><span><img class="callout" src="/img/callout_black.gif"/><strong><i>' . $currentItemData['name'] .'</i></strong><br>'. $currentItemData['description'] . '</span></a><p> was bought ' . round($count/$allDocSizes*100, 1) . "% of the time";
//         echo '</td>';

//         echo"</div>";
//     $counter++;
   
// }
    
//     echo '</table>';
//     echo '<br>';
//     echo "<h2><b> Based off of " . sizeof($documents) . " " . $champName. " "." players</b></h2>";
//     

   
   $analysis = $cpsSimple->search(CPS_Term("cmdExecuter"), 0 , 1);
    foreach ($analysis as $id => $document) {
         $json = json_decode(ltrim((string)$document->data, ":"), true);
         $analysis = ($json['data'][$champName]);
         $items = ($analysis['items']);
         arsort($items);
         echo "<table>";
         echo "<tr>";
         foreach($items as $itemId => $percent) {
              $currentItemData = $allItemData[$itemId]; 
              echo "<td>";
             echo '<a href="#" class="tooltip"><img src=items/' . $itemId . '.png  onerror="putErrorPic(this)"/><span><img class="callout" src="/img/callout_black.gif"/><strong><i>' . $currentItemData['name'] .'</i></strong><br>'. $currentItemData['description'] . '</span></a><p> was bought ' . $items[$itemId] * 100 . "% of the time";
            echo "</td>";
             
         }
                  echo "</table>";
         echo "</tr>";
         break;
    }

    echo "<h2><b> Based off of " . $analysis['total'] . " " . $champName. " "." players</b></h2>";

?>
     <br>
     <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- BottomofChamp page -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-5131954728483500"
     data-ad-slot="8426277470"
     data-ad-format="auto"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
<br>
<br>
     <br>
    League of Masteries isn&#8217;t endorsed by Riot Games and doesn&#8217;t reflect the views or opinions of Riot Games or anyone officially involved in producing or managing League of Legends. League of Legends and Riot Games are trademarks or registered trademarks of Riot Games, Inc. League of Legends &#169; Riot Games, Inc.
    </p>
    </center>
  </div>
</div>
    
    
</body>
    
<script type="text/javascript">
    function putErrorPic(ele) {
    ele.width = "0px";
    ele.src = "";
}
</script>
<br>
<br>
  
    
</html>