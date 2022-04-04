<?php

	session_start();

	require_once 'class.user.php';
	$session = new USER();

	// if user session is not active(not loggedin) this page will help 'home.php and profile.php' to redirect to login page
	// put this file within secured pages that users (users can't access without login)

	if(!$session->is_loggedin())
	{
		// session não definida redireciona para página de login
		$session->redirect('denied.php');
	}
