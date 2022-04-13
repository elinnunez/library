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
        font-size: 15px;
    }
</style>

<?php
    include_once 'header.php';
    include 'connect.php';

    $errors = array(FALSE, FALSE);

    if($_SERVER['REQUEST_METHOD'] == "POST")
	{
        $email = $_POST['email'];
        $usr = $_POST['username'];
        $pw1 = $_POST['pwd'];
        $pw2 = $_POST['pwdrepeat'];
        if($pw1 == $pw2){
            $query = mysqli_query($con, "SELECT Email, Username from user WHERE Email = '$email' AND Username ='$usr' ");
            $num = mysqli_fetch_array($query);
            if($num>0){
                $Hashed_password = password_hash($pw1, PASSWORD_DEFAULT);
                $q2 = mysqli_query($con, "UPDATE user SET Password = '$Hashed_password' WHERE Email = '$email' AND Username = '$usr' ");
                header("Location: login.php");
            }else{
                $errors[0]=TRUE;
            }
        }else{
            $errors[1]=TRUE;
        }
	}
?>

    <div class="page-content">
        <div class = "login-body">
            <head2>
                <title>Log In</title>
                <link rel="stylesheet" href="style.css">
                <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
            </head2>
            <form method="post" class="login-form">
                <h2>Reset Your Password</h2>
                <p>Enter your current email and your new password</p>
                <div class = "login-input">
                    <label class="label-single">Email</label>
                    <input type="text" name="email" placeholder="Enter your e-mail address..." class="input-single">
                </div>
                <div class = "login-input">
                    <label class="label-single">Username</label>
                    <input type="text" name="username" placeholder="Enter your username..." class="input-single">
                    <div class="errors"> <?php if($errors[0]){echo "Email And Username Combination Is Not Associated With An Account";}?> </div>
                </div>
                <div>
                    <label class="label-single">Password</label>
                    <input type="password" placeholder="Password..." id="ipassword" class="input-single" name="pwd" autocomplete="off">
                    <i><span class="material-icons-outlined" id ="icon" onclick="toggle()">visibility_off</span></i>
                    <label class="label-single">Repeat Password</label>
                    <input type="password" placeholder="Password..." id ="ipasswordrepeat" class="input-single" name="pwdrepeat"  autocomplete="off">
                    <div class="errors"> <?php if($errors[1]){echo "Passwords Need to Match and be Non-empty";}?> </div>
                </div>
                <div class = "login-button">
                    <button type="submit" name="Change Password">Send Recovery Email</button>
                </div>
            </form>
        </div>
    </div>
<?php
    include_once 'footer.php';
?>