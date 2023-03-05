<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot password</title>
    <link rel="stylesheet" href="forgotpas.css">
</head>
<body>
    <p><b>Forgotten password? Don't worry, we got you.</b></p>
    <div class="container">
        <form action="forgotpas.php" method="POST">
            <h1>RESET PASSWORD</h1>
            <label>Please enter your email:</label>
            <p><input type="text" name="forgotpas" placeholder="eg: johndoe@gmail.com"></p>
            <p><button type="submit" class="fpas" name="forgot">SUBMIT</button></p>
        </form>
    </div>
    
</body>
</html>