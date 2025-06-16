<?php
// Include database connection
include 'include/dbconn.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and get input values
    $username = mysqli_real_escape_string($dbconn, $_POST['username']);
    $password = mysqli_real_escape_string($dbconn, $_POST['password']);
    $name     = mysqli_real_escape_string($dbconn, $_POST['name']);
    $telephone    = mysqli_real_escape_string($dbconn, $_POST['telephone']);
    $email    = mysqli_real_escape_string($dbconn, $_POST['email']);
    $gender   = mysqli_real_escape_string($dbconn, $_POST['gender']);

    // Hash the password (recommended)
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Update query (assuming username is the key to identify user)
    $sql = "UPDATE user SET 
                password = '$hashed_password',
                name = '$name',
                telephone = '$telephone',
                email = '$email',
                gender = '$gender'
            WHERE username = '$username'";

    // Execute query and check result
    if (mysqli_query($dbconn, $sql)) {
        echo "<script>alert('Profile updated successfully.'); window.location.href='update.html';</script>";
    } else {
        echo "Error: " . mysqli_error($dbconn);
    }
}
?>
