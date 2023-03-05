<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="container">
        <div class="form">
            <form action="login.php" method="post">
                <h1>LOGIN</h1>
                <div class="form-group">
                    <label>Enter Email Adress</label>
                    <p><input type="text" placeholder="eg: johndoe@gmail.com" name="email" required></p>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <p><input type="password" name="paswad" required></p>
                </div>
                <button type="submit" name="login">LOGIN</button>
                <p><u><a href="forgotpashtml.php">Forgot password?</a></u></p>
            
            </form>
        </div>

    </div>
    
</body>
</html>