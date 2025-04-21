<?php $loadingurl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

if(!isset($_GET['steamid'])){ 
die ("<h1>Something went wrong, read below to solve it</h1>It seems as if you have not correctly done the URL so the loading screen would work. Have you read the README file? I take it you have not! Please choose one of the following options<br><br>

     Either you can test the loading screen with my steamID. This will make sure that your loadings screen is configured correctly. <br>
	 But do note that <i>server map</i> and <i>server gamemode</i> will not be shown as that is shown when the user is loading with javascript: <a href='$loadingurl?steamid=76561198051229287'>$loadingurl?steamid=76561198051229287</a><br><br>
	 
	 If you instead want to get the link to put in your server.cfg, then choose this link. The %s is the steamID of the connecting user and steamid is the function to fetch this steamID. You need to put this in your server.cfg:<br><br>
	 <span style='background:black; padding:10px; color: white;'>sv_loadingurl \"$loadingurl?steamid=%s\"</span><br><br>
	 
	Do you got further problems or have a question? - Send a ticket on scriptfodder.com<br>
	//Floodify");} 
	
	if(empty($APIKey)){ 
	die ("<h1>Hmm, no API?</h1>You haven't put in any API in config.php file! You need to have that in order for the script to work properly, otherwise it will not show any information regarding the user.<br><br>
	 
	Do you got further problems or have a question? - Send a ticket on scriptfodder.com<br>
	//Floodify");} 