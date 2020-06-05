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

        <?php
          if(isset($_SESSION['login'])){
            echo '<li style="padding-bottom: 15px;">
                    <a href="pisz_post.php" style="color:white;font-size: 20px; ">Stwórz post</a>
                  </li>';
          }
         ?>

      </ul>
    </div>

    <main class="forum-content">
      <div class="subjects">
      <?php
        try
        {
          $pdo = new PDO('mysql:host=userdb1;dbname=1197239_EkE', '1197239_EkE', 'yXApv34o3YkEFR');
        } catch(PDOException $e){
          echo $e -> getMessage();
          die();
        }

        $select = $pdo->query("SELECT * FROM wpisy");

        foreach($select as $row){
          $id_uzytkownika = $row['id_uzytkownika'];
          $tytul = $row['nazwa'];
          $tresc = $row['tresc'];
          $id_wpisu = $row['id_wpisu'];

          $stmt = $pdo->query("SELECT login FROM uzytkownicy WHERE id_uzytkownika = '$id_uzytkownika'");
          $user = $stmt -> fetch();

          echo '<div class="content">
                '.$user['login'].': <a href="forum_post.php?nr_posta='.$id_wpisu.'">'.$tytul.'</a>';

          if(isset($_SESSION['uprawnienia']) && $_SESSION['uprawnienia'] < 3){
            echo '<form class="" method="POST">
                  <input type="hidden" name="id_wpisu" value='.$row['id_wpisu'].'>
                  <input style="margin-left: 10px;" type="submit" name="usun_post" value="Usuń">
                  </form>';
          }
          echo '</div>';
        }

        if(isset($_POST['usun_post'])){


          $sql = "DELETE FROM wpisy WHERE id_wpisu = :id_wpisu";
          $delete = $pdo->prepare($sql);

          $delete_comments = $pdo->prepare("DELETE FROM komentarze WHERE id_wpisu = :id_wpisu");

          $id_wpisu = $_POST['id_wpisu'];
          $delete->bindParam(':id_wpisu', $id_wpisu);
          $delete_comments->bindParam(':id_wpisu', $id_wpisu);
          $delete_comments->execute();
          $delete->execute();

          header('Location: forum.php');
        }
       ?>


      </div>

      <?php require ('poboczny_posty.php'); ?>






    </main>


<footer>Made by Bartosz Jabłoński</footer>
  </body>
</html>
