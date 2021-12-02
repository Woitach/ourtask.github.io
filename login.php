<?php
    $login = $_POST['login'];
    $password = $_POST['password'];

    $password = md5($password);

    $connect = @mysqli_connect('sql11.freesqldatabase.com', 'sql11455814', 'vM1SjHddli', 'sql11455814') or die('Brak dostępu do bazy danych');

    $checklogin = @mysqli_query( $connect, 
    "SELECT login FROM user WHERE login = '$login' AND password = '$password'");
    $islogin = @mysqli_fetch_row($checklogin);


    if($islogin)
    {
        echo('Zalogowano');
        $_SESSION['login'] = $login;
        header("Location: index.php");
        echo '<meta http-equiv="refresh"/>';
    }
    else
    {
        echo ("Nie poprawny login lub hasło");
    }
