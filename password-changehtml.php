<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>password change</title>
    <link rel="stylesheet" href="password-change.css">
</head>
<body>
    <div class="container">
        <form action="password-change.php" method="post">
            <h2>Reset Password</h2>>
            <br>
            <label>Enter email address</label>
            <p><input type="email" name="email" placeholder="eg: johndoe@gmail.com"></p>
            <label>Enter New Password</label>
            <p><input type="password" name="paswad"></p>
            <label>Confirm Password</label>
            <p><input type="password" name="paswad2"></p>
            <br>
            <button type="submit" name="change">Submit Changes</button>
        </form>
    </div>
    
</body>
</html>