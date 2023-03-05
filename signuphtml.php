<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link rel="stylesheet" href="signup.css">
</head>
<body>
    <div class="container">
        <form action="signup.php" method="post">
            <h1>SIGN UP</h1>
            <?php
                if(isset($_GET['msg']))
                {
                    // echo "set";
                    $style = "display:block;";
                    $msg=$_GET['msg'];
                }
                else
                {
                    // echo "not set";
                    $style = "";
                    $msg="";
                }
            ?>
            
            <div style="background:black;text-align:center;color:red;<?php echo $style?>">
            <p><?php echo $msg;?></p>
            </div>

            <div class="form-group">
                <label>First Name</label>
                <p><input type="text" name="firstname" required></p>
            </div>
            <div class="formgroup">
                <label>Last Name</label>
                <p><input type="text" name="lastname" required></p>
            </div>
            <div>
                <label class="radio-inline"><input type="radio" name="gender" value="m" required>Male</label>
                <label class="radio-inline"><input type="radio" name="gender" value="f">female</label>
                <label class="radio-inline"><input type="radio" name="gender" value="o">Other</label>
            </div>
            <div class="formgroup">
                <label>Email</label>
                <p><input type="email" name="email" required></p>
            </div>
            
            
            <div class="formgroup">
                <label>Enter Password</label>
                <p><input type="password" name="paswad" required></p>
            </div>
            <div class="formgroup">
                <label>Confirm Password</label>
                <p><input type="password" name="paswad2" required></p>
            </div>
            <button type="submit" class="signup">SUBMIT</button>

        </form>
    </div>
    
</body>
</html>