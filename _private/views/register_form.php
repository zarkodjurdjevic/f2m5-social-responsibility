<?php $this->layout('layouts::website');?>

<h3>Inschrijven</h3>

<form action="<?php echo url("register.handle")?>" method="POST">
    <div>
        <label for="email">Email</label>
        <input type="email" name="email" value="<?php echo input('email')?>" class="form-control" id="email" aria-describedby="email">
        <small id="emailhelp" class="form-text text-muted">We delen u email adres met niemand</small>
        <?php if (isset($errors['email'])):?>
            <?php echo $errors['email']?>
        <?php endif;?>
    </div>
    <div class="form-group">
        <label for="wachtwoord">wachtwoord</label>
        <input type="password" name="wachtwoord" class="form-control" id="wachtwoord">
        <?php if (isset($errors['wachtwoord'])):?>
            <?php echo $errors['wachtwoord']?>
        <?php endif;?>
    </div>
    <button type="submit" class="btn btn-primary">Registreren</button>
</form>