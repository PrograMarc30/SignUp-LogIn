<?php
    session_start();

    // connect to database
    $db = mysqli_connect("localhost", "root", "", "authentication");

    if(isset($_POST['register_btn'])){
        session_start();
        $username = mysql_real_escape_string($_POST['username']);
        $email = mysql_real_escape_string($_POST['email']);
        $password = mysql_real_escape_string($_POST['password']);
        $password2 = mysql_real_escape_string($_POST['password2']);

        if($password == $password2){
            // create user
            $password = md5($password); // hash password before storing for security purposes
            $sql = "INSERT INTRO users(username, email, password) VALUES('$username', '$email', '$password')";
            $mysqli_query($db, $sql);
            $_SESSION['message'] = "Ahora estás en tu cuenta";
            $_SESSION['username'] = $username;
            header("location: home.php"); // Redirect to home page
        } else{
            // failed
            $_SESSION['message'] = "Las contraseñas no coinciden";
        }
    }

?>



<!DOCTYPE html>
<html>
<head>
    <title>Register, login and logout user</title>
</head>
<body>
    <div class="header">
        <h1>Register, login and logout user</h1>
    </div>

    <form method="post" action="register.php">
        <table>
            <tr>
                <td>Username:</td>
                <td><input type="text" name="username" class="textInput"></td>
            </tr>
            <tr>
                <td>Email:</td>
                <td><input type="email" name="email" class="textInput"></td>
            </tr>
            <tr>
                <td>Password:</td>
                <td><input type="password" name="password" class="textInput"></td>
            </tr>
            <tr>
                <td>Password again:</td>
                <td><input type="password" name="password2" class="textInput"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="register_btn" value="Register"></td>
            </tr>
        </table>
    </form>
</body>
</html>