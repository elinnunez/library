<?php

    $fname = $lname = $email = $username = $password = $passwordrepeat = "";

    $errors = array('email'=>'', 'fname'=>'', 'lname'=>'', 'username'=>'', 'password' => '', 'duplicate' => '');
    
    extract($_POST);
    
    if(isset($_POST['submit-signup'])) {

        // echo "IS SET";
        
        if(empty($_POST['email']) || trim($_POST['email']) == "") {
            $errors['email'] = "An email is required<br/>";
        } else {
            $email = htmlspecialchars($_POST['email']);
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors['email'] = "Email must be a valid email address.<br/>";
            }   
        }
        
        if(empty($_POST['fname']) || trim($_POST['fname']) == "") {
            $errors['fname'] = "A first name is required<br/>";
        } else {
            $fname = htmlspecialchars($_POST['fname']);
            if(!preg_match('/^[a-zA-Z\s]+$/', $fname)) {
                $errors['fname'] = "First name must be letters and spaces only<br/>";
            }
        }
        
        if(empty($_POST['lname']) || trim($_POST['lname']) == "") {
            $errors['lname'] = "A last name is required<br/>";
        } else {
            $lname = htmlspecialchars($_POST['lname']);
            if(!preg_match('/^[a-zA-Z\s]+$/', $lname)) {
                $errors['lname'] = "Last name must be letters and spaces only<br/>";
            }
        }
        
        if(empty($_POST['uid']) || trim($_POST['uid']) == "") {
            $errors['username'] = "A username is required<br/>";
        } else {
            $username = htmlspecialchars($_POST['uid']);
        }
        
        if($_POST['pwd'] != $_POST['pwdrepeat'] || trim($_POST['pwd']) == "") {
            $errors['password'] = "Invalid Password<br/>";
        } else {
            $password = htmlspecialchars($_POST['pwd']);
            $passwordrepeat = htmlspecialchars($_POST['pwdrepeat']);

            $uppercase = preg_match('@[A-Z]@', $password);
            $lowercase = preg_match('@[a-z]@', $password);
            $number    = preg_match('@[0-9]@', $password);

            if(!$uppercase || !$lowercase || !$number || strlen($password) < 8) {
                $errors['password'] = "Invalid Password Style<br/>";
            }
        }
        
        if(!array_filter($errors)) {

            // echo "Form is Valid";

            $connection = mysqli_connect('localhost', 'root', '', 'movieflix_db');

            // Check if connection was successful or not

            if(!$connection) {
                echo "Bad connect";
                die ('Connection unsuccessful : '.mysqli_connect_error());
                // header('location: home.php');
            } else {
                // echo 'Connection Success';

                $encpwd = md5($password);
                // echo $encpwd;

                // $sql = "INSERT INTO USER (status, Fname, Lname, Email, Username, Password) VALUES ('1', '$fname','$lname','$email','$username','$encpwd')";
                
                $sql = "INSERT INTO user (username, password, fname, lname, email) VALUES ('$username','$encpwd','$fname','$lname','$email')";
                $result = mysqli_query($connection, $sql);
                $num = mysqli_affected_rows($connection);

                // Check if INSERT data was successful
                if($result && $num > 0) {
                    // echo 'Successfully signed up';
                    mysqli_close($connection);
                    header('location: login.php?registered=true');
                } else {
                    mysqli_close($connection);
                    // if(mysqli_errno() == 1062) {
                        $errors['duplicate'] = "Error: ".$sql.mysqli_error($connection);
                    // } else {
                    // $errors['duplicate'] = "Error: creating account";
                    // }

                    // header('Refresh: 1, url=signup.php');
                    // header('Location: signup.php?nocache='.time());
                    // die ('Account Creation Error');
                }
            }
        }
    }

?>