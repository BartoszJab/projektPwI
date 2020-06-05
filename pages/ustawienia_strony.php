<?php session_start(); ?>
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
          <li><a href="profil.php">Profil</a></li>
          <li><a href="forum.php">Forum</a></li>
          <li><a href="zdjecia.php">Zdjęcia</a></li>
          <li><a href="pogoda.php">Pogoda</a></li>
          <li><a href="asortyment.php">Asortyment</a></li>
        </ul>
      </nav>
    </header>

    <?php require ('../rejestruj_loguj.php'); ?>

    <div class="btn-container">
      <ul class="select-list">
        <li>
          <button onclick="window.location.href = 'panel.php'" type="button" name="button">Powrót do panelu</button>
        </li>
        <li>
          <button style="margin-left: 100px;" type="button" name="button">Wstrzymaj stronę</button>
        </li>
      </ul>
    </div>

    <div class="main-site-content">
    </div>





<footer>Made by Bartosz Jabłoński</footer>
  </body>
</html>
