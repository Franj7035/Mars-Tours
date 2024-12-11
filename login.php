<?php
    // store any errors/messag here
    $errorMessage = "";

    // if the form passes validation after being submitted, this will be true
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        // include the db connection page
        require_once 'dbConnect.php';

        $username = $_POST['txtUserName'];
        $password = $_POST['txtPassword'];

        //this SQL statement to see if the user is logged in
        $sql = "SELECT * FROM tbl_user WHERE user_name='$username' AND password = '$password';";

        //run the SQL statement 
        $result = mysqli_query($dbconn, $sql);

        // put the database query results into an array
        $check = mysqli_fetch_array($result);

        session_start();    
        $_SESSION["id"] = session_id();


        // id there is something in the $check variable, then the user successfully logged in
        if (isset($check)){
            //errorMessage = "Success";
            // open up a PHP session

            $_SESSION["username"] = $check["username"] = $check['user_name'];  
            $_SESSION['isLoggedin'] = true;

            // redirect to the intranet page
            header('Location: intranet.php');
        }
        else{
            // close the existing session
            $_SESSION['isLoggedin'] = false;
            $_SESSION["username"]='';
            $errorMessage = "Login failed. Please try again.";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="main.css" rel="stylesheet">
    <script src="validate.js"></script>
</head>
<body>
    <header>
    <?php include 'menu.php'; ?>

        <!-- title page -->
        <h1>Mars Tours Login</h1>
    </header>

    <main>
        <h2><?php echo $errorMessage; ?></h2>
        <form id="frmlogin" name="frmlogin" method="post" action="login.php" onsubmit="return validateForm();">
            <!-- User Name -->
            <label for="txtUserName">User Name:</label>
            <input type="text" id="txtUserName" name="txtUserName" required>
            <br>
            <!-- Password -->
            <label for="txtPassword">Password:</label>
            <input type="password" id="txtPassword" name="txtPasword" required>

            <!-- Submit Button -->
            <input type="submit" value="Login">
        </form>
    </main>
</body>
</html>