<?php
// $email = $_POST['email'];
// $password = $_POST['paswad'];
// $error = "";
// $success = "";

//database connection
$conn = new mysqli('localhost','root','','users');
if($conn->connect_error){
    die('Connection Failed: '.$conn->connect_error);
}

//validating credentials
if(isset($_POST['login']))
{
    $email = $_POST['email'];
    $password = $_POST['paswad'];

    $query = "SELECT * FROM user WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn,$query);
    //$count = mysqli_num_rows($result);
    if(mysqli_num_rows($result)>0)
    {
        $conn->close();
        header('Location:nyumbani.html');
    }
    else
    {
        header('Location:logInhtml.php');
        echo "Invalid Email or Password";
    }
}


?>