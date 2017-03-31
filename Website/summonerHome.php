
    <?php

    $base = "https://". $region .".api.pvp.net";
    $key = "KEY";

    $parsed_url = parse_url($_SERVER['REQUEST_URI']);
    $query = explode("&", $parsed_url['query']);
    
   
    if(explode("=", $query[0])[0] == "summonerName") {
    
    $clickedState = explode("=", $query[2])[1];
    // echo '[' . $clickedState . ']';
     $summonerName = explode("=", $query[0])[1];

     $summoner = str_replace('+', '', $summonerName);
     $summoner = strtolower($summoner);
     
     $region = explode("=", $query[1])[1];
     $SID = getSummonerIdByName($summoner, $region);
     
     $summonerName = getNameFromId($SID, $region);
    $urlSummonerName = str_replace(" ","+",$summonerName);
     
     $rankdata = getLeague($SID, $region)[$SID][0];
    
     $rank = $rankdata['tier'] . " " .  $rankdata['entries'][0]['division'];
     if($rank == " ") {
         $rank = "Unranked";
     }
     $rankName = $rankdata['name'];
     
     $summonerIdArray = array();
    $championIdArray = array();
     $teamIdArray = array();
     $scoreIdArray = array();
     
     $bestchamp = champIdtoName(getTopMastery($SID, $region)['championId']);
    
    
    $team1totalScore = 0;
    $team2totalScore = 0;
    
    }
    
      
   //     var_dump($apiKeys);
    $apiCounter = 0;
    
    function getKey() {
         $apiKeys = array(KEYS);
        //echo $GLOBALS['apiCounter'];
        $GLOBALS['apiCounter'] = $GLOBALS['apiCounter'] + 1;
        if($GLOBALS['apiCounter'] == sizeof($apiKeys)) {
            $GLOBALS['apiCounter'] = 0;
        }
       // echo $GLOBALS['apiCounter'];
       // var_dump ($apiKeys[$GLOBALS['apiCounter']]);
      return $apiKeys[$GLOBALS['apiCounter']];
    }
    
    function getWinChance($SID, $region) {
        
        
      
    $gameInfo = getCurrentGameInfo($SID, $region);
    
    if($gameInfo == null) {
        $msg =  $GLOBALS['summonerName'] . " is not currently in a game. <br> Check again when " . $GLOBALS['summonerName'] .  " is in game to see their chance of winning ";
     	echo $msg;  
        return null;
    }
     
    //$gameInfo['participants']
     //var_dump(getDataFromList($gameInfo, "participant", null));
   // $GLOBALS['summonerIdArray'];
    
    

    
     foreach ($gameInfo['participants'] as $particiapnt) {
         //echo $particiapnt['summonerId'];
         array_push($GLOBALS['summonerIdArray'], $particiapnt['summonerId'] );
         array_push($GLOBALS['championIdArray'], $particiapnt['championId'] );
         array_push($GLOBALS['teamIdArray'], $particiapnt['teamId'] );
        
     }
     
    
     
     $team1isme = false;
     $team1score = 0;
     $team2score = 0;
     
    // echo sizeof($GLOBALS['teamIdArray']);
     //echo sizeof($GLOBALS['$summonerIdArray']);

     
     for($i=0;$i<sizeof($GLOBALS['teamIdArray']);$i++) {
 
         	if($GLOBALS['teamIdArray'][$i] == "100"  && $GLOBALS['summonerIdArray'][$i] == $SID) {
				$team1isme = true;
			}
			//echo "\xA";
			///echo ("[" . $GLOBALS['$summonerIdArray'][$i] . "] [" . $GLOBALS['championIdArray'][$i] . "]" . "\n");
		//	echo RegionToServer("   " . $region . "   ");
			$score = getMastery($GLOBALS['summonerIdArray'][$i], $GLOBALS['championIdArray'][$i],$region)['championPoints'];
			array_push($GLOBALS['scoreIdArray'], $score);
		//	var_dump($score);
			if($GLOBALS['teamIdArray'][$i] == "100" ) {
			  //  var_dump($score);
				$team1score = $team1score + $score;
			} else {
				$team2score = $team2score + $score;
			}
		        
     }
        
        $GLOBALS['team1totalScore'] = $team1score;
        $GLOBALS['team2totalScore'] = $team2score;
     
     	$normalizedTeam1Score = 0;
		$normalizedTeam2Score = 0;
		
		$normalizedTeam1Score = ($team1score / ($team1score + $team2score));
		$normalizedTeam2Score = ($team2score / ($team1score + $team2score));
		

     
     		if($team1isme) {
     		$msg =  ($GLOBALS['summonerName'] ." has a " . round(($normalizedTeam1Score *100),2) . "% chance of winning their current game.");
     		echo $msg;
            return round(($normalizedTeam1Score *100),2);
			//JOptionPane.showMessageDialog(null, "You have a " + (normalizedTeam1Score *100) + "% chance of winning their current game.");
		} else {
			$msg =  ($GLOBALS['summonerName'] ." has a " . round(($normalizedTeam2Score *100),2) . "% chance of winning their current game.");
     		echo $msg;
     		return round(($normalizedTeam2Score *100),2);
			//JOptionPane.showMessageDialog(null, "You have a " + (normalizedTeam2Score *100) + "% chance of winning their current game.");
		}
    
    }
    
    function getLeague($SID, $region) {
        $url = "https://". $region .".api.pvp.net/api/lol/" . strtolower($region) . "/v2.5/league/by-summoner/" . $SID . "/entry?api_key=" . getKey();
	    //echo $url;
		return getJsonFromUrl($url);
		//https://". $region .".api.pvp.net/api/lol/na/v1.3/stats/by-summoner/50792611/ranked?season=SEASON2016&api_key=691c2e55-2706-4190-92c3-956f46f67ab7
		
	
    }
    
    function getTopMastery($SID, $region) {
        //https://". $region .".api.pvp.net/championmastery/location/na1/player/50792611/topchampions?count=1&api_key=691c2e55-2706-4190-92c3-956f46f67ab7
      $url = "https://". $region .".api.pvp.net/championmastery/location/" . RegionToServer($region) . "/player/" . $SID . "/topchampions?count=1&api_key=" . getKey();
        return getJsonFromUrl($url, null)[0];
    }
    
        function getTop3Mastery($SID, $region) {
        //https://". $region .".api.pvp.net/championmastery/location/na1/player/50792611/topchampions?count=1&api_key=691c2e55-2706-4190-92c3-956f46f67ab7
      $url = "https://". $region .".api.pvp.net/championmastery/location/" . RegionToServer($region) . "/player/" . $SID . "/topchampions?count=3&api_key=" . getKey();
        return getJsonFromUrl($url, null);
    }
    
    function getMastery($SID, $champID, $region) {
        $url = "https://". $region .".api.pvp.net/championmastery/location/" . RegionToServer($region) . "/player/" . $SID . "/champion/" . $champID . "?api_key=" . getKey();   
      //  echo $url;
        $response =  getJsonFromUrl($url, null);
        
        if($response === null) {
            //echo "No mastery is present for the given champion-summoner summoner: [" . $SID . "] champion: [" . $champID . "]";
            return 0;
        } else {
            return $response;
        }
        
    }
    
    function getDataFromList($jsonWithArray, $arrayTag, $data) {
       // $array = $jsonWithArray[$arrayTag];
        return $jsonWithArrayarray;
    }
    
    function getNameFromId($SID, $region = "na") {
        //https://". $region .".api.pvp.net/api/lol/na/v1.4/summoner/50792611?api_key=691c2e55-2706-4190-92c3-956f46f67ab7
        $url = "https://". $region .".api.pvp.net/api/lol/" . $region . "/v1.4/summoner/" . $SID . "?api_key=" . getKey();
        return getJsonFromUrl($url, null)[$SID]['name'];
    }
    
    function getSummonerData($SID, $region = "na") {
        //https://". $region .".api.pvp.net/api/lol/na/v1.4/summoner/50792611?api_key=691c2e55-2706-4190-92c3-956f46f67ab7
        $url = "https://". $region .".api.pvp.net/api/lol/" . $region . "/v1.4/summoner/" . $SID . "?api_key=" . getKey();
        return getJsonFromUrl($url, null)[$SID];
    }
    
    function RegionToServer($region) {
      //  echo " Incoming Region " . $region. " ";

        if($region === "na" || $region === "NA") {
            //echo "asdasd";
            return "NA1";
        }    
         if($region === "eune" || $region === "EUNE") {
             
            return "EUN1";
        } 
          if($region === "euw" || $region === "EUW")  {
            
            return "EUW1";
        }      
        
    }
         
    function getCurrentGameInfo($SID, $region) {
        $url = "https://". $region .".api.pvp.net/observer-mode/rest/consumer/getSpectatorGameInfo/" . $region . "1/" . $SID . "?api_key=" . getKey();
        //Base + "/observer-mode/rest/consumer/getSpectatorGameInfo/NA1/" + summonerId + "?api_key=" + key
        $response =  getJsonFromUrl($url, null);
       // echo $url;
      //  echo "[" . $response . "]";
        if($response == null) {
           // echo "Summoner is not in game";
            return null;
        } else {
            return $response;
        }
    }
    
    function champIdtoName($champID, $region="na") {
        //https://global.api.pvp.net/api/lol/static-data/na/v1.2/champion/55555?api_key=691c2e55-2706-4190-92c3-956f46f67ab7
        $url = "https://global.api.pvp.net/api/lol/static-data/" . strtolower($region) . "/v1.2/champion/" . $champID . "?api_key=" . getKey();
       // echo $url;
        return getJsonFromUrl($url, null)['name'];
    }
    
        function getChampData($champID, $region="na") {
        //https://global.api.pvp.net/api/lol/static-data/na/v1.2/champion/55555?api_key=691c2e55-2706-4190-92c3-956f46f67ab7
        $url = "https://global.api.pvp.net/api/lol/static-data/" . strtolower($region) . "/v1.2/champion/" . $champID . "?api_key=" . getKey();
       // echo $url;
        return getJsonFromUrl($url, null);
    }
     
    function getSummonerIdByName($name, $region ="na") {
        $url = "https://". $region .".api.pvp.net/api/lol/" . strtolower($region) . "/v1.4/summoner/by-name/" . $name . "?api_key=" . getKey();
        return getJsonFromUrl($url, null)[$name]['id'];
    }
    
    
    
    function getItemData($itemId, $region = "na") {
        $url = "https://global.api.pvp.net/api/lol/static-data/". $region ."/v1.2/item/". $itemId ."?api_key=691c2e55-2706-4190-92c3-956f46f67ab7";
        return getJsonFromUrl($url, null);
    }
     
   
   function getProfileIconUrl() {
      echo 'https://avatar.leagueoflegends.com/na/' . $GLOBALS['urlSummonerName'] .'.png'; 
   }
   
   function getSummonerSpellName($spellId, $region = "na") {
     
     $url = "https://global.api.pvp.net/api/lol/static-data/" . $region ."/v1.2/summoner-spell/" . $spellId  . "?spellData=key&api_key=" . getKey();
       // echo $url;
        return getJsonFromUrl($url, null);
   }
   
   function getJsonFromUrl($url, $errorUrl ="https://riotgamesapi2016-matthewpham.c9users.io/") {
    //$url = ('https://". $region .".api.pvp.net/api/lol/'  . $region . '/v1.4/summoner/by-name/'  . $summonerName. '?api_key=' . $key);
   // echo $url;
     $response = @file_get_contents($url);
     //var_dump($http_response_header);
     if($http_response_header[0] == "HTTP/1.1 429 Too Many Requests") {
         $sleepTime = str_replace(" ", "", explode(":",$http_response_header[2]));
         //var_dump($sleepTime);
        // echo "Sleeping for " . $sleepTime[1];
       // echo ("sleeping for: "  . $sleepTime[1]);
         sleep($sleepTime[1]);
         
         return getJsonFromUrl($url, $errorUrl);
     }
     if($response === false and $errorUrl != null) {    
        // header("Location: " . $errorUrl);
     } else if($response === false and $errorUrl == null) {
         return null;
     }
     $json = json_decode($response, true);
     return $json;
   }
   


     if(explode("=", $query[0])[0] == "summonerName") {

?>
<!DOCTYPE html>
<html>
<style>
h1{
    font-family: "Arial Black", Gadget, sans-serif;
    font-size: 250%;
    
}
h2{
    font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
    font-size: 150%;
}
h3{
    font-family: "Trebuchet MS", Helvetica, sans-serif;
    font-size: 100%;
}
body{
    
background-image: url("/img/graybg.jpg");

    -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
    background-repeat: repeat;
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

a:hover:not(.active) {
    background-color: #111;
}

.active {
background-color:#33ccff;
}
table.hovertable {
	font-family: verdana,arial,sans-serif;
	font-size:11px;
	color:#333333;
	border-width: 5px;
	border-color: #999999;
	border-collapse: collapse;
}
table.hovertable th {
	background-color:#c3dde0;
	border-width: 1px;
	padding: 8px;
	border-style: solid;
	border-color: #a9c6c9;
}
table.hovertable tr {
	background-color:#d4e3e5;
}
table.hovertable td {
	border-width: 1px;
	padding: 8px;
	border-style: solid;
	border-color: #a9c6c9;
}
div.transbox {
    margin: 30px;
    background-color: #ffffff;
    border: 1px solid black;
    opacity: 0.6;
    filter: alpha(opacity=60); 
    padding-left: 30px;
    position: relative;
}

div.transbox p {
    margin: 5%;
    font-weight: bold;
    color: #000000;
}
img { 
   border:5px solid #ff0000;
}
input[type=button], input[type=submit], input[type=reset] {
    background-color: #008CBA;
    border: none;
    color: white;
    padding: 16px 32px;
    text-decoration: none;
    margin: 4px 2px;
    cursor: pointer;
}
.topcorner{
    position: absolute;
    top: 0px;
    right: 0px;
    padding: 30px;
}
        
</style>
<head></head>
<ul>
  <li><a class="active" href="index.php">Home</a></li>
  <li><a href="builds.php">Champion Builds</a></li>
  <li><a href="about.php">About</a></li>
</ul>
<body>
  <div class="transbox">


<div><h1><img src= <?php getProfileIconUrl() ?> width="64" height="64"> <?php echo str_replace("+"," ", $summonerName); ?> </h1></div>
<div><h2><?php echo $rank; ?><?php echo " " . $rankName; ?> </h2></div>
<section>
<div class="topcorner">
    <?php 
    if($clickedState == "false") {
    echo "<h3>Think you're good enough to be on the builds page? Click below!</h3>";
    }
        if($clickedState == "true") {
    echo "<h3>You will be checked in less than 5 minutes. Check the builds pages soon to see if you made it </h3>";
    }
        if($clickedState == "again") {
    echo "<h3>You have recently clicked, try again later</h3>";
    }
    
    ?>
<form method="post" action="checkMe.php" id="form1">
    <input type="hidden" name="clicked" value = <?php echo $clickedState ?> /> 
    <input type="hidden" name="sid" value=<?php echo $SID ?> />
    <input type="hidden" name="region" value=<?php echo $region ?> />
    <input type="hidden" name="name" value="<?php echo $summonerName ?>" /> 

<input type="submit" value="Check">


</form>

</div>

</section>

<?php if($rank != "Unranked") : ?>
    <img class="centered" src="<?php echo "/img/".$rank.".png"; ?>" width="98" height="98"></img>
<?php endif; ?>


<br>
<br>



<center>
<h1><span style='border:2px black solid; font-size:24px; background:#33ccff; font-family:Lucida Sans Unicode; border-radius: 5px;'><?php $chance = getWinChance($SID, $region)?></span></h1>
</center>



<?php if($GLOBALS['chance'] != null) : ?>
<center>
<table class="hovertable">
    <tr>
        <td style="color:blue;"><b>Blue Team</b></td>
         <td style="color:red;"><b>Red Team</b></td>
        
    </tr>

<?php
    $GLOBALS['$summonerIdArray'] = array();
    $GLOBALS['championIdArray'] = array();
    $GLOBALS['teamIdArray'] = array();
    
    $gameInfo = getCurrentGameInfo($SID, $region);
    
     foreach ($gameInfo['participants'] as $particiapnt) {
         //echo $particiapnt['summonerId'];
         array_push($GLOBALS['$summonerIdArray'], $particiapnt['summonerId'] );
         array_push($GLOBALS['championIdArray'], $particiapnt['championId'] );
         array_push($GLOBALS['teamIdArray'], $particiapnt['teamId'] );
     }
     $halfppl = sizeof($GLOBALS['$summonerIdArray'])/2;
     for($i=0;$i<$halfppl;$i++) { ?>
         <tr>
             <td onmouseover="this.style.backgroundColor='#ffff66';" onmouseout="this.style.backgroundColor='#d4e3e5';"><?php echo (getNamefromId($GLOBALS['summonerIdArray'][$i], $GLOBALS['region']) . " playing " . champIdtoName($GLOBALS['championIdArray'][$i],  $GLOBALS['region']) . " with " . number_format($GLOBALS['scoreIdArray'][$i], 0, '.', ',') . " points")?></td>
            <td onmouseover="this.style.backgroundColor='#ffff66';" onmouseout="this.style.backgroundColor='#d4e3e5';"><?php echo (getNamefromId($GLOBALS['$summonerIdArray'][$i+$halfppl], $GLOBALS['region']) . " playing " . champIdtoName($GLOBALS['championIdArray'][$i+$halfppl],  $GLOBALS['region']). " with " . number_format($GLOBALS['scoreIdArray'][$i+$halfppl], 0, '.', ',') . " points")?></td>
         </tr>
         
   <?php  } ?>
   <tr>
       <td><bold><?php echo "Total: " . number_format($GLOBALS['team1totalScore'], 0, '.', ','); ?></bold></td>
       <td><bold><?php echo "Total: " . number_format($GLOBALS['team2totalScore'], 0, '.', ','); ?></bold></td>
   </tr>
     </table>
     </center>
<?php endif; ?>




<?php

//var_dump(getTop3Mastery($GLOBALS['SID'], $GLOBALS['region']));
include '/home/ubuntu/workspace/allChampData.php';
$allChampData = getAllChampData();

// $champTagList = array();
// foreach($allChampData as $data) {
//     $tagData = $data['tags'];
//     $combinedTag = $tagData[0];
//     if($tagData[1] != "") {
//         $combinedTag = $combinedTag . $tagData[1];
//     }
//     if($champTagList[$combinedTag] == null) {
//         $champTagList[$combinedTag] = array();
//     }
//     array_push($champTagList[$combinedTag], $data['name']);
// }
// //$champTagList = array()
// var_export($champTagList);

//List generated with commented code above
$champTagList = array ( 'Assassin' => array ( 0 => 'Shaco', 1 => 'Akali', ), 'FighterTank' => array ( 0 => 'Dr. Mundo', 1 => 'Gnar', 2 => 'Olaf', 3 => 'Warwick', 4 => 'Volibear', 5 => 'Shyvana', 6 => 'Illaoi', 7 => 'Udyr', 8 => 'Garen', 9 => 'Darius', 10 => 'Hecarim', 11 => 'Skarner', 12 => 'Nasus', 13 => 'Renekton', 14 => 'Wukong', 15 => 'Aatrox', 16 => 'Trundle', ), 'TankFighter' => array ( 0 => 'Rammus', 1 => 'Zac', 2 => 'Singed', 3 => 'Sion', 4 => 'Poppy', 5 => 'Sejuani', 6 => 'Nautilus', 7 => 'Jarvan IV', 8 => 'Blitzcrank', 9 => 'Malphite', ), 'MageSupport' => array ( 0 => 'Anivia', 1 => 'Karma', 2 => 'Morgana', 3 => 'Fiddlesticks', 4 => 'Lux', 5 => 'Heimerdinger', 6 => 'Syndra', 7 => 'Orianna', 8 => 'Zyra', ), 'FighterAssassin' => array ( 0 => 'Irelia', 1 => 'Yasuo', 2 => 'Tryndamere', 3 => 'Jax', 4 => 'Xin Zhao', 5 => 'Riven', 6 => 'Fiora', 7 => 'Pantheon', 8 => 'Lee Sin', 9 => 'Vi', ), 'SupportMage' => array ( 0 => 'Sona', 1 => 'Janna', 2 => 'Zilean', 3 => 'Soraka', 4 => 'Lulu', 5 => 'Bard', 6 => 'Nami', ), 'AssassinMage' => array ( 0 => 'Kassadin', 1 => 'Evelynn', 2 => 'LeBlanc', 3 => 'Katarina', ), 'Marksman' => array ( 0 => 'Corki', 1 => 'Kindred', 2 => 'Sivir', 3 => 'Miss Fortune', 4 => 'Graves', 5 => 'Jinx', 6 => 'Kalista', 7 => 'Draven', 8 => 'Lucian', 9 => 'Caitlyn', ), 'Fighter' => array ( 0 => 'Gangplank', 1 => 'Rek\'Sai', 2 => 'Mordekaiser', ), 'MarksmanAssassin' => array ( 0 => 'Jhin', 1 => 'Twitch', 2 => 'Teemo', 3 => 'Tristana', 4 => 'Vayne', ), 'SupportTank' => array ( 0 => 'Braum', 1 => 'Tahm Kench', ), 'MarksmanSupport' => array ( 0 => 'Ashe', ), 'TankMage' => array ( 0 => 'Galio', 1 => 'Amumu', 2 => 'Cho\'Gath', 3 => 'Maokai', ), 'Mage' => array ( 0 => 'Vel\'Koz', 1 => 'Annie', 2 => 'Karthus', 3 => 'Twisted Fate', 4 => 'Ziggs', 5 => 'Viktor', 6 => 'Lissandra', 7 => 'Cassiopeia', 8 => 'Brand', 9 => 'Veigar', ), 'MarksmanFighter' => array ( 0 => 'Urgot', 1 => 'Quinn', ), 'MageTank' => array ( 0 => 'Vladimir', ), 'MageFighter' => array ( 0 => 'Ryze', 1 => 'Elise', 2 => 'Swain', ), 'AssassinFighter' => array ( 0 => 'Master Yi', 1 => 'Rengar', 2 => 'Fizz', 3 => 'Talon', 4 => 'Ekko', 5 => 'Kha\'Zix', 6 => 'Zed', 7 => 'Nidalee', 8 => 'Nocturne', ), 'TankSupport' => array ( 0 => 'Alistar', 1 => 'Leona', ), 'SupportFighter' => array ( 0 => 'Nunu', 1 => 'Thresh', 2 => 'Taric', ), 'MageAssassin' => array ( 0 => 'Ahri', 1 => 'Xerath', 2 => 'Malzahar', ), 'TankMelee' => array ( 0 => 'Shen', ), 'MarksmanMage' => array ( 0 => 'Kog\'Maw', 1 => 'Varus', 2 => 'Ezreal', ), 'FighterSupport' => array ( 0 => 'Kayle', ), 'FighterMage' => array ( 0 => 'Gragas', 1 => 'Yorick', 2 => 'Rumble', 3 => 'Diana', ), 'MageMarksman' => array ( 0 => 'Kennen', 1 => 'Azir', ), 'FighterMarksman' => array ( 0 => 'Jayce', ), 'MageFigher' => array ( 0 => 'Aurelion Sol', ), );
$roleCounter = array();
$top3 = getTop3Mastery($GLOBALS['SID'], $GLOBALS['region']);
foreach($top3 as $data) {
    $id = $data['championId'];
    $tagData = $allChampData[$id]['tags'];
    //var_dump($tagData);
    $roleCounter[$tagData[0]] = $roleCounter[$tagData[0]] + 2;
    if($tagData[1] != "") {
    $roleCounter[$tagData[1]] = $roleCounter[$tagData[1]] + 1;
    }
}
arsort($roleCounter);
$recRole = "";
$counter = 0;
foreach($roleCounter as $role => $num) {
    if($counter > 1) { break; }
    $recRole = $recRole . $role;
    $counter++;
}
foreach($top3 as $data) {
       
}
//echo $recRole;
//var_dump($recRole);
//var_dump($champTagList[$recRole]);
$recChamp = $champTagList[$recRole][rand(0, sizeof($champTagList[$recRole]) - 1)]; 

echo'<br><br><br><br><br>';
echo '<center>';
echo '<h2><b>Your 3 Mastered Champions:</b></h2>';
foreach($top3 as $data) {
    $idNamething = str_replace(" ", "", champIdtoName($data['championId']));
    if($idNamething == "LeBlanc") {$idNamething = "Leblanc"; }
    echo '<img src="http://ddragon.leagueoflegends.com/cdn/6.8.1/img/champion/' .  $idNamething .  '.png" "Hspace="30" width=120px; height=120px;>';
}
echo'<br>';
echo '<h2> Based on your mastered champs, you may also like playing: </h2>';
if($recChamp == "Vayne") {$recChamp = "Twitch";}
echo '<h1>' . $recChamp . '<h1>';
echo '<img src="http://ddragon.leagueoflegends.com/cdn/6.8.1/img/champion/' . $recChamp .  '.png" width=120px; height=120px; hspace="20">';
echo '</center>';




//kk i searcjed but didnt see anything  for on t
?>
<?php for($i=0;$i<10;$i++) { ?>
<br>
<?php } ?>

  
</div>


    		<script src="js/classie.js"></script>
		<script src="js/progressButton.js"></script>
		<script>
			[].slice.call( document.querySelectorAll( 'button.progress-button' ) ).forEach( function( bttn ) {
				new ProgressButton( bttn, {
					callback : function( instance ) {
						var progress = 0,
							interval = setInterval( function() {
								progress = Math.min( progress + Math.random() * 0.1, 1 );
								instance._setProgress( progress );

								if( progress === 1 ) {
									instance._stop(1);
									clearInterval( interval );
								}                
							}, 200 );
					}
				} );
			} );
		</script>
		<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-77658836-1', 'auto');
  ga('send', 'pageview');

</script>

</body>

<footer>
    League of Masteries isn&#8217;t endorsed by Riot Games and doesn&#8217;t reflect the views or opinions of Riot Games or anyone officially involved in producing or managing League of Legends. League of Legends and Riot Games are trademarks or registered trademarks of Riot Games, Inc. League of Legends &#169; Riot Games, Inc.
</footer>


</html>


<?php } ?>
    
