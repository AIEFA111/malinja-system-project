<?php
include('C:/xampp/htdocs/kusina-master1/include/dbconn.php');

if (isset($_POST['signup'])) {
    $username = mysqli_real_escape_string($dbconn, $_POST['username']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $level = 2; // 2 = staff

    // Check if username already exists
    $check_sql = "SELECT * FROM user WHERE username = ?";
    $check_stmt = mysqli_prepare($dbconn, $check_sql);
    mysqli_stmt_bind_param($check_stmt, "s", $username);
    mysqli_stmt_execute($check_stmt);
    $check_result = mysqli_stmt_get_result($check_stmt);

    if (mysqli_num_rows($check_result) > 0) {
        echo "Username already exists. Please choose another. <a href='signup.html'>Go back</a>";
    } else {
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

    mysqli_stmt_close($check_stmt);
}

mysqli_close($dbconn);
?>
