<?php
    echo ("<body>
        <header class='header'>
            Nagłówek
        </header>
        <main class='main'>
            <section>
                menu
                <ul>
                    <li>
                        <a href='index.php'>Strona główna</a>
                    </li>");?>
                    <?php
                        session_start();
                        $connect = @mysqli_connect('sql11.freesqldatabase.com', 'sql11455814', 'vM1SjHddli', 'sql11455814') or die('Brak dostępu do bazy danych');
                        if (!isset($_SESSION['login']))
                        {
                            echo ('<li>
                                <a href="index.php?podstrona=registerform.html">Rejestracja</a>
                            </li>
                            <li>
                                <a href="index.php?podstrona=loginform.html">Logowanie</a>
                            </li>');
                        }
                        else
                        {
                            $login = $_SESSION['login'];
                            $query = mysqli_query($connect, 
                            "SELECT name, lastname FROM user WHERE login = '$login'");
                            $rekord = mysqli_fetch_array($query);
                            echo "Witaj, {$rekord[0]} {$rekord[1]}";
                            echo ('<br>');
                            echo ('<li>
                                <a href="index.php?podstrona=profil.php">Profil </a>
                            </li>');
                            echo ('<li>
                                <a href="index.php?podstrona=logout.php">Wyloguj </a>
                            </li>');
                        }
                    ?>
					<?php
                echo ("</ul>
            </section>
        </main>
        <aside class='aside'>
            <section >
			");?>
                <?php
                    if(isset ($_GET['podstrona']))
                    {
                        $strona = $_GET['podstrona'];
                        include ($strona);
                    }
                    else
                    {
                        include("homepage.html");
                    }
                ?>
				<?php
            echo ("</section>
        </aside>
        <footer class='footer'>
            ©Copyright Wojciech Wojtach
        </footer>
    </body>");
	?>
