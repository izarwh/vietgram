<?php
    $user = $_POST["username"];
    $pass = $_POST["password"];

    $cek = 0;
    // echo $cek;
    include_once "conn.php";
    // to connect to the database

    $query = mysqli_query($conn, "SELECT * FROM account where username ='$user' and pass = '$pass'");
    // to store executed query
    $cek = mysqli_num_rows($query);
    // echo $cek;
    $row = mysqli_fetch_array($query);

    

    if ($cek == 1){
        session_start();
        $_SESSION['new'] = $user;
        $data_profil = mysqli_query($conn,"SELECT * FROM account where username='$user'");
        $row = mysqli_fetch_array($data_profil);
        // mysqli_fetch_array to store top of the list data
        $_SESSION['username'] = $user;
        $_SESSION['status'] = "login";
        $_SESSION['nama'] = $row['nama'];
        $_SESSION['website'] = $row['website'];
        $_SESSION['bio'] = $row['bio'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['phone'] = $row['phone'];
        $_SESSION['gender'] = $row['gender'];
        $_SESSION['pp'] = $row['profilepict'];
        header("location:feed.php");
        // header("location:ceksession.php");

    }else{
        // header("location:index.php");
    }


?>