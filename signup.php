<?php


$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$password = $_POST['paswad'];
$password2 = $_POST['paswad2'];

if($password === $password2)
{
    // connect to database
    $conn = new mysqli('localhost','root','','users');
    if($conn->connect_error){
        die('Connection Failed: '.$conn->connect_error);
    }
    else
    {
        //continue;
    }
    //check whether email is already in use
    $email_check_query = "SELECT * FROM user WHERE email= '$email' LIMIT 1";
    $email_result = mysqli_query($conn, $email_check_query);


    if(mysqli_num_rows($email_result)>0)
    {
        header('Location:signuphtml.php?msg=Email already in use');
    
    }
    else{
        $stmt = $conn->prepare("insert into user(firstname, lastname, gender, email, password) values(?,?,?,?,?)");
        $stmt -> bind_param("sssss",$firstname, $lastname, $gender, $email, $password);
        $stmt->execute();
        $stmt->close();
        $conn->close();
        header('Location:logInhtml.php');
    }
}
else
{
    header('location:signuphtml.php?msg=passwords dont match');
}

?>