<?php session_start(); ?>
<!DOCTYPE HTML>
<html lang="pl">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/styles.css">
    <title>Pogoda</title>

  </head>
  <body>
    <header>
      <a id="logo" href="../index.php">SkiForum</a>
      <nav class=topnav>
        <ul>
          <?php require ('../pokaz_zakladki.php'); ?>
          <li><a href="forum.php">Forum</a></li>
          <li><a href="asortyment.php">Asortyment</a></li>
        </ul>
      </nav>
    </header>

    <?php require ('../rejestruj_loguj.php'); ?>

    <div class="btn-container">
      <ul>
        <li></li>
        <li></li>
      </ul>

    </div>
    <main class="forum-content">
      <div class="subjects">
        <a class="weatherwidget-io" href="https://forecast7.com/pl/52d2321d01/warsaw/" data-label_1="Warszawa" data-label_2="Pogoda" data-font="Times New Roman" data-icons="Climacons" data-theme="sky" >Warszawa Pogoda</a>
<script>
!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src='https://weatherwidget.io/js/widget.min.js';fjs.parentNode.insertBefore(js,fjs);}}(document,'script','weatherwidget-io-js');
</script>

      </div>

      <?php require ('poboczny_posty.php'); ?>

    </main>





<footer>Made by Bartosz Jabłoński</footer>
  </body>
</html>
