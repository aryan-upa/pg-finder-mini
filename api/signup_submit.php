<?php
    require("../includes/database_connect.php");

    $email = $_POST['email'];
    $password = $_POST['password'];
    $password = sha1($password);
    $full_name = $_POST['full_name'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $college_name = $_POST['college_name'];

    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $sql);
    if(!$result){
        echo "<script>alert('Something went wrong!')</script>";
        echo "<script>location.href='../logup.php'</script>";
        return;
    }

    $row_count = mysqli_num_rows($result);
    if ($row_count != 0) {
        echo "<script>alert('This email is already registered with us!')</script>";
        echo "<script>location.href='../logup.php'</script>";
        return;
    }

    $sql = "INSERT INTO users (email, password, full_name, phone, gender, college_name) VALUES ('$email', '$password', '$full_name', '$phone', '$gender', '$college_name')";
    $result = mysqli_query($conn, $sql);
    if(!$result){
        echo "<script>alert('Something went wrong')</script>";
        echo "<script>location.href='../logup.php'</script>";
        return;
    }

    echo "<script>alert('Account created successfully!!!')</script>";
    echo "<script>location.href='../logup.php'</script>";
mysqli_close($conn);
?>
