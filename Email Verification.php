<?php
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "✅ Valid Email: " . $email;
    } else {
        echo "❌ Invalid Email!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Email Verification</title>
</head>
<body>
    <h2>Email Verification Form</h2>
    <form method="post">
        <input type="text" name="email" placeholder="Enter Email" required>
        <button type="submit" name="submit">Verify</button>
    </form>
</body>
</html>
