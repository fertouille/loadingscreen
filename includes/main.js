// Fetch information about the server, do not touch this or modify this as it tends to break otherwise
	function GameDetails( servername, serverurl, mapname, maxplayers, steamid, gamemode )
	{ 
		document.getElementById("gamemode").innerHTML = gamemode;
		document.getElementById("map").innerHTML = mapname;
	}
	

	var filerequierd = 0;
	var totalfilerequierd = 0;
	var downloadingfiles = false;
	
	var math_difference = 0;
	var math_percent = 0;
 
	function SetFilesNeeded( needed, total )
	{
		filerequierd = needed;			
		loadingBOX();
	}
	
	function SetFilesTotal( total )
	{
		totalfilerequierd = total;
		loadingBOX();
	}
	
	function DownloadingFile( filename )
	{
		if ( downloadingfiles ) {
			filerequierd = filerequierd - 1;
			loadingBOX();
		}
		if_changestatus = false;
		setTimeout( "if_changestatus = true;", 1000 );
		downloadingfiles = true;
		loadingBOX();
	}
	
	function SetStatusChanged( status )
	{
		if ( downloadingfiles ) {
			filerequierd = filerequierd - 1;
			downloadingfiles = false;
			loadingBOX();
		}
		if_changestatus = false;
		setTimeout( "if_changestatus = true;", 1000 );
		loadingBOX();
	}
	
	function loadingBOX()
	{
		math_difference = Math.round(totalfilerequierd - filerequierd);
		math_percent = Math.round(math_difference / totalfilerequierd * 100);
			
		document.getElementById( "load-box" ).innerHTML = "<div id='load-box-width' style='width:" + math_percent + "%;'></div>";
	}
		
	loadingBOX();