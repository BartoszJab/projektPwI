<?php session_start();?>

<!DOCTYPE html>
<html lang="pl">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/styles.css">
    <title>Strona główna</title>
  </head>
  <body>
    <header>
      <a id="logo" href="../index.php">SkiForum</a>
      <nav class=topnav>
        <ul>
          <li><a href="forum.php">Forum</a></li>
          <li><a href="pogoda.php">Pogoda</a></li>
          <li><a href="asortyment.php">Asortyment</a></li>
        </ul>
      </nav>
    </header>

    <?php require ('../rejestruj_loguj.php'); ?>

    <div class="btn-container">
      <ul class="select-list">
        <?php if(isset($_SESSION['uprawnienia']) && $_SESSION['uprawnienia'] < 3){
        echo '<li style="margin-left: 20px; style-t">
                <button onclick="window.location.href=\'panel.php\'" type="button" name="button">Panel administracyjny</button>
              </li>';
        }
        ?>

      </ul>
    </div>
    <main class="main-site-content">
      <div class="profile-info-container">
        <?php
        echo '<img style="margin-top: 20px;" src="../images/default_avatar.png" alt="avatar">'
         ?>

        <?php require ('../konto_informacje.php');?>


      </div>
      <p style="font-size: 30px; margin-bottom: 5px;">Edytuj</p>
      <div style="display: flex;flex-direction: row;">
        <button onclick="window.location.href='edytuj_login.php'" style="margin-top: 10px;" type="button" name="button">Login</button>
        <button onclick="window.location.href='edytuj_haslo.php'" style="margin-top: 10px;" type="button" name="button">Haslo</button>
        <button onclick="window.location.href='edytuj_dane.php'" style="margin-top: 10px;" type="button" name="button">Imie|Nazwisko|Plec|Wiek</button>
      </div>

    </main>

    <footer>Made by Bartosz Jabłoński</footer>
  </body>
</html>
