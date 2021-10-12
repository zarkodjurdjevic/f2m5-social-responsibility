<?php

namespace Website\Controllers;


class TestController {
    public function queriesTesten(){
        
        //TODO: topic ophalen
        $gebruikers = getAllGebruikers();
        

        //TODO: topic toevoegen
        $email = "blabla@gmail.com";
        $wachtwoord = "blabla";

        $result = addGebruiker($email, $wachtwoord);       //FUNCTIES ZIJN GEMAAKT IN DE MODEL.PHP

       

        //TODO: topic aanpassen
        $newemail = 'email aanpassen';
        $newwachtwoord = 'wacht1';
        $gebruikers = 5;

        $result = updateGebruikers($gebruikers, $newemail, $newwachtwoord);
        

        //TODO: topic verwijderen
        
        

        
    }

    public function process(){

    }
        













}