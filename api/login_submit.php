<?php
    session_start();
    require("../includes/database_connect.php");

    $email = $_POST['email'];
    $password = $_POST['password'];
    $password = sha1($password);

    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        echo "<script>alert('Something went wrong!')</script>";
        echo "<script>location.href='../logup.php'</script>";
        return;
    }

    $row_count = mysqli_num_rows($result);
    if ($row_count == 0) {
        echo "<script>alert('Invalid email or password!!')</script>";
        echo "<script>location.href='../logup.php'</script>";
        return;
    }

    $row = mysqli_fetch_assoc($result);
    $_SESSION['user_id'] = $row['id'];
    $_SESSION['full_name'] = $row['full_name'];
    $_SESSION['email'] = $row['email'];

    echo "<script>alert('Login successful!')</script>";
    echo "<script>location.href='../home.php';</script>";
    mysqli_close($conn);
?>
