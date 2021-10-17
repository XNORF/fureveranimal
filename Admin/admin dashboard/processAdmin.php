<?php
include "";
if(isSet($_POST['addRoomButton']))
	{
	addNewRoom();
	header( "refresh:0; url=roomList.php");
	}
else 
	if(isSet($_POST['deleteRoomButton']))
	{
	//print_r($_POST);
	deleteRoom();	
	header( "refresh:0; url=roomList.php");
	}
else 
	if(isSet($_POST['updateRoomButton']))
	{
	updateRoomInformation();
	header( "refresh:0; url=roomList.php");
	}


?>