<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pl">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/styles.css">
    <title>Zdjęcia</title>
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
          <button type="button" name="button">Najwyżej oceniane</button>
        </li>
        <li>
          <button type="button" name="button">Wszystkie</button>
        </li>
        <li>
          <button type="button" name="button">Twoje zdjęcia</button>
        </li>
      </ul>
    </div>
    <main class="forum-content">
      <div class="subjects">
        <div class="gallery">
          <div class="pic-container">
            <img src="../images/ex01.jpg" alt="fotka">
            <input type="image" src="../icons/thumb-up.png" alt="thumb icon">
          </div>
          <div class="pic-container">
            <img src="../images/ex02.jpg" alt="fotka">
            <input type="image" src="../icons/thumb-up.png" alt="thumb icon">
          </div>
          <div class="pic-container">
            <img src="../images/ex03.jpg" alt="fotka">
            <input type="image" src="../icons/thumb-up.png" alt="thumb icon">
          </div>
          <div class="pic-container">
            <img src="../images/ex04.jpg" alt="fotka">
            <input type="image" src="../icons/thumb-up.png" alt="thumb icon">
          </div>
          <div class="pic-container">
            <img src="../images/ex03.jpg" alt="fotka">
            <input type="image" src="../icons/thumb-up.png" alt="thumb icon">
          </div>

        </div>

      </div>


      <?php require ('poboczny_posty.php'); ?>

    </main>





<footer>Made by Bartosz Jabłoński</footer>
  </body>
</html>
