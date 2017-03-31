<html>
    <link rel="icon" href="/img/Mastery.png">
<style>
body {
    background-color: #33ccff;
}
h1 {
    font-family: "verdana";
    font-weight: bold;
}
h2 {
    font-family: "verdana";
}
h3 {
    font-family: "verdana";
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
</style>  
<title>About</title>
    <body>
        <ul>
  <li><a href="index.php">Home</a></li>
  <li><a href="builds.php">Champion Builds</a></li>
  <li><a class="active" href="about.php">About</a></li>
</ul>
<?php

?>
<center>
<h1>Submission for the 2016 Riot Games API Challenge</h1>
<br>
<h2>Created By:</h2>
<h3>Kevin "shadeslayer5" Palani</h3>
<h3>Matthew "Phammy" Pham</h3>
<br>
<br>
<h2>Help Support Us!</h2>
<a href = "https://www.paypal.me/Phammy"><img src="https://www.dokuwiki.org/lib/exe/fetch.php?tok=d9fa04&media=https%3A%2F%2Fraw.githubusercontent.com%2Ftschinz%2Fdokuwiki_paypal_plugin%2Fmaster%2Flogo.jpg"></a>
<br>
<p>Consider helping us by giving a donation to help us fund our database and server to keep this website up for the League of Legends community! Thank you so much!</p>
<br>
<h2><u>Purpose</u></h2>
<p>This tool was created as a submission for the 2016 Riot Games API Challenge. The prompt of this year's challenge
was to utilize Champion Mastery Data from the game <i>League of Legends</i>. More information about the challenge can 
be found here: <a href="http://na.leagueoflegends.com/en/news/community/contests/riot-games-api-challenge-2016" target="_blank">http://na.leagueoflegends.com/en/news/community/contests/riot-games-api-challenge-2016</a>
</p>
<br>
<h2><u>What is Champion Mastery?</u></h2>
<p>Champion Mastery is a way for <i>League of Legends</i> players to recieve feedback on how well they play a champion.
They are given a score of S, A, B, C, D (S being the highest, D being the lowest). More information about the
Champion Mastery System can be found here: <a href="http://na.leagueoflegends.com/en/page/features/champion-mastery" target="_blank">http://na.leagueoflegends.com/en/page/features/champion-mastery</a></p>
<br>
<h2><u>Objective</u></h2>
<p>What does having a high mastery score on a champ mean? It atleast means that you have played a decent amount of games
like the champ, and are decently good at the champ. We wanted to use this meaning and give the mastery system more value
than a number you see at the end of games. We decided that we can use information from summoners with high mastery score
to teach newer summoners how to play the champion. Given that a player with a mastery of a champion must like that champion,
we decided to reccomend similar champions that the summoner may enjoy. And we finally decide to use the mastery score
as a way to estimate the chance of a team winning a particular match</p>
<br>
<h2><u><b>How it works</b></u></h2>
<br>
<h2>Win Chance</h2>
<p>The win chance formula is simple. We add up the total mastery points on each team. The chance of a team winning
is team1score/(team1score + team2score)</p>
<br>
<h2>Build Recomendations</h2>
<p>To find builds, we (slowly) scan throught every summoner in league. The top 3 champion masatery are picked. The champion 
average win per game is calculated by doing <i>totalMasteryPointsOnChamp/GamesPlayedOnChamp</i>. If this value is greater than
2000, and has been played within a week, the summoners match history is scanned. For any game with a kda higher than 3.5, their
match is selected. The match is then added to a database, wich the website then reads and displays the information based on
rank and champion</p>

<h2>Champion Recomendations</h2>
<p>We look at your top 3 mastery champs. We take the primary and secondary role of this champ(ex. mage, assasin)
2 points is given to a primary role, and 1 point is given to a secondary role(Ex. Teemo, who is a marksman,assasin, would
have 2 marksmen points and 1 assassin point). The total role points in then summed up. The role with the highest points
becomes the primary role, and the second most points becomes the secondary role. These are then matches to a champion
with the same primary and seconary roles</p>
</center>
<br>
<br>
<br>
</body>
<br>
<br>
<footer>
    <h3>Dedicated to Jon <3 #WeWillAlwaysRememberJon </h3>
    League of Masteries isn&#8217;t endorsed by Riot Games and doesn&#8217;t reflect the views or opinions of Riot Games or anyone officially involved in producing or managing League of Legends. League of Legends and Riot Games are trademarks or registered trademarks of Riot Games, Inc. League of Legends &#169; Riot Games, Inc.
</footer>
</html>