<html>
    <link rel="icon" href="/img/Mastery.png">
<style>
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
body {
    background-image: url("/img/graybg1.jpg");
    background-size: 1920px 1200px;
    background-repeat: repeat;
}

h3{
    
		padding: 0;
		border: 0;
		font-size: 1.3em;
		line-height: 1.5em;
		font: inherit;
		vertical-align: baseline;
		font-weight: 700;
		margin: 0 0 1em 0;
		text-transform: uppercase;

}
hr {
height: 3px;
color: #33ccff;
background-color: #33ccff;
border: none;
}
.alert {
    padding: 20px;
    background-color: #f44336;
    color: white;
}

.closebtn {
    margin-left: 15px;
    color: white;
    font-weight: bold;
    float: right;
    font-size: 22px;
    line-height: 20px;
    cursor: pointer;
}

.closebtn:hover {
    color: black;
}





</style>
<title>Champion Builds</title>
<body>
    <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-77658836-1', 'auto');
  ga('send', 'pageview');

</script>

<ul>
  <li><a href="index.php " color: white>Home</a></li>
 <li><a class="active" href="builds.php ">Champion Builds</a></li>
  <li><a href="about.html ">About</a></li>
</ul>
<br>
<br>
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- TopofBuilds -->
<ins class="adsbygoogle"
     style="display:inline-block;width:728px;height:90px"
     data-ad-client="ca-pub-5131954728483500"
     data-ad-slot="3996077874"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
<br>
<br>
<div class="alert">
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&#10005;</span> 
  <strong>We are currently querying champion data from our database. You may experience delayed load times.</strong>
</div>
<br>
<br>
<center><h1>Champion Builds Based on Champion Mastery</h1></center>
<center><h2>Select a Champion!</h2>

<?php
require_once 'cps_simple.php';


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
	'riotgamesapi',
	'matthewpham55@gmail.com',
	'Matthewpham200',
	'document',
	'//document/id',
	array('account' => 102249)
);

 $cpsSimple = new CPS_Simple($cpsConn);
$total = (array)$cpsSimple->search(CPS_Term("total"), 0, 2)[':0'];
echo "<h2> A total of <bold>" . number_format(ltrim($total['champ'], ":")/1000000, 3, ".", ",") . "</bold> million summoners have been analyzed so far, and <bold>" . number_format(ltrim($total['league'], ":"), 0, ".", ",") . "</bold> builds have been found </h2>";
?>
</center>
<br>
<center>
<div id="image-table">
    <table>
        <tr>
            <td style="padding:5px">
           <a href="champ.php?champion=Aatrox"><h3 style="font-family:verdana;">Aatrox</h3></a>
              <a href="champ.php?champion=aatrox ">  <img src="http://ddragon.leagueoflegends.com/cdn/6.8.1/img/champion/Aatrox.png" width=120px; height=120px;>
              </td>
            <td style="padding:5px">
<a href="champ.php?champion=ahri "><h3 style="font-family:verdana;">Ahri</h3></a>
<a href="champ.php?champion=ahri "><img src="http://ddragon.leagueoflegends.com/cdn/6.8.1/img/champion/Ahri.png" width=120px; height=120px;>
             </td>
             <td style="padding:5px">
<a href="champ.php?champion=akali "><h3 style="font-family:verdana;">Akali</h3></a>
<a href="champ.php?champion=akali "><img src="http://ddragon.leagueoflegends.com/cdn/6.8.1/img/champion/Akali.png" width=120px; height=120px;>
             </td>
             <td style="padding:5px">
<a href="champ.php?champion=alistar "><h3 style="font-family:verdana;">Alistar</h3></a>
<a href="champ.php?champion=alistar "><img src="http://ddragon.leagueoflegends.com/cdn/6.8.1/img/champion/Alistar.png" width=120px; height=120px;>
             </td>
             <td style="padding:5px">
<a href="champ.php?champion=amumu "><h3 style="font-family:verdana;">Amumu</h3></a>
<a href="champ.php?champion=amumu "><img src="http://ddragon.leagueoflegends.com/cdn/6.8.1/img/champion/Amumu.png" width=120px; height=120px;></a>
             </td>
             <td style="padding:5px">
<a href="champ.php?champion=anivia "><h3 style="font-family:verdana;">Anivia</h3></a>
<a href="champ.php?champion=anivia "><img src="http://ddragon.leagueoflegends.com/cdn/6.8.1/img/champion/Anivia.png" width=120px; height=120px;>
             </td>
             <td style="padding:5px">
<a href="champ.php?champion=annie "><h3 style="font-family:verdana;">Annie</h3></a>
<a href="champ.php?champion=annie "><img src="http://ddragon.leagueoflegends.com/cdn/6.8.1/img/champion/Annie.png" width=120px; height=120px;>
             </td>
             <td style="padding:5px">
<a href="champ.php?champion=ashe "><h3 style="font-family:verdana;">Ashe</h3></a>
<a href="champ.php?champion=ashe "><img src="http://ddragon.leagueoflegends.com/cdn/6.8.1/img/champion/Ashe.png" width=120px; height=120px;>
             </td>

        <td style="padding:5px">
<a href="champ.php?champion=AurelionSol "><h3 style="font-family:verdana;">Aurelion Sol</h3></a>
<a href="champ.php?champion=AurelionSol "><img src="http://ddragon.leagueoflegends.com/cdn/6.8.1/img/champion/AurelionSol.png" width=120px; height=120px;>
             </td>
             </tr>
    </table>
    </div>
    <hr>
<div id="image-table">
    <table>
        <tr>
<td style="padding:5px">
<a href="champ.php?champion=azir "><h3 style="font-family:verdana;">Azir</h3></a>
<a href="champ.php?champion=azir "><img src="http://ddragon.leagueoflegends.com/cdn/6.8.1/img/champion/Azir.png" width=120px; height=120px;>
             </td>
             <td style="padding:5px">
<a href="champ.php?champion=bard "><h3 style="font-family:verdana;">Bard</h3></a>
<a href="  champ.php?champion=bard "><img src="http://ddragon.leagueoflegends.com/cdn/6.8.1/img/champion/Bard.png" width=120px; height=120px;>
             </td>
             <td style="padding:5px">
<a href="  champ.php?champion=blitzcrank "><h3 style="font-family:verdana;">Blitzcrank</h3></a>
<a href="  champ.php?champion=blitzcrank "><img src="http://ddragon.leagueoflegends.com/cdn/6.8.1/img/champion/Blitzcrank.png" width=120px; height=120px;>
             </td>
             <td style="padding:5px">
<a href="  champ.php?champion=brand "><h3 style="font-family:verdana;">Brand</h3></a>
<a href="  champ.php?champion=brand "><img src="http://ddragon.leagueoflegends.com/cdn/6.8.1/img/champion/Brand.png" width=120px; height=120px;>
             </td>
             <td style="padding:5px">
<a href="  champ.php?champion=braum "><h3 style="font-family:verdana;">Braum</h3></a>
<a href="  champ.php?champion=braum "><img src="http://ddragon.leagueoflegends.com/cdn/6.8.1/img/champion/Braum.png" width=120px; height=120px;>
             </td>
             <td style="padding:5px">
<a href="  champ.php?champion=caitlyn "><h3 style="font-family:verdana;">Caitlyn</h3></a>
<a href="  champ.php?champion=caitlyn "><img src="http://ddragon.leagueoflegends.com/cdn/6.8.1/img/champion/Caitlyn.png" width=120px; height=120px;>
             </td>
             <td style="padding:5px">
<a href="  champ.php?champion=cassiopeia "><h3 style="font-family:verdana;">Cassiopeia</h3></a>
<a href="  champ.php?champion=cassiopeia "><img src="http://ddragon.leagueoflegends.com/cdn/6.8.1/img/champion/Cassiopeia.png" width=120px; height=120px;>
             </td>
             <td style="padding:5px">
<a href="  champ.php?champion=Chogath "><h3 style="font-family:verdana;">Cho'Gath</h3></a>
<a href="  champ.php?champion=Chogath "><img src="http://ddragon.leagueoflegends.com/cdn/6.8.1/img/champion/Chogath.png" width=120px; height=120px;>
             </td>
             <td style="padding:5px">
<a href="  champ.php?champion=corki "><h3 style="font-family:verdana;">Corki</h3></a>
<a href="  champ.php?champion=corki "><img src="http://ddragon.leagueoflegends.com/cdn/6.8.1/img/champion/Corki.png" width=120px; height=120px;>
             </td>
        </tr>
    </table>
</div>
<hr>
<div id="image-table">
    <table>
        <tr>
             <td style="padding:5px">
<a href="  champ.php?champion=darius "><h3 style="font-family:verdana;">Darius</h3></a>
<a href="  champ.php?champion=darius "><img src="http://ddragon.leagueoflegends.com/cdn/6.8.1/img/champion/Darius.png" width=120px; height=120px;>
             </td>
              <td style="padding:5px">
<a href="  champ.php?champion=diana "><h3 style="font-family:verdana;">Diana</h3></a>
<a href="  champ.php?champion=diana "><img src="http://ddragon.leagueoflegends.com/cdn/6.8.1/img/champion/Diana.png" width=120px; height=120px;>
             </td>
              <td style="padding:5px">
<a href="  champ.php?champion=drMundo "><h3 style="font-family:verdana;">Dr. Mundo</h3></a>
<a href="  champ.php?champion=drMundo "><img src="http://ddragon.leagueoflegends.com/cdn/6.8.1/img/champion/DrMundo.png" width=120px; height=120px;>
             </td>
              <td style="padding:5px">
<a href="  champ.php?champion=draven "><h3 style="font-family:verdana;">Draven</h3></a>
<a href="  champ.php?champion=draven "><img src="http://ddragon.leagueoflegends.com/cdn/6.8.1/img/champion/Draven.png" width=120px; height=120px;>
             </td>
              <td style="padding:5px">
<a href="  champ.php?champion=ekko "><h3 style="font-family:verdana;">Ekko</h3></a>
<a href="  champ.php?champion=ekko "><img src="http://ddragon.leagueoflegends.com/cdn/6.8.1/img/champion/Ekko.png" width=120px; height=120px;>
             </td>
              <td style="padding:5px">
<a href="  champ.php?champion=elise "><h3 style="font-family:verdana;">Elise</h3></a>
<a href="  champ.php?champion=elise "><img src="http://ddragon.leagueoflegends.com/cdn/6.8.1/img/champion/Elise.png" width=120px; height=120px;>
             </td>
              <td style="padding:5px">
<a href="  champ.php?champion=evelynn "><h3 style="font-family:verdana;">Evelynn</h3></a>
<a href="  champ.php?champion=evelynn "><img src="http://ddragon.leagueoflegends.com/cdn/6.8.1/img/champion/Evelynn.png" width=120px; height=120px;>
             </td>
              <td style="padding:5px">
<a href="  champ.php?champion=ezreal "><h3 style="font-family:verdana;">Ezreal</h3></a>
<a href="  champ.php?champion=ezreal "><img src="http://ddragon.leagueoflegends.com/cdn/6.8.1/img/champion/Ezreal.png" width=120px; height=120px;>
             </td>
              <td style="padding:5px">
<a href="  champ.php?champion=fiddleSticks "><h3 style="font-family:verdana;">Fiddlesticks</h3></a>
<a href="  champ.php?champion=fiddleSticks "><img src="http://ddragon.leagueoflegends.com/cdn/6.8.1/img/champion/FiddleSticks.png" width=120px; height=120px;>
             </td>
        </tr>
    </table>
</div>
<hr>
<div id="image-table">
    <table>
        <tr>
            <td style="padding:5px">
<a href="  champ.php?champion=fiora "><h3 style="font-family:verdana;">Fiora</h3></a>
<a href="  champ.php?champion=fiora "><img src="http://ddragon.leagueoflegends.com/cdn/6.8.1/img/champion/Fiora.png" width=120px; height=120px;>
             </td>
             <td style="padding:5px">
<a href="  champ.php?champion=fizz "><h3 style="font-family:verdana;">Fizz</h3></a>
<a href="  champ.php?champion=fizz "><img src="http://ddragon.leagueoflegends.com/cdn/6.8.1/img/champion/Fizz.png" width=120px; height=120px;>
             </td>
             <td style="padding:5px">
<a href="  champ.php?champion=galio "><h3 style="font-family:verdana;">Galio</h3></a>
<a href="  champ.php?champion=galio "><img src="http://ddragon.leagueoflegends.com/cdn/6.8.1/img/champion/Galio.png" width=120px; height=120px;>
             </td>
             <td style="padding:5px">
<a href="  champ.php?champion=gangplank "><h3 style="font-family:verdana;">Gangplank</h3></a>
<a href="  champ.php?champion=gangplank "><img src="http://ddragon.leagueoflegends.com/cdn/6.8.1/img/champion/Gangplank.png" width=120px; height=120px;>
             </td>
             <td style="padding:5px">
<a href="  champ.php?champion=garen "><h3 style="font-family:verdana;">Garen</h3></a>
<a href="  champ.php?champion=garen "><img src="http://ddragon.leagueoflegends.com/cdn/6.8.1/img/champion/Garen.png" width=120px; height=120px;>
             </td>
             <td style="padding:5px">
<a href="  champ.php?champion=gnar "><h3 style="font-family:verdana;">Gnar</h3></a>
<a href="  champ.php?champion=gnar "><img src="http://ddragon.leagueoflegends.com/cdn/6.8.1/img/champion/Gnar.png" width=120px; height=120px;>
             </td>
             <td style="padding:5px">
<a href="  champ.php?champion=gragas "><h3 style="font-family:verdana;">Gragas</h3></a>
<a href="  champ.php?champion=gragas "><img src="http://ddragon.leagueoflegends.com/cdn/6.8.1/img/champion/Gragas.png" width=120px; height=120px;>
             </td>
             <td style="padding:5px">
<a href="  champ.php?champion=graves "><h3 style="font-family:verdana;">Graves</h3></a>
<a href="  champ.php?champion=graves "><img src="http://ddragon.leagueoflegends.com/cdn/6.8.1/img/champion/Graves.png" width=120px; height=120px;>
             </td>
             <td style="padding:5px">
<a href="  champ.php?champion=hecarim "><h3 style="font-family:verdana;">Hecarim</h3></a>
<a href="  champ.php?champion=hecarim "><img src="http://ddragon.leagueoflegends.com/cdn/6.8.1/img/champion/Hecarim.png" width=120px; height=120px;>
             </td>
        </tr>
    </table>
</div>
<hr>
<div id="image-table">
    <table>
        <tr>
             <td style="padding:5px">
<a href="  champ.php?champion=heimerdinger "><h3 style="font-family:verdana;">Heimerdinger</h3></a>
<a href="  champ.php?champion=heimerdinger "><img src="http://ddragon.leagueoflegends.com/cdn/6.8.1/img/champion/Heimerdinger.png" width=120px; height=120px;>
             </td>
              <td style="padding:5px">
<a href="  champ.php?champion=illaoi "><h3 style="font-family:verdana;">Illaoi</h3></a>
<a href="  champ.php?champion=illaoi "><img src="http://ddragon.leagueoflegends.com/cdn/6.8.1/img/champion/Illaoi.png" width=120px; height=120px;>
             </td>
              <td style="padding:5px">
<a href="  champ.php?champion=irelia "><h3 style="font-family:verdana;">Irelia</h3></a>
<a href="  champ.php?champion=irelia "><img src="http://ddragon.leagueoflegends.com/cdn/6.8.1/img/champion/Irelia.png" width=120px; height=120px;>
             </td>
              <td style="padding:5px">
<a href="  champ.php?champion=janna "><h3 style="font-family:verdana;">Janna</h3></a>
<a href="  champ.php?champion=janna "><img src="http://ddragon.leagueoflegends.com/cdn/6.8.1/img/champion/Janna.png" width=120px; height=120px;>
             </td>
              <td style="padding:5px">
<a href="  champ.php?champion=jarvanIV "><h3 style="font-family:verdana;">Jarvan IV</h3></a>
<a href="  champ.php?champion=jarvanIV "><img src="http://ddragon.leagueoflegends.com/cdn/6.8.1/img/champion/JarvanIV.png" width=120px; height=120px;>
             </td>
              <td style="padding:5px">
<a href="  champ.php?champion=jax "><h3 style="font-family:verdana;">Jax</h3></a>
<a href="  champ.php?champion=jax "><img src="http://ddragon.leagueoflegends.com/cdn/6.8.1/img/champion/Jax.png" width=120px; height=120px;>
             </td>
              <td style="padding:5px">
<a href="  champ.php?champion=jayce "><h3 style="font-family:verdana;">Jayce</h3></a>
<a href="  champ.php?champion=jayce "><img src="http://ddragon.leagueoflegends.com/cdn/6.8.1/img/champion/Jayce.png" width=120px; height=120px;>
             </td>
              <td style="padding:5px">
<a href="  champ.php?champion=jhin "><h3 style="font-family:verdana;">Jhin</h3></a>
<a href="  champ.php?champion=jhin "><img src="http://ddragon.leagueoflegends.com/cdn/6.8.1/img/champion/Jhin.png" width=120px; height=120px;>
             </td>
              <td style="padding:5px">
<a href="  champ.php?champion=jinx "><h3 style="font-family:verdana;">Jinx</h3></a>
<a href="  champ.php?champion=jinx "><img src="http://ddragon.leagueoflegends.com/cdn/6.8.1/img/champion/Jinx.png" width=120px; height=120px;>
             </td>
        </tr>
    </table>
</div>
<hr>
<div id="image-table">
    <table>
        <tr>
                          <td style="padding:5px">
<a href="  champ.php?champion=kalista "><h3 style="font-family:verdana;">Kalista</h3></a>
<a href="  champ.php?champion=kalista "><img src="http://ddragon.leagueoflegends.com/cdn/6.8.1/img/champion/Kalista.png" width=120px; height=120px;>
             </td>
                           <td style="padding:5px">
<a href="  champ.php?champion=karma "><h3 style="font-family:verdana;">Karma</h3></a>
<a href="  champ.php?champion=karma "><img src="http://ddragon.leagueoflegends.com/cdn/6.8.1/img/champion/Karma.png" width=120px; height=120px;>
             </td>
                           <td style="padding:5px">
<a href="  champ.php?champion=karthus "><h3 style="font-family:verdana;">Karthus</h3></a>
<a href="  champ.php?champion=karthus "><img src="http://ddragon.leagueoflegends.com/cdn/6.8.1/img/champion/Karthus.png" width=120px; height=120px;>
             </td>
                           <td style="padding:5px">
<a href="  champ.php?champion=kassadin "><h3 style="font-family:verdana;">Kassadin</h3></a>
<a href="  champ.php?champion=kassadin "><img src="http://ddragon.leagueoflegends.com/cdn/6.8.1/img/champion/Kassadin.png" width=120px; height=120px;>
             </td>
                           <td style="padding:5px">
<a href="  champ.php?champion=katarina "><h3 style="font-family:verdana;">Katarina</h3></a>
<a href="  champ.php?champion=katarina "><img src="http://ddragon.leagueoflegends.com/cdn/6.8.1/img/champion/Katarina.png" width=120px; height=120px;>
             </td>
                           <td style="padding:5px">
<a href="  champ.php?champion=kayle "><h3 style="font-family:verdana;">Kayle</h3></a>
<a href="  champ.php?champion=kayle "><img src="http://ddragon.leagueoflegends.com/cdn/6.8.1/img/champion/Kayle.png" width=120px; height=120px;>
             </td>
                           <td style="padding:5px">
<a href="  champ.php?champion=kennen "><h3 style="font-family:verdana;">Kennen</h3></a>
<a href="  champ.php?champion=kennen "><img src="http://ddragon.leagueoflegends.com/cdn/6.8.1/img/champion/Kennen.png" width=120px; height=120px;>
             </td>
                           <td style="padding:5px">
<a href="  champ.php?champion=khazix "><h3 style="font-family:verdana;">Kha'Zix</h3></a>
<a href="  champ.php?champion=khazix "><img src="http://ddragon.leagueoflegends.com/cdn/6.8.1/img/champion/Khazix.png" width=120px; height=120px;>
             </td>
                           <td style="padding:5px">
<a href="  champ.php?champion=kindred "><h3 style="font-family:verdana;">Kindred</h3></a>
<a href="  champ.php?champion=kindred "><img src="http://ddragon.leagueoflegends.com/cdn/6.8.1/img/champion/Kindred.png" width=120px; height=120px;>
             </td>
        </tr>
    </table>
</div>
<hr>
<div id="image-table">
    <table>
        <tr>
        <td style="padding:5px">
<a href="  champ.php?champion=KogMaw "><h3 style="font-family:verdana;">Kog'Maw</h3></a>
<a href="  champ.php?champion=KogMaw "><img src="http://ddragon.leagueoflegends.com/cdn/6.8.1/img/champion/KogMaw.png" width=120px; height=120px;>
             </td>
                     <td style="padding:5px">
<a href="  champ.php?champion=leblanc "><h3 style="font-family:verdana;">LeBlanc</h3></a>
<a href="  champ.php?champion=leblanc "><img src="http://ddragon.leagueoflegends.com/cdn/6.8.1/img/champion/Leblanc.png" width=120px; height=120px;>
             </td>
                     <td style="padding:5px">
<a href="  champ.php?champion=LeeSin "><h3 style="font-family:verdana;">Lee Sin</h3></a>
<a href="  champ.php?champion=LeeSin "><img src="http://ddragon.leagueoflegends.com/cdn/6.8.1/img/champion/LeeSin.png" width=120px; height=120px;>
             </td>
                     <td style="padding:5px">
<a href="  champ.php?champion=leona "><h3 style="font-family:verdana;">Leona</h3></a>
<a href="  champ.php?champion=leona "><img src="http://ddragon.leagueoflegends.com/cdn/6.8.1/img/champion/Leona.png" width=120px; height=120px;>
             </td>
                     <td style="padding:5px">
<a href="  champ.php?champion=lissandra "><h3 style="font-family:verdana;">Lissandra</h3></a>
<a href="  champ.php?champion=lissandra "><img src="http://ddragon.leagueoflegends.com/cdn/6.8.1/img/champion/Lissandra.png" width=120px; height=120px;>
             </td>
                     <td style="padding:5px">
<a href="  champ.php?champion=lucian "><a href="  champ.php?champion=lucian "><h3 style="font-family:verdana;">Lucian</h3></a>
<a href="  champ.php?champion=lucian "><img src="http://ddragon.leagueoflegends.com/cdn/6.8.1/img/champion/Lucian.png" width=120px; height=120px;>
             </td>
                     <td style="padding:5px">
<a href="  champ.php?champion=lulu "><h3 style="font-family:verdana;">Lulu</h3></a>
<a href="  champ.php?champion=lulu "><img src="http://ddragon.leagueoflegends.com/cdn/6.8.1/img/champion/Lulu.png" width=120px; height=120px;>
             </td>
                     <td style="padding:5px">
<a href="  champ.php?champion=lux "><h3 style="font-family:verdana;">Lux</h3></a>
<a href="  champ.php?champion=lux "><img src="http://ddragon.leagueoflegends.com/cdn/6.8.1/img/champion/Lux.png" width=120px; height=120px;>
             </td>
                     <td style="padding:5px">
<a href="  champ.php?champion=malphite "><h3 style="font-family:verdana;">Malphite</h3></a>
<a href="  champ.php?champion=malphite "><img src="http://ddragon.leagueoflegends.com/cdn/6.8.1/img/champion/Malphite.png" width=120px; height=120px;>
             </td>
        </tr>
    </table>
</div>
  <hr>
  <div id="image-table">
    <table>
        <tr>
            <td style="padding:5px">
<a href="  champ.php?champion=malzahar "><h3 style="font-family:verdana;">Malzahar</h3></a>
<a href="  champ.php?champion=malzahar "><img src="http://ddragon.leagueoflegends.com/cdn/6.8.1/img/champion/Malzahar.png" width=120px; height=120px;>
             </td>
             <td style="padding:5px">
<a href="  champ.php?champion=maokai "><h3 style="font-family:verdana;">Maokai</h3></a>
<a href="  champ.php?champion=maokai "><img src="http://ddragon.leagueoflegends.com/cdn/6.8.1/img/champion/Maokai.png" width=120px; height=120px;>
             </td>
             <td style="padding:5px">
<a href="  champ.php?champion=MasterYi "><h3 style="font-family:verdana;">Master Yi</h3></a>
<a href="  champ.php?champion=MasterYi "><img src="http://ddragon.leagueoflegends.com/cdn/6.8.1/img/champion/MasterYi.png" width=120px; height=120px;>
             </td>
             <td style="padding:5px">
<a href="  champ.php?champion=missFortune "><h3 style="font-family:verdana;">Miss Fortune</h3></a>
<a href="  champ.php?champion=missFortune "><img src="http://ddragon.leagueoflegends.com/cdn/6.8.1/img/champion/MissFortune.png" width=120px; height=120px;>
             </td>
             <td style="padding:5px">
<a href="  champ.php?champion=mordekaiser "><h3 style="font-family:verdana;">Mordekaiser</h3></a>
<a href="  champ.php?champion=mordekaiser "><img src="http://ddragon.leagueoflegends.com/cdn/6.8.1/img/champion/Mordekaiser.png" width=120px; height=120px;>
             </td>
             <td style="padding:5px">
<a href="  champ.php?champion=morgana "><h3 style="font-family:verdana;">Morgana</h3></a>
<a href="  champ.php?champion=morgana "><img src="http://ddragon.leagueoflegends.com/cdn/6.8.1/img/champion/Morgana.png" width=120px; height=120px;>
             </td>
             <td style="padding:5px">
<a href="  champ.php?champion=nami "><h3 style="font-family:verdana;">Nami</h3></a>
<a href="  champ.php?champion=nami "><img src="http://ddragon.leagueoflegends.com/cdn/6.8.1/img/champion/Nami.png" width=120px; height=120px;>
             </td>
             <td style="padding:5px">
<a href="  champ.php?champion=nasus "><h3 style="font-family:verdana;">Nasus</h3></a>
<a href="  champ.php?champion=nasus "><img src="http://ddragon.leagueoflegends.com/cdn/6.8.1/img/champion/Nasus.png" width=120px; height=120px;>
             </td>
             <td style="padding:5px">
<a href="  champ.php?champion=nautilus "><h3 style="font-family:verdana;">Nautilus</h3></a>
<a href="  champ.php?champion=nautilus "><img src="http://ddragon.leagueoflegends.com/cdn/6.8.1/img/champion/Nautilus.png" width=120px; height=120px;>
             </td>
        </tr>
    </table>
</div>
    <hr>
    <div id="image-table">
    <table>
        <tr>
            <td style="padding:5px">
<a href="  champ.php?champion=nidalee "><h3 style="font-family:verdana;">Nidalee</h3></a>
<a href="  champ.php?champion=nidalee "><img src="http://ddragon.leagueoflegends.com/cdn/6.8.1/img/champion/Nidalee.png" width=120px; height=120px;>
             </td>
             <td style="padding:5px">
<a href="  champ.php?champion=nocturne "><h3 style="font-family:verdana;">Nocturne</h3></a>
<a href="  champ.php?champion=nocturne "><img src="http://ddragon.leagueoflegends.com/cdn/6.8.1/img/champion/Nocturne.png" width=120px; height=120px;>
             </td>
             <td style="padding:5px">
<a href="  champ.php?champion=nunu "><h3 style="font-family:verdana;">Nunu</h3></a>
<a href="  champ.php?champion=nunu "><img src="http://ddragon.leagueoflegends.com/cdn/6.8.1/img/champion/Nunu.png" width=120px; height=120px;>
             </td>
             <td style="padding:5px">
<a href="  champ.php?champion=olaf "><h3 style="font-family:verdana;">Olaf</h3></a>
<a href="  champ.php?champion=olaf "><img src="http://ddragon.leagueoflegends.com/cdn/6.8.1/img/champion/Olaf.png" width=120px; height=120px;>
             </td>
             <td style="padding:5px">
<a href="  champ.php?champion=orianna "><h3 style="font-family:verdana;">Orianna</h3></a>
<a href="  champ.php?champion=orianna "><img src="http://ddragon.leagueoflegends.com/cdn/6.8.1/img/champion/Orianna.png" width=120px; height=120px;>
             </td>
             <td style="padding:5px">
<a href="  champ.php?champion=pantheon "><h3 style="font-family:verdana;">Pantheon</h3></a>
<a href="  champ.php?champion=pantheon "><img src="http://ddragon.leagueoflegends.com/cdn/6.8.1/img/champion/Pantheon.png" width=120px; height=120px;>
             </td>
             <td style="padding:5px">
<a href="  champ.php?champion=poppy "><h3 style="font-family:verdana;">Poppy</h3></a>
<a href="  champ.php?champion=poppy "><img src="http://ddragon.leagueoflegends.com/cdn/6.8.1/img/champion/Poppy.png" width=120px; height=120px;>
             </td>
             <td style="padding:5px">
<a href="  champ.php?champion=quinn "><h3 style="font-family:verdana;">Quinn</h3></a>
<a href="  champ.php?champion=quinn "><img src="http://ddragon.leagueoflegends.com/cdn/6.8.1/img/champion/Quinn.png" width=120px; height=120px;>
             </td>
             <td style="padding:5px">
<a href="  champ.php?champion=rammus "><h3 style="font-family:verdana;">Rammus</h3></a>
<a href="  champ.php?champion=rammus "><img src="http://ddragon.leagueoflegends.com/cdn/6.8.1/img/champion/Rammus.png" width=120px; height=120px;>
             </td>
        </tr>
    </table>
</div>
<hr>
<div id="image-table">
    <table>
        <tr>
             <td style="padding:5px">
<a href="  champ.php?champion=RekSai "><h3 style="font-family:verdana;">Rek'Sai</h3></a>
<a href="  champ.php?champion=RekSai "><img src="http://ddragon.leagueoflegends.com/cdn/6.8.1/img/champion/RekSai.png" width=120px; height=120px;>
             </td>
                          <td style="padding:5px">
<a href="  champ.php?champion=renekton "><h3 style="font-family:verdana;">Renekton</h3></a>
<a href="  champ.php?champion=renekton "><img src="http://ddragon.leagueoflegends.com/cdn/6.8.1/img/champion/Renekton.png" width=120px; height=120px;>
             </td>
                          <td style="padding:5px">
<a href="  champ.php?champion=rengar "><h3 style="font-family:verdana;">Rengar</h3></a>
<a href="  champ.php?champion=rengar "><img src="http://ddragon.leagueoflegends.com/cdn/6.8.1/img/champion/Rengar.png" width=120px; height=120px;>
             </td>
                          <td style="padding:5px">
<a href="  champ.php?champion=riven "><h3 style="font-family:verdana;">Riven</h3></a>
<a href="  champ.php?champion=riven "><img src="http://ddragon.leagueoflegends.com/cdn/6.8.1/img/champion/Riven.png" width=120px; height=120px;>
             </td>
                          <td style="padding:5px">
<a href="  champ.php?champion=rumble "><h3 style="font-family:verdana;">Rumble</h3></a>
<a href="  champ.php?champion=rumble "><img src="http://ddragon.leagueoflegends.com/cdn/6.8.1/img/champion/Rumble.png" width=120px; height=120px;>
             </td>
                          <td style="padding:5px">
<a href="  champ.php?champion=ryze "><h3 style="font-family:verdana;">Ryze</h3></a>
<a href="  champ.php?champion=ryze "><img src="http://ddragon.leagueoflegends.com/cdn/6.8.1/img/champion/Ryze.png" width=120px; height=120px;>
             </td>
                          <td style="padding:5px">
<a href="  champ.php?champion=sejuani "><h3 style="font-family:verdana;">Sejuani</h3></a>
<a href="  champ.php?champion=sejuani "><img src="http://ddragon.leagueoflegends.com/cdn/6.8.1/img/champion/Sejuani.png" width=120px; height=120px;>
             </td>
                          <td style="padding:5px">
<a href="  champ.php?champion=shaco "><h3 style="font-family:verdana;">Shaco</h3></a>
<a href="  champ.php?champion=shaco "><img src="http://ddragon.leagueoflegends.com/cdn/6.8.1/img/champion/Shaco.png" width=120px; height=120px;>
             </td>
                          <td style="padding:5px">
<a href="  champ.php?champion=shen "><h3 style="font-family:verdana;">Shen</h3></a>
<a href="  champ.php?champion=shen "><img src="http://ddragon.leagueoflegends.com/cdn/6.8.1/img/champion/Shen.png" width=120px; height=120px;>
             </td>
        </tr>
    </table>
</div>
<hr>
<div id="image-table">
    <table>
        <tr>
                    <td style="padding:5px">
<a href="  champ.php?champion=shyvana "><h3 style="font-family:verdana;">Shyvana</h3></a>
<a href="  champ.php?champion=shyvana "><img src="http://ddragon.leagueoflegends.com/cdn/6.8.1/img/champion/Shyvana.png" width=120px; height=120px;>
             </td>
                      <td style="padding:5px">
<a href="  champ.php?champion=singed "><h3 style="font-family:verdana;">Singed</h3></a>
<a href="  champ.php?champion=singed "><img src="http://ddragon.leagueoflegends.com/cdn/6.8.1/img/champion/Singed.png" width=120px; height=120px;>
             </td>
                      <td style="padding:5px">
<a href="  champ.php?champion=sion "><h3 style="font-family:verdana;">Sion</h3></a>
<a href="  champ.php?champion=sion "><img src="http://ddragon.leagueoflegends.com/cdn/6.8.1/img/champion/Sion.png" width=120px; height=120px;>
             </td>
                      <td style="padding:5px">
<a href="  champ.php?champion=sivir "><h3 style="font-family:verdana;">Sivir</h3></a>
<a href="  champ.php?champion=sivir "><img src="http://ddragon.leagueoflegends.com/cdn/6.8.1/img/champion/Sivir.png" width=120px; height=120px;>
             </td>
                      <td style="padding:5px">
<a href="  champ.php?champion=skarner "><h3 style="font-family:verdana;">Skarner</h3></a>
<a href="  champ.php?champion=skarner "><img src="http://ddragon.leagueoflegends.com/cdn/6.8.1/img/champion/Skarner.png" width=120px; height=120px;>
             </td>
                      <td style="padding:5px">
<a href="  champ.php?champion=sona "><h3 style="font-family:verdana;">Sona</h3></a>
<a href="  champ.php?champion=sona "><img src="http://ddragon.leagueoflegends.com/cdn/6.8.1/img/champion/Sona.png" width=120px; height=120px;>
             </td>
                      <td style="padding:5px">
<a href="  champ.php?champion=soraka "><h3 style="font-family:verdana;">Soraka</h3></a>
<a href="  champ.php?champion=soraka "><img src="http://ddragon.leagueoflegends.com/cdn/6.8.1/img/champion/Soraka.png" width=120px; height=120px;>
             </td>
                      <td style="padding:5px">
<a href="  champ.php?champion=swain "><h3 style="font-family:verdana;">Swain</h3></a>
<a href="  champ.php?champion=swain "><img src="http://ddragon.leagueoflegends.com/cdn/6.8.1/img/champion/Swain.png" width=120px; height=120px;>
             </td>
                      <td style="padding:5px">
<a href="  champ.php?champion=syndra "><h3 style="font-family:verdana;">Syndra</h3></a>
<a href="  champ.php?champion=syndra "><img src="http://ddragon.leagueoflegends.com/cdn/6.8.1/img/champion/Syndra.png" width=120px; height=120px;>
             </td>
        </tr>
    </table>
</div>
<hr>
<div id="image-table">
    <table>
        <tr>
              <td style="padding:5px">
<a href="  champ.php?champion=TahmKench "><h3 style="font-family:verdana;">Tahm Kench</h3></a>
<a href="  champ.php?champion=TahmKench "><img src="http://ddragon.leagueoflegends.com/cdn/6.8.1/img/champion/TahmKench.png" width=120px; height=120px;>
             </td>
               <td style="padding:5px">
<a href="  champ.php?champion=talon "><h3 style="font-family:verdana;">Talon</h3></a>
<a href="  champ.php?champion=talon "><img src="http://ddragon.leagueoflegends.com/cdn/6.8.1/img/champion/Talon.png" width=120px; height=120px;>
             </td>
               <td style="padding:5px">
<a href="  champ.php?champion=taric "><h3 style="font-family:verdana;">Taric</h3></a>
<a href="  champ.php?champion=taric "><img src="http://ddragon.leagueoflegends.com/cdn/6.8.1/img/champion/Taric.png" width=120px; height=120px;>
             </td>
               <td style="padding:5px">
<a href="  champ.php?champion=teemo "><h3 style="font-family:verdana;">Teemo</h3></a>
<a href="  champ.php?champion=teemo "><img src="http://ddragon.leagueoflegends.com/cdn/6.8.1/img/champion/Teemo.png" width=120px; height=120px;>
             </td>
               <td style="padding:5px">
<a href="  champ.php?champion=thresh "><h3 style="font-family:verdana;">Thresh</h3></a>
<a href="  champ.php?champion=thresh "><img src="http://ddragon.leagueoflegends.com/cdn/6.8.1/img/champion/Thresh.png" width=120px; height=120px;>
             </td>
               <td style="padding:5px">
<a href="  champ.php?champion=tristana "><h3 style="font-family:verdana;">Tristana</h3></a>
<a href="  champ.php?champion=tristana "><img src="http://ddragon.leagueoflegends.com/cdn/6.8.1/img/champion/Tristana.png" width=120px; height=120px;>
             </td>
               <td style="padding:5px">
<a href="  champ.php?champion=trundle "><h3 style="font-family:verdana;">Trundle</h3></a>
<a href="  champ.php?champion=trundle "><img src="http://ddragon.leagueoflegends.com/cdn/6.8.1/img/champion/Trundle.png" width=120px; height=120px;>
             </td>
               <td style="padding:5px">
<a href="  champ.php?champion=tryndamere "><h3 style="font-family:verdana;">Tryndamere</h3></a>
<a href="  champ.php?champion=tryndamere "><img src="http://ddragon.leagueoflegends.com/cdn/6.8.1/img/champion/Tryndamere.png" width=120px; height=120px;>
             </td>
               <td style="padding:5px">
<a href="  champ.php?champion=twistedFate "><h3 style="font-family:verdana;">Twisted Fate</h3></a>
<a href="  champ.php?champion=twistedFate "><img src="http://ddragon.leagueoflegends.com/cdn/6.8.1/img/champion/TwistedFate.png" width=120px; height=120px;>
             </td>
        </tr>
    </table>
</div>
<hr>
<div id="image-table">
    <table>
        <tr>
                           <td style="padding:5px">
<a href="  champ.php?champion=twitch "><h3 style="font-family:verdana;">Twitch</h3></a>
<a href="  champ.php?champion=twitch "><img src="http://ddragon.leagueoflegends.com/cdn/6.8.1/img/champion/Twitch.png" width=120px; height=120px;>
             </td>
                            <td style="padding:5px">
<a href="  champ.php?champion=udyr "><h3 style="font-family:verdana;">Udyr</h3></a>
<a href="  champ.php?champion=udyr "><img src="http://ddragon.leagueoflegends.com/cdn/6.8.1/img/champion/Udyr.png" width=120px; height=120px;>
             </td>
                            <td style="padding:5px">
<a href="  champ.php?champion=urgot "><h3 style="font-family:verdana;">Urgot</h3></a>
<a href="  champ.php?champion=urgot "><img src="http://ddragon.leagueoflegends.com/cdn/6.8.1/img/champion/Urgot.png" width=120px; height=120px;>
             </td>
                            <td style="padding:5px">
<a href="  champ.php?champion=varus "><h3 style="font-family:verdana;">Varus</h3></a>
<a href="  champ.php?champion=varus "><img src="http://ddragon.leagueoflegends.com/cdn/6.8.1/img/champion/Varus.png" width=120px; height=120px;>
             </td>
                            <td style="padding:5px">
<a href="  champ.php?champion=vayne "><h3 style="font-family:verdana;">Vayne</h3></a>
<a href="  champ.php?champion=vayne "><img src="http://ddragon.leagueoflegends.com/cdn/6.8.1/img/champion/Vayne.png" width=120px; height=120px;>
             </td>
                            <td style="padding:5px">
<a href="  champ.php?champion=veigar "><h3 style="font-family:verdana;">Veigar</h3></a>
<a href="  champ.php?champion=veigar "><img src="http://ddragon.leagueoflegends.com/cdn/6.8.1/img/champion/Veigar.png" width=120px; height=120px;>
             </td>
                            <td style="padding:5px">
<a href="  champ.php?champion=velkoz "><h3 style="font-family:verdana;">Vel'Koz</h3></a>
<a href="  champ.php?champion=velkoz "><img src="http://ddragon.leagueoflegends.com/cdn/6.8.1/img/champion/Velkoz.png" width=120px; height=120px;>
             </td>
                            <td style="padding:5px">
<a href="  champ.php?champion=vi "><h3 style="font-family:verdana;">Vi</h3></a>
<a href="  champ.php?champion=vi "><img src="http://ddragon.leagueoflegends.com/cdn/6.8.1/img/champion/Vi.png" width=120px; height=120px;>
             </td>
                            <td style="padding:5px">
<a href="  champ.php?champion=viktor "><h3 style="font-family:verdana;">Viktor</h3></a>
<a href="  champ.php?champion=viktor "><img src="http://ddragon.leagueoflegends.com/cdn/6.8.1/img/champion/Viktor.png" width=120px; height=120px;>
             </td>
        </tr>
    </table>
</div>
<hr>
<div id="image-table">
    <table>
        <tr>
<td style="padding:5px">
<a href="  champ.php?champion=vladimir "><h3 style="font-family:verdana;">Vladimir</h3></a>
<a href="  champ.php?champion=vladimir "><img src="http://ddragon.leagueoflegends.com/cdn/6.8.1/img/champion/Vladimir.png" width=120px; height=120px;>
             </td>
             <td style="padding:5px">
<a href="  champ.php?champion=volibear "><h3 style="font-family:verdana;">Volibear</h3></a>
<a href="  champ.php?champion=volibear "><img src="http://ddragon.leagueoflegends.com/cdn/6.8.1/img/champion/Volibear.png" width=120px; height=120px;>
             </td>
             <td style="padding:5px">
<a href="  champ.php?champion=warwick "><h3 style="font-family:verdana;">Warwick</h3></a>
<a href="  champ.php?champion=warwick "><img src="http://ddragon.leagueoflegends.com/cdn/6.8.1/img/champion/Warwick.png" width=120px; height=120px;>
             </td>
             <td style="padding:5px">
<a href="  champ.php?champion=MonkeyKing "><h3 style="font-family:verdana;">Wukong</h3></a>
<a href="  champ.php?champion=MonkeyKing "><img src="http://ddragon.leagueoflegends.com/cdn/6.8.1/img/champion/MonkeyKing.png" width=120px; height=120px;>
             </td>
             <td style="padding:5px">
<a href="  champ.php?champion=xerath "><h3 style="font-family:verdana;">Xerath</h3></a>
<a href="  champ.php?champion=xerath "><img src="http://ddragon.leagueoflegends.com/cdn/6.8.1/img/champion/Xerath.png" width=120px; height=120px;>
             </td>
             <td style="padding:5px">
<a href="  champ.php?champion=XinZhao "><h3 style="font-family:verdana;">Xin Zhao</h3></a>
<a href="  champ.php?champion=XinZhao "><img src="http://ddragon.leagueoflegends.com/cdn/6.8.1/img/champion/XinZhao.png" width=120px; height=120px;>
             </td>
             <td style="padding:5px">
<a href="  champ.php?champion=yasuo "><h3 style="font-family:verdana;">Yasuo</h3></a>
<a href="  champ.php?champion=yasuo "><img src="http://ddragon.leagueoflegends.com/cdn/6.8.1/img/champion/Yasuo.png" width=120px; height=120px;>
             </td>
             <td style="padding:5px">
<a href="  champ.php?champion=yorick "><h3 style="font-family:verdana;">Yorick</h3></a>
<a href="  champ.php?champion=yorick "><img src="http://ddragon.leagueoflegends.com/cdn/6.8.1/img/champion/Yorick.png" width=120px; height=120px;>
             </td>
             <td style="padding:5px">
<a href="  champ.php?champion=zac "><h3 style="font-family:verdana;">Zac</h3></a>
<a href="  champ.php?champion=zac "><img src="http://ddragon.leagueoflegends.com/cdn/6.8.1/img/champion/Zac.png" width=120px; height=120px;>
             </td>
        </tr>
    </table>
</div>
<hr>
<div id="image-table">
    <table>
        <tr>
<td style="padding:5px">
<a href="  champ.php?champion=zed "><h3 style="font-family:verdana;">Zed</h3></a>
<a href="  champ.php?champion=zed "><img src="http://ddragon.leagueoflegends.com/cdn/6.8.1/img/champion/Zed.png" width=120px; height=120px;>
             </td>
             <td style="padding:5px">
<a href="  champ.php?champion=ziggs "><h3 style="font-family:verdana;">Ziggs</h3></a>
<a href="  champ.php?champion=ziggs "><img src="http://ddragon.leagueoflegends.com/cdn/6.8.1/img/champion/Ziggs.png" width=120px; height=120px;>
             </td>
             <td style="padding:5px">
<a href="  champ.php?champion=zilean "><h3 style="font-family:verdana;">Zilean</h3></a>
<a href="  champ.php?champion=zilean "><img src="http://ddragon.leagueoflegends.com/cdn/6.8.1/img/champion/Zilean.png" width=120px; height=120px;>
             </td>
                          <td style="padding:5px">
<a href="  champ.php?champion=zyra "><h3 style="font-family:verdana;">Zyra</h3></a>
<a href="  champ.php?champion=zyra "><img src="http://ddragon.leagueoflegends.com/cdn/6.8.1/img/champion/Zyra.png" width=120px; height=120px;>
             </td>
        </tr>
    </table>
</div>
</center>
<br>
<br>
</body> 
<footer>
    League of Masteries isn&#8217;t endorsed by Riot Games and doesn&#8217;t reflect the views or opinions of Riot Games or anyone officially involved in producing or managing League of Legends. League of Legends and Riot Games are trademarks or registered trademarks of Riot Games, Inc. League of Legends &#169; Riot Games, Inc.
</footer>
</html>


