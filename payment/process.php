<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $method = $_POST['method'];
    $amount = $_POST['amount'];

    // You can insert this data into a database here
    // Or send email / redirect to success page

    echo "<h2>Payment Successful</h2>";
    echo "Name: $name <br>";
    echo "Email: $email <br>";
    echo "Method: $method <br>";
    echo "Amount: RM $amount <br>";
    echo "<br><a href='index.html'>Back to Home</a>";
}
?>
