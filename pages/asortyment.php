<?php session_start(); ?>

<!DOCTYPE html>
<html lang="pl">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/styles.css">
    <title>Asortyment</title>
  </head>
  <body>
    <header>
      <a id="logo" href="../index.php">SkiForum</a>
      <nav class=topnav>
        <ul>
          <?php require ('../pokaz_zakladki.php'); ?>
          <li><a href="forum.php">Forum</a></li>
          <li><a href="pogoda.php">Pogoda</a></li>
        </ul>
      </nav>
    </header>

    <?php require('../rejestruj_loguj.php'); ?>

    <div class="btn-container">
      <ul class="select-list">
        <li>
          <button hidden type="button" name="button">Początkujący</button>
        </li>

      </ul>
    </div>
    <main class="forum-content">
      <div class="subjects">
        <div class="title" style="text-transform: uppercase; font-size: 25px; justify-content: center; background-color: ">
          Polecany asortyment
        </div>
        <div class="content-asortyment">
          <span>RTC Skicross</span>
          <img src="../images/RTC Skicross.jpg" width="500px" height="50px;" alt="rtc skicross">
        </div>

        <div class="content-asortyment">
          <span>Kästle MX 84</span>
          <img src="../images/Kastle MX 84.jpg" width="500px" height="50px;" alt="rtc skicross">
        </div>

        <div class="content-asortyment">
          <span>Elan SLX</span>
          <img src="../images/Elan SLX.jpg" width="500px" height="50px;" alt="rtc skicross">
        </div>

        <div class="content-asortyment">
          <span>Fischer RC4 The Curv</span>
          <img src="../images/Fischer RC4 The Curv.jpg" width="500px" height="50px;" alt="rtc skicross">
        </div>

        <div class="content-asortyment">
          <span>Salomon X-Max X14</span>
          <img src="../images/Salomon X-Max X14.jpg" width="500px" height="50px;" alt="rtc skicross">
        </div>

        <div class="content-asortyment">
          <span>Dynastar Legend X 84</span>
          <img src="../images/Dynastar Legend X 84.jpg" width="500px" height="50px;" alt="rtc skicross">
        </div>
      </div>

      <?php require ('poboczny_posty.php'); ?>

    </main>





<footer>Made by Bartosz Jabłoński</footer>
  </body>
</html>
