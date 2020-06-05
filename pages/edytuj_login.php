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
        <li>
          <button type="button" name="button">Popularne</button>
        </li>
        <li>
          <button type="button" name="button">Aktywne</button>
        </li>
        <li>
          <button type="button" name="button">Twoje posty</button>
        </li>
        <a href="profil.php" style="color:white;font-size: 20px;">Powrót do profilu</a>
      </ul>
    </div>
    <main class="forum-content">
      <div class="subjects">
        <div style="justify-content: center;" class="content">
          <form class="posty" method="POST">
            <input type="text" name="nowy_login" placeholder="Podaj nowy login" required>
            <input type="submit" name="zmien" value="Zmień">
          </form>
        </div>

        <?php
        try{
          $pdo = new PDO('mysql:host=userdb1;dbname=1197239_EkE', '1197239_EkE', 'yXApv34o3YkEFR');
        } catch(PDOException $e){
          echo $e->getMessage();
          die();
        }
          if(isset($_POST['zmien'])){
            // sprawdz czy taki login jest juz w bazie
            $select = $pdo->prepare("SELECT login FROM uzytkownicy WHERE login=:login");
            $select->bindParam(':login', $_POST['nowy_login']);
            $select->execute();
            $count = count($select->fetchAll());
            if($count == "1"){
                echo '<span style="color:red">Podany login jest zajęty</span>';
            }
            else{
              $update = $pdo->prepare("UPDATE uzytkownicy SET login = :login WHERE id_uzytkownika = :id_uzytkownika");
              $nowy_login = $_POST['nowy_login'];
              $update->bindParam(':login', $nowy_login);
              $update->bindParam(':id_uzytkownika', $_SESSION['id_uzytkownika']);
              $update->execute();
              $_SESSION['login_zalogowany'] = $nowy_login;
              header('Location: profil.php');
            }


          }
         ?>
      </div>
      <?php require ('poboczny_posty.php'); ?>

    </main>


<footer>Made by Bartosz Jabłoński</footer>
  </body>
</html>
