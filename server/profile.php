<div>
<form action="" method="POST">
name: 
<input type="text" name="name" value="<?php if(isset($_POST['name'])){echo $_POST['name'];}?>" required><br><br>
email:
<input type="email" name="email" value="<?php if(isset($_POST['email'])){echo $_POST['email'];}?>" required><br><br>
password:
<input type="password" name="password" required><br><br><br>
<button type="submit" name="register"> register</button>
</form>
</div>

<?php
$username = "root";
$password = "";
$database = new PDO ("mysql:host=localhost; dbname=islam;",$username,$password);
if(isset($_POST['register'])){
    $checkEmail = $database->prepare("SELECT * FROM users WHERE EMAIL = :EMAIL");
    $email = $_POST['email'];
    $checkEmail->bindParam("EMAIL",$email);
    $checkEmail->execute();
    if($checkEmail->rowCount()>0){
        echo'ggggg';
    }else{
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $addUser = $database->prepare("INSERT INTO users(name,passsword,email) VALUES(:name,:passsword,:email)");
        $addUser->bindParam("name",$name);
        $addUser->bindParam("passsword",$password);
        $addUser->bindParam("email",$email );
        if($addUser->execute()){
        echo"jjjjj";
        }
        else{
            echo "فشلة";
        }
    }
}
?>

