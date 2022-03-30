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
    <div class = "signup_body">
        <head2>
            <title>Sign Up</title>
            <link rel="stylesheet" href="style.css">
            <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
        </head2>
        <form action="signup.inc.php" method="post">
        <h2>SIGN UP</h2>
            <div class = "signup_input">
                <label>Full Name</label>
                <input type="text" name="name" placeholder="Full name..."><br>
                <label>Email</label>
                <input type="text" name="email" placeholder="Email..."><br>

                <label>User Name</label>
                <input type="text" name="uid" placeholder="Username..."><br>

                <label>Password</label>
                <input type="password" name="pwd" placeholder="Password..." id="ipassword">
                <i><span class="material-icons-outlined" id ="icon" onclick="toggle()">visibility_off</span></i>

                <label>Repeat Password</label>
                <input type="password" name="pwdrepeat" placeholder="Password..." id ="ipasswordrepeat">
            </div>
            <div class = "message_signredirect">Already a User?</div>
            <div class = "link_signredirect"> 
                <li><a href="login.php">Log In Instead</a></li>
            </div>



            <div class = "signup_button">
                <button type="submit">SIGN UP</button>
            </div>
        </form>
    </div>






<?php
    include_once 'footer.php';
?>