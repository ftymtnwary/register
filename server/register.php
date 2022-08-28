<?php
$dbHost="localhost";
    $dbUesr="root";
    $dbPass="";
    $dbName="islam";
    try{
        $conn= new PDO("mysql:host=$dbHost;dbname=$dbName",$dbUesr,$dbPass);
        //echo"success";
    }catch(Exception $e){
        echo $e->getMessage();
        exit();
    }
if(isset($_POST['submit'])){
    
    
    $name=filter_var($_POST['name'],FILTER_SANITIZE_STRING);
    $email=filter_var($_POST['email'],FILTER_SANITIZE_STRING);
    $password=filter_var($_POST['password'],FILTER_SANITIZE_EMAIL);

    $errors=[];

    if(empty($name)){
        $errors[]="اسمع ترب";
    }elseif(strlen($name)>100){
        $errors[]="هذا اسم ولا فقرة";
    }
    
    if(empty($email)){
        $errors[]="اسمع ترب";
    }elseif(strlen($email)>255){
        $errors[]="هذا ايميل ولا فقرة";
    }
    
    elseif(filter_var($email,FILTER_SANITIZE_EMAIL)==false){
        $errors[]="هذا ايميل ولا فقرة";
    }
    //اسمع اسلام درنه
    $stmm="SELECT email FROM users WHERE email ='$email'";
    $q=$conn->prepare($stmm);
    $q->execute();
    $data=$q->fetch();
    if($data){
        
        $errors[]="hhhhhhhh";

    }
    //هي 
    if(empty($password)){
        $errors[]="اسمع ترب";
    }elseif(strlen($password)>255){
        $errors[]="هذا بسورد ولا فقرة";
    }elseif(strlen($password)<6){
        $errors[]="هذا بسورد ولا فقرة";
    }
    if(empty($errors)){
        //echo "insert db";
        $stm="INSERT INTO users (name,email,password) VALUES ('$name','$email','$password')";
        $conn->prepare($stm)->execute();
    }else{
        var_dump($errors);
    }
}
?>





<form action="register.php" method="POST">
    <input type="text" name="name" value="<?php if(isset($_POST['name'])){echo $_POST['name'];}?>" placeholder="name"><br><br>
    <input type="email" name="email" value="<?php if(isset($_POST['email'])){echo $_POST['email'];}?>" placeholder="email"><br><br>
    <input type="password" name="password" value="<?php if(isset($_POST['password'])){echo $_POST['password'];}?>" placeholder="passwprd"><br><br>
    <input type="submit" name="submit" value="register">
</form>