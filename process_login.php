<?php
include "dbconfig.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the username and password from the form
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Look up the user's credentials in the database
    $user =  $conn->query("SELECT * FROM user WHERE email = '$email' and password='$password'");
    if($user->num_rows != 0){
        $user = $user->fetch_assoc();
        // Set the session variables
        $_SESSION['id'] = $user['id'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['field'] = $user['field'];
        $_SESSION['user_name'] = $user['first_name']." ".$user['surname'];
        // Redirect to the home page
        header('Location: dashboard.php');
    }
    else{
        // Redirect to the login page
        header('Location: login.php?error=1');
    }
}
?>
