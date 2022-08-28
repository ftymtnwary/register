
<form action="" method="POST">
email:
<input type="email" name="email" value="<?php if(isset($_POST['email'])){echo $_POST['email'];}?>" required><br><br>
password:
<input type="password" name="password" required><br><br><br>
<button type="submit" name="register"> register</button>
</form>



<?php
$username = "root";
$password = "";
$database = new PDO ("mysql:host=localhost; dbname=islam;",$username,$password);

$login = $database->prepare("SELECT * FROM users WHERE email = email AND password= :password");
$login->bindParam("email",$_POST['email']);
$login->bindParam("password",$_POST['password']);
$login->execute();
if($login->rowCount()===1){
$user = $login->fetchObject();
}
?>