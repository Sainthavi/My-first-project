<?php 

$host="localhost";
$user="root";
$password="";
$db="demo";

$uname = "";
$password = "";

$conn = mysqli_connect($host,$user,$password);
mysqli_select_db($conn, $db);

if(isset($_POST['username'])){
    
    $uname=$_POST['username'];
    $password=$_POST['password'];
    
    $sql="select * from users where username='".$uname."'AND password='".$password."' limit 1";
    
    $result=mysqli_query($conn, $sql);
    
    if(mysqli_num_rows($result)==1){
        header("location: index.html");
    }
    else{
        echo " You Have Entered Incorrect Password";
        exit();
    }
        
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="log.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body{ font: 14px sans-serif; }
        .wrapper{ width: 360px; padding: 20px; }
    </style>
</head>
<body>
    <div class="wrapper">
    <img src="image.jpg"/>
        <!-- <h2>Login</h2>
        <p>Please fill in your credentials to login.</p> -->

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                
                <input type="text" name="username" placeholder="Enter the User Name" class="form-control" value="<?php echo $uname; ?>">
            </div>    
            <div class="form-group">
                
                <input type="password" name="password" placeholder="password" class="form-control" value="<?php echo $password; ?>">
            </div>
            <div class="form-group">
                <input type="submit" class="btn-btn-primary" value="Login">
            </div>
        </form>
    </div>
</body>
</html>