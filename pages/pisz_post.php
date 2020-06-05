<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="pl">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/styles.css">
    <title>Forum</title>
  </head>
  <body>
    <header>
      <a id="logo" href="../index.php">SkiForum</a>
      <nav class=topnav>
        <ul>
          <?php require ('../pokaz_zakladki.php');?>
          <li><a href="pogoda.php">Pogoda</a></li>
          <li><a href="asortyment.php">Asortyment</a></li>
        </ul>
      </nav>
    </header>

    <?php require('../rejestruj_loguj.php'); ?>


    <div class="btn-container">
      <ul class="select-list">
      <li style="padding-bottom: 15px;">
        <a href="forum.php" style="color:white;font-size: 20px;">Powrót do forum</a>
      </li>

      </ul>
    </div>
    <main class="forum-content">
      <div class="subjects">
        <div style="justify-content: center;" class="content">
          <form class="posty" action="pisz_post.php" method="POST">
            <input type="text" name="temat" placeholder="Temat" required>
            <textarea name="tresc" rows="8" cols="80" placeholder="Pisz..." required></textarea>
            <input type="submit" name="postuj" value="Zapostuj">
          </form>
        </div>

        <?php
        try{
          $pdo = new PDO('mysql:host=userdb1;dbname=1197239_EkE', '1197239_EkE', 'yXApv34o3YkEFR');
        } catch(PDOException $e){
          echo $e->getMessage();
          die();
        }

          if(isset($_POST['postuj'])){
            $sql = 'INSERT INTO wpisy (id_wpisu, id_uzytkownika, nazwa, tresc) VALUES
                                      (DEFAULT, :id_uzytkownika, :nazwa, :tresc)';

            $insert = $pdo->prepare($sql);
            $insert->bindParam(':id_uzytkownika', $_SESSION['id_uzytkownika']);
            $insert->bindParam(':nazwa', $_POST['temat']);
            $insert->bindParam(':tresc', $_POST['tresc']);
            $insert->execute();

            header('Location: forum.php');
          }
         ?>
      </div>
      <?php require ('poboczny_posty.php'); ?>

    </main>


<footer>Made by Bartosz Jabłoński</footer>
  </body>
</html>
