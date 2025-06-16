<?php
include('C:/xampp/htdocs/kusina-master1/include/dbconn.php');

if (isset($_POST['signup'])) {
    $username = mysqli_real_escape_string($dbconn, $_POST['username']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // encrypt password
    $level = 2; // 2 = regular staff

    $sql = "INSERT INTO user (username, password, level_id) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($dbconn, $sql);
    mysqli_stmt_bind_param($stmt, "ssi", $username, $password, $level);

    if (mysqli_stmt_execute($stmt)) {
        echo "Signup successful! <a href='login.html'>Click here to login</a>";
    } else {
        echo "Signup failed: " . mysqli_error($dbconn);
    }

    mysqli_stmt_close($stmt);
}
mysqli_close($dbconn);
?>
