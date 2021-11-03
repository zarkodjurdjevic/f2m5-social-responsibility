<?php

namespace Website\Controllers;

use League\Plates\Template\Template;

/**
 * Class WebsiteController
 *
 * Deze handelt de logica van de homepage af
 * Haalt gegevens uit de "model" laag van de website (de gegevens)
 * Geeft de gegevens aan de "view" laag (HTML template) om weer te geven
 *
 */
class LoginController {

	public function loginForm() {

		$template_engine = get_template_engine();
		echo $template_engine->render('login_form');

	}

	public function handleLoginForm() {
		//form valideren wachtwoord en email ingevuld?
		$result = validateRegistrationData($_POST);

		//print_r($result); exit;
		
		//bestaat gebruikers
		if(userNotRegistered($result['data']['email'] ) ){
			$result['errors']['email'] = 'deze gebruiker is niet bekend';
		} else {
			//control wachtwoord klopt
			$user = getUserByEmail($result['data']['email']);

			if(password_verify($result['data']['wachtwoord'], $user['wachtwoord'])){
				//gebruiker inloggen
				$_SESSION['user_id'] = $user['id'];
				//gebruiker doorsturen naar eigen dashboard
				redirect(url('login.dashboard'));

			}else{
				$result['errors']['wachtwoord'] = 'wachtwoord niet correct';
			}
			 
			



		}
		//controleren of wachtwoord klopt(password verify)
		//gebruiker inloggen
		$template_engine = get_template_engine();
		echo $template_engine->render('login_form', ['errors' => $result['errors']]);
		


	}


	public function userDashboard(){
		echo "ingelogd";
	}
	
}

