<html>
    <title>League of Masteries</title>
    <link rel="icon" href="/img/Mastery.png">
    <style type="text/css">
        .container-1{
  width: 800px;
  vertical-align: middle;
  white-space: nowrap;
  position: relative;
}
.container-1 input#search{
  width: 800px;
  height: 50px;
  background: #2b303b;
  border: none;
  font-size: 10pt;
  float: left;
  color: #ffffff;
  padding-left: 45px;
  -webkit-border-radius: 5px;
  -moz-border-radius: 5px;
  border-radius: 5px;
}
body {
    background-image: url("/img/graybg1.jpg");
    -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
background-size: cover;
    background-repeat: no-repeat;
}
.container-1 input#search::-webkit-input-placeholder {
   color: #ffffff;
}
 
.container-1 input#search:-moz-placeholder {
   color: #ffffff;  
}
 
.container-1 input#search::-moz-placeholder {  
   color: #ffffff;  
}
 
.container-1 input#search:-ms-input-placeholder {  
   color: #ffffff;  
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
select {
    padding:3px;
    margin: 0;
    -webkit-border-radius:4px;
    -moz-border-radius:4px;
    border-radius:4px;
    -webkit-box-shadow: 0 3px 0 #ccc, 0 -1px #fff inset;
    -moz-box-shadow: 0 3px 0 #ccc, 0 -1px #fff inset;
    box-shadow: 0 3px 0 #ccc, 0 -1px #fff inset;
    background: #f8f8f8;
    color:#888;
    border:none;
    outline:none;
    display: inline-block;
    -webkit-appearance:none;
    -moz-appearance:none;
    appearance:none;
    cursor:pointer;
}
@media screen and (-webkit-min-device-pixel-ratio:0) {
    select {padding-right:18px}
}

label {position:relative}
label:after {
    content:'<>';
    font:11px "Consolas", monospace;
    color:#aaa;
    -webkit-transform:rotate(90deg);
    -moz-transform:rotate(90deg);
    -ms-transform:rotate(90deg);
    transform:rotate(90deg);
    right:8px; top:2px;
    padding:0 0 2px;
    border-bottom:1px solid #ddd;
    position:absolute;
    pointer-events:none;
}
label:before {
    content:'';
    right:6px; top:0px;
    width:20px; height:20px;
    background:#f8f8f8;
    position:absolute;
    pointer-events:none;
    display:block;
}
.styled-button-2 {
	-webkit-box-shadow:rgba(0,0,0,0.2) 0 1px 0 0;
	-moz-box-shadow:rgba(0,0,0,0.2) 0 1px 0 0;
	box-shadow:rgba(0,0,0,0.2) 0 1px 0 0;
	border-bottom-color:#333;
	border:1px solid #61c4ea;
	background-color:#7cceee;
	border-radius:5px;
	-moz-border-radius:5px;
	-webkit-border-radius:5px;
	color:#333;
	font-family:'Verdana',Arial,sans-serif;
	font-size:14px;
	text-shadow:#b2e2f5 0 1px 0;
	padding:5px
}
#article-footer span{
position:absolute;
bottom: 0; 
left:50%;
margin-left:-50%;}

    </style>
    <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-77658836-1', 'auto');
  ga('send', 'pageview');

</script>
    <body>
<ul>
  <li><a class="active" href="index.php">Home</a></li>
  <li><a href="builds.php">Champion Builds</a></li>
  <li><a href="about.php">About</a></li>
</ul>
<?php

?>

<br>
<br>
<br>


<center>
<img src="/img/logo.png" height=270 width=480>
<br>

<br>
<br>
<form method="post" action="test.php">
<div class="box">
  <div class="container-1">
      <span class="icon"><i class="fa fa-search"></i></span>
      <input type="search" id="search" name="sname" placeholder="Enter your LoL Summoner Name!" title="Enter your Summoner Name." x-moz-errormessage="Enter your Summoner Name." required>
  </div>
</div>
<br>

    <select name="region">
        <option value="NA">North America</option>
  <option value="EUW">Europe West</option>
  <option value="EUNE">Europe Nordic &amp; East</option>
  <option value="BR">Brazil</option>
  <option value="KR">Korea</option>
  <option value="TR">Turkey</option>
  <option value="RU">Russia</option>
  <option value="LAN">Latin America North</option>
  <option value="LAS">Latin America South</option>
  <option value="OCE">Oceania</option>
    </select>
    <INPUT TYPE="submit" name="submit" class="styled-button-2" value="Search!" />

</form>
<br>
<br>
<br>
<br>
<br>





<center>
    <p><span style='border:2px black solid; font-size:14px; background:#33ccff; font-family:Times New Roman;'>League of Masteries isn&#8217;t endorsed by Riot Games and doesn&#8217;t reflect the views or opinions of Riot Games or anyone officially involved in producing or managing League of Legends. League of Legends and Riot Games are trademarks or registered trademarks of Riot Games, Inc. League of Legends &#169; Riot Games, Inc.</p>
    </center>

</body>
<br>
<br>
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- Homepage -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-5131954728483500"
     data-ad-slot="8947654672"
     data-ad-format="auto"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
<script type="text/javascript">
    $(document).ready(function () {

        var makeAllFormSubmitOnEnter = function () {
            $('form input, form select').live('keypress', function (e) {
                if (e.which && e.which == 13) {
                    $(this).parents('form').submit();
                    return false;
                } else {
                    return true;
                }
            });
        };

        makeAllFormSubmitOnEnter();
    });

</script>
<br>
<br>

   

</html>