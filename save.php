<?php
    $login = $_SESSION['login'];
    $password = $_POST['password'];
    $newpassword = $_POST['newpassword'];
    $correctpassword = $_POST['correctpassword'];
    $phone = $_POST['phone'];
    
    $password = md5($password);

    $connect = @mysqli_connect('sql11.freesqldatabase.com', 'sql11455814', 'vM1SjHddli', 'sql11455814') or die('Brak dostępu do bazy danych');

    $checklogin = @mysqli_query( $connect, 
    "SELECT login FROM user WHERE login = '$login' AND password = '$password'");
    $islogin = @mysqli_fetch_row($checklogin);
    if($newpassword != $correctpassword)
    {
        echo "Hasła nie są takie same";
    }
    else
    {
        if(!$islogin)
        {
            echo "Stare hasło jest nie prawidłowe!";
        }
        else
        {
            $newpassword = md5($newpassword);
            $change = mysqli_query($connect, "
            UPDATE user
            SET phone = '$phone', password = '$password'
            WHERE login = '$login'");
            echo "<br> Zapisano";
        }
    }
