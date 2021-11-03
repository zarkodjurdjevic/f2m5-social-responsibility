<?php
// Model functions
// In dit bestand zet je ALLE functions die iets met data of de database doen

function getUsers() {
	$connection = dbConnect();
	$sql        = "SELECT * FROM `users`";
	$statement  = $connection->query( $sql );

	return $statement->fetchAll();
}

function getAllGebruikers(){
	$connection = dbConnect();
    $sql = 'SELECT * FROM `gebruikers`';
    $statement = $connection->query($sql);
    return $statement->fetchAll();
}
function addGebruiker($email, $wachtwoord){
	$connection = dbConnect();
    $sql = "INSERT INTO `gebruikers` (`id`, `email`, `wachtwoord`) VALUES (NULL, :email, :wachtwoord );"; 
    $statement = $connection->prepare($sql);
    $Result = $statement->execute([
        'email' => $email,
        'wachtwoord' => $wachtwoord
	
    ]);
	return $Result;
	

}

function updateGebruikers($gebruikers, $newemail, $newwachtwoord){
    $connection = dbConnect();
    $sql = "UPDATE `gebruikers` SET `email` = :new_email, `wachtwoord` = :new_wacht WHERE `gebruikers`.`id` = :gebruikers_id;";
    $statement = $connection->prepare($sql);
    $result = $statement->execute([
        'new_email' => $newemail,
        'new_wacht' => $newwachtwoord,
        'gebruikers_id' => $gebruikers


    ]);
    return $result;

}

function getUserByEmail($email){
    $connection = dbConnect();
	$sql        = "SELECT * FROM `gebruikers` WHERE `email` = :email";
	$statement  = $connection->prepare($sql);
	$statement->execute([ 'email' => $email]);

    if ( $statement->rowCount() === 1 ) {
        return $statement->fetch();
    }

    return false;

}