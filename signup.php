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

<?php
    include_once 'header.php';
?>
    <div class="page-content">
        <div class = "signup-body">
            <head2>
                <title>Sign Up</title>
                <link rel="stylesheet" href="style.css">
                <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
            </head2>
            <form action="signup.inc.php" method="post" class="signup-form">
                <h2>SIGN UP</h2>
                <div class = "signup-input">
                    <label class="label-double">Full Name</label><br>
                    <input type="text" name="name" placeholder="First name..." class="input-double">
                    <input type="text" name="name" placeholder="Last name..." class="input-double"><br>
                    <label class="label-single">Email</label>
                    <input type="text" name="email" placeholder="Email..." class="input-single">

                    <label class="label-single">User Name</label>
                    <input type="text" name="uid" placeholder="Username..." class="input-single">

                    <label class="label-single">Password</label>
                    <input type="password" name="pwd" placeholder="Password..." id="ipassword" class="input-single">
                    <i><span class="material-icons-outlined" id ="icon" onclick="toggle()">visibility_off</span></i>

                    <label class="label-single">Repeat Password</label>
                    <input type="password" name="pwdrepeat" placeholder="Password..." id ="ipasswordrepeat" class="input-single">
                </div>
                <div class = "message-signredirect">Already a User?</div>
                <div class = "link-signredirect"> 
                    <li><a href="login.php">Log In Instead</a></li>
                </div>



                <div class = "signup-button">
                    <button type="submit">SIGN UP</button>
                </div>
            </form>
        </div>
    </div>
<?php
    include_once 'footer.php';
?>