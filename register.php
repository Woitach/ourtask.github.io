<?php
    $login = $_POST['login'];
    $name = $_POST['name'];
    $lastname = $_POST["lastname"];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $password = md5($password);

    $connect = @mysqli_connect('sql11.freesqldatabase.com', 'sql11455814', 'vM1SjHddli', 'sql11455814') or die('Brak dostępu do bazy danych');

    $checklogin = @mysqli_query( $connect, 
    "SELECT login FROM user WHERE login = '$login'");
    $islogin = @mysqli_fetch_row($checklogin);


    $checkemail = @mysqli_query( $connect, 
    "SELECT email FROM user WHERE email = '$email'");
    $isemail = @mysqli_fetch_row($checkemail);


    if($islogin)
    {
        echo ("Dany login już istnieje");
    }
    else if($isemail)
    {
        echo ("Email jest w użyciu");
    }
    else
    {
        echo('Zarejestrowano');
        $zapytanie = @mysqli_query( $connect, 
        "INSERT INTO user (login, password, name, Lastname, email, phone) VALUES ('$login', '$password', '$name', '$lastname', '$email', '$phone')");
        $_SESSION['login'] = $login;
        header("Location: index.php");
    }
    