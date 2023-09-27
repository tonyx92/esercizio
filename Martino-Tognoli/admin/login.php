<?php 
session_start();

if(isset($_POST['login_admin'])){
    $username = escape($_POST['username']);
    $password = escape($_POST['password']);

    
    if ($username === 'admin' && $password === 'admin') {
       
        
    if ($username === 'admin' && $password === 'admin') {
       
        $_SESSION['admin'] = true;
        header("Location:admin/clienti.php");
      
    } else {
        echo "Credenziali errate. Riprova.";
    }
}}


?>




<h1 align='center' >Login</h1>

<br>
<br>


<div class="container">
<form action="" method="post">

<div class="mb-3">
    <label for="Ragione sociale">username</label><br>
    <input type="text" name="username"><br>
    <br>
</div>
<div class="mb-3">
    <label for="Ragione sociale">password</label><br>
    <input type="password" name="password"><br>
</div>
<br>
<div class="mb-3 form-check" >
    <button type="submit" class="btn btn-primary" name="login_admin" value="Login admin">Login</button>
   
</div>
</form>
</div>