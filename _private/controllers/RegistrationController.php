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
class RegistrationController {

	public function registrationForm() {

		$template_engine = get_template_engine();
		echo $template_engine->render('register_form');

	}

	public function handleRegistrationForm(){
	// hier wordt het form in verwerkt en doorgestuurd

		$result = validateRegistrationData($_POST);
		
		if ( count($result['errors']) === 0 ) {
			

			if (userNotRegistered($result['data']['email'])) {
				
				createUser($result['data']['email'], $result['data']['wachtwoord']);
				
				$bedanktUrl = url('register.thankyou');
				redirect($bedanktUrl);
				 

			}else{
				$errors['email'] = 'dit account bestaat al';
				
			}
		}
		$template_engine = get_template_engine();
		echo $template_engine->render('register_Form', ['errors' => $result['errors']]);
	
	}


	public function registrationThankYou(){
		$template_engine = get_template_engine();
		echo $template_engine->render("register_thankyou");

	}
}

