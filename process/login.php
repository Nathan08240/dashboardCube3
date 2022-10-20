<?php

session_start();

include 'connect.php';

$email = $_POST['email'];
$password = $_POST['password'];


// Check if the user exists
$sql = "SELECT email, password, lastname, firstname, role, id FROM staff WHERE email = '$email'";
$sth = $db->prepare($sql);
$sth->execute();
$login = $sth->fetch(PDO::FETCH_ASSOC);

if ($login) {
    // Check if the password is correct
    if (password_verify($password, $login['password'])) {
        // Start the session
        $_SESSION['loggedin'] = true;
        $_SESSION['email'] = $email;
        $_SESSION['role'] = $login['role'];
        $_SESSION['lastname'] = $login['lastname'];
        $_SESSION['firstname'] = $login['firstname'];
        $_SESSION['id'] = $login['id'];
        header('Location: /views/dashboard.php');
        die;
    }
}

header('Location: ../index.php');
