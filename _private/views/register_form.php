<?php $this->layout('layouts::website');?>

<h3>inschrijven</h3>

<p>Schrijf je snel in voor kennis en tips over mentale gezondheid</p>

<form action="" method="POST">
        <div class="form-group">
                <label for="email">EMAIL</label>
                <input type="email" name="email" value="" class="form-control" id="email" aria-describedby="emailHelp">
                <small id="emailHelp" class="form-text text-muted">U email is veilig en gegevens ook</small>
        </div>
        <div class="form-group">
                <label for="wachtwoord">Wachtwoord</label>
                <input type="password" name="wachtwoord" class="form-control" id="wachtwoord">
        </div>
        <button type="submit" class="btn btn-primary">Registreren</button>

</form>





