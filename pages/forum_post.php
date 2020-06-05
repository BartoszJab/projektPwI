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
        <li style=" padding-bottom: 15px;">
          <a href="forum.php" style="color:white;font-size: 20px;">Wróć do forum</a>
        </li>

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
      // wypisz tresc i temat posta, w ktorego wszedl uzytkownik
      if(isset($_GET['nr_posta'])){
        $_SESSION['nr_posta'] = $_GET['nr_posta'];
      }

        $select = $pdo->query("SELECT * FROM wpisy WHERE id_wpisu =".$_SESSION['nr_posta']." ");
        foreach($select as $row){
          $id_wpisu = $row['id_wpisu'];
          $tytul = $row['nazwa'];
          $tresc = $row['tresc'];
        }

        echo '<div class="title">
              '.$tytul.'</div>';
        echo '<div class="text">
              '.$tresc.'</div>';

        // dodaj do tabeli 'komentarze' tresc, id skomentowanego wpisu i id uzytkownika piszacego wpis
        if(isset($_POST['komentuj'])){
        $sql = "INSERT INTO komentarze (id_wpisu, id_uzytkownika, login, tresc) VALUES
                                       (:id_wpisu, :id_uzytkownika, :login, :tresc)";
        $insert = $pdo->prepare($sql);

        $insert->bindParam(':id_wpisu', $id_wpisu);
        $insert->bindParam(':id_uzytkownika', $_SESSION['id_uzytkownika']);
        $insert->bindParam(':login', $_SESSION['login']);
        $insert->bindParam(':tresc', $_POST['tresc_komentarza']);

        $insert->execute();

        header('Location: forum_post.php');
        }

        if(isset($_SESSION['login'])){
          echo '<div class="content" style="justify-content: center">
            <form class="posty" action="forum_post.php" method="POST">
              <textarea name="tresc_komentarza" rows="8" cols="80" required></textarea>
              <input type="submit" name="komentuj" value="Skomentuj">
            </form>
          </div>';
        }
       ?>

       <div style="justify-content: center; font-size: 30px;background-color: #485c83;" class="content">
         <span>Komentarze</span>
       </div>


       <?php
       // odczytaj z tabeli komentarze tresc komentarza i jego tworce i wyswietl pod postem
        $select = $pdo->query("SELECT id_komentarza, login, tresc FROM komentarze WHERE id_wpisu=$id_wpisu");
        foreach($select as $row){
          $tresc_komentarza = $row['tresc'];
          $login = $row['login'];
          echo '<div class="content">
                '.$login.': '.$tresc_komentarza.'';
          // jezeli zalogowany jest uzytkownik z uprawnieniami moderatora moze usuwac komentarze
          if(isset($_SESSION['uprawnienia']) && $_SESSION['uprawnienia'] < 3){
            echo '<form class="" method="POST">
                  <input type="hidden" name="id_komentarza" value='.$row['id_komentarza'].'>
                  <input style="margin-left: 10px;" type="submit" name="usun_komentarz" value="Usuń">
                  </form>';
          }
          echo '</div>';
        }

        if(isset($_POST['usun_komentarz'])){
          $sql = "DELETE FROM komentarze WHERE id_komentarza = :id_komentarza";
          $delete = $pdo->prepare($sql);
          $id_komentarza = $_POST['id_komentarza'];
          $delete->bindParam(':id_komentarza', $id_komentarza);
          $delete->execute();
          header('Location:forum_post.php');
        }

        ?>

      </div>

      <?php require ('poboczny_posty.php'); ?>

    </main>


<footer>Made by Bartosz Jabłoński</footer>
  </body>
</html>
