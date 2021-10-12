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
		$errors = [];

		//validatie email geldig
		$email    = filter_var( $_POST['email'], FILTER_VALIDATE_EMAIL);
		$wachtwoord = trim( $_POST['wachtwoord']);

		if ( $email === false ) {
        //geen email ingevuld 
		}

		if ( empty ($wachtwoord) || strlen($wachtwoord) < 6){
			//geen geldige wachtwoord
		}

		if ( count($errors) === 0 ) {
			
			
			$connection = dbConnect();
			$sql        = "SELECT * FROM `gebruikers` WHERE `email` = :email";
			$statement  = $connection->prepare($sql);
			$statement->execute([ 'email' => $email]);

			if ( $statement->rowCount()===0) {
				$sql   = "INSERT INTO `gebruikers` (`email`, `wachtwoord`) VALUES (:email, :wachtwoord)";
				$statement= $connection->prepare($sql);
				$safe_password = password_hash($wachtwoord, PASSWORD_DEFAULT);
				$params        = [
					'email' => $email,
					'wachtwoord' => $safe_password	

				];
				$statement->execute($params);
				$bedanktUrl = url('register.thankyou');
				redirect($bedanktUrl);
				 

			}else{
				$errors['email'] = 'dit account bestaat al';
				
			}
		}
		$template_engine = get_template_engine();
		echo $template_engine->render('register_Form', ['errors' => $errors]);
	
	}


	public function registrationThankYou(){
		$template_engine = get_template_engine();
		echo $template_engine->render("register_thankyou");

	}
}

