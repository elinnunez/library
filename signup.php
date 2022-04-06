<script>
    var state = false;
    function toggle(){
        if(state){
            document.getElementById("ipassword").setAttribute("type","password");
            document.getElementById("ipasswordrepeat").setAttribute("type","password");
            document.getElementById("icon").innerText = "visibility_off";
            state = false;
        }
        else{
            document.getElementById("ipassword").setAttribute("type","text");
            document.getElementById("ipasswordrepeat").setAttribute("type","text");
            document.getElementById("icon").innerText = "visibility";
            state = true;
            icon.innerT = "visibility";
        }
    }
</script>


<style>

    .errors {
        display: flex;
        flex-direction: row;
        justify-content: space-around;
        align-items: center;
        color: red;
    }

</style>


<!DOCTYPE HTML>
<?php
    include_once 'header.php';
    // include_once 'login.php';
    // include_once 'createuser.php';
    include('validate_signup.php');
?>

<html>
    <div class="page-content">
        <div class = "signup-body">
            <head2>
                <title>Sign Up</title>
                <link rel="stylesheet" href="style.css">
                <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
            </head2>
            <form action="signup.php" method="post" class="signup-form">
                <h2>SIGN UP</h2>
                <div class = "signup-input">
                    <label class="label-double">Full Name</label><br>
                    <input type="text" name="fname" placeholder="First name..." class="input-double">
                    <input type="text" name="lname" placeholder="Last name..." class="input-double"><br>
                    <div class="errors">
                    <p>
                        <?php echo $errors['fname'];?>
                    </p>
                    <p>
                        <?php echo $errors['lname'];?>
                    </p>
                    </div>
                    <label class="label-single">Email</label>
                    <input type="text" name="email" placeholder="Email..." class="input-single">
                    <div class="errors"><?php echo $errors['email'];?></div>
                    <label class="label-single">User Name</label>
                    <input type="text" name="uid" placeholder="Username..." class="input-single">
                    <div class="errors"><?php echo $errors['username'];?></div>
                    <label class="label-single">Password</label>
                    <input type="password" name="pwd" placeholder="Password..." id="ipassword" class="input-single">
                    <i><span class="material-icons-outlined" id ="icon" onclick="toggle()">visibility_off</span></i>
                    <div class="errors"><?php echo $errors['password'];?></div>
                    <label class="label-single">Repeat Password</label>
                    <input type="password" name="pwdrepeat" placeholder="Password..." id ="ipasswordrepeat" class="input-single">
                    <div class="errors"><?php echo $errors['password'];?></div>
                </div>
                <div class = "message-signredirect">Already a User?</div>
                <div class = "link-signredirect"> 
                    <li><a href="login.php">Log In Instead</a></li>
                </div>
                <div class = "signup-button">
                    <button type="submit" name="submit-signup">SIGN UP</button>
                </div>
                <div class="errors"><?php echo $errors['duplicate'];?></div>
            </form>
        </div>
    </div>
</html>
<?php
    include_once 'footer.php';
?>
