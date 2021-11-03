<?php $this->layout('layouts::website');?>

<h3>Login</h3>

<form action="<?php echo url("login.handle")?>" method="POST">
        <div class="container">   
               
            <input type="email" placeholder="EMAIL" name="email" required>  
      
            <input type="password" placeholder="Enter Password" name="wachtwoord" required>  
            <button type="submit">Login</button>   
              
              
               
        </div>
</form>