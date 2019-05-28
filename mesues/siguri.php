<?php

	session_start();
	
	require_once 'Model1.php';
	$kontrolli = new mesues();
	
	// if user session is not active(not loggedin) this page will help 'home.php and profile.php' to redirect to login page
	// put this file within secured pages that users (users can't access without login)
	
	if(!$kontrolli->i_loguar())
	{
		// session no set redirects to login page
		$kontrolli->shko_tek('../projekt-shkolla/identifikohu.php');
	}