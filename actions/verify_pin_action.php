<?php
// Include the connection file
session_start();
include '../settings/connection.php';
include '../functions/clear_data.php';

$email = isset($_SESSION['email']) ? $_SESSION['email'] : '';

if (isset($_POST['verify_pin'])) {
    // Get the email and PIN from the form
    $email = $_SESSION['email']; // Assuming you have stored the email in a session variable
    $pin =  $_SESSION['pin'];
    $username=$_SESSION['username'];
    $role_id=$_SESSION['role_id'];
    $hashed_password=$_SESSION['hashed_password'];
    echo $email;
    echo "I am here";
    // Prepare and execute the SQL query to check if the email and PIN exist in the VerifiablePins table
    $query = "SELECT * FROM VerifiablePins WHERE email = '$email' AND pin = '$pin'";
    $result = $con->query($query);

    // Check if a row is returned
    if ($result->num_rows > 0) {
        // PIN is correct, do something (e.g., mark the email as verified)
        // For demonstration purposes, let's just echo a success message
        $query = "INSERT INTO Users (user_id, username, password, email, role_id,has_room) VALUES(0, '$username', '$hashed_password', '$email', '$role_id',0)";
        // Execute the query
        $result = $con->query($query); 
        echo "Verification successful!";
        if ($con->query($query) === TRUE) {
            // Redirect to login page on successful registration
            header("Location: ../login/login_view.php");
            exit();
        }else {
            // Display error message on register page
            echo "Error: " . $query . "<br>" . $con->error;
        }
    } else {
        // PIN is incorrect or email not found, do something (e.g., show an error message)
        // For demonstration purposes, let's just echo an error message
        echo "Invalid verification PIN. Please try again.";
    }
} else {
    // PIN is not set, do something (e.g., redirect to an error page)
    // For demonstration purposes, let's just echo an error message
    echo "PIN is not set. Please try again.";
}
?>
