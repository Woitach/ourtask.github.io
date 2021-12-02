<h3>Profil</h3>
<form action="index.php?podstrona=save.php" method="post">
    <div class="form">
        <?php
        $login = $_SESSION['login'];
        $query = mysqli_query($connect, 
        "SELECT password, name, lastname, email, phone FROM user WHERE login = '$login'");
        $rekord = mysqli_fetch_array($query);
            echo '<table>
                <tr>
                    <td>
                        <label>Login</label>
                    </td>
                    <td>
                        <input readonly type="text" name="login" id="login" placeholder=';echo $login; echo'><br>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Stare hasło</label>
                    </td>
                    <td>
                        <input type="password" name="password" id="password"><br>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Nowe hasło</label>
                    </td>
                    <td>
                        <input type="password" name="newpassword" id="newpassword"><br>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Powtórz hasło</label>
                    </td>
                    <td>
                        <input type="password" name="correctpassword" id="correctpassword"><br>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Imie</label>
                    </td>
                    <td>
                        <input type="text" name="name" id="name" placeholder=';echo $rekord[1]; echo'><br>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Nazwisko</label>
                    </td>
                    <td>
                        <input type="text" name="lastname" id="lastname" placeholder=';echo $rekord[2]; echo'><br>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Email</label>
                    </td>
                    <td>
                        <input readonly type="text" name="mail" id="mail" placeholder=';echo $rekord[3]; echo '><br>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Telefon</label>
                    </td>
                    <td>
                        <input type="text" name="phone" id="number" placeholder=';echo $rekord[4]; echo '><br>
                    </td>
                </tr>
            </table>
            <button type="submit">Zapisz</button>';
        ?>
    </div>
</form>