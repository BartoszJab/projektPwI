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
            <input type="password" name="stare_haslo" placeholder="Podaj stare hasło" required>
            <input type="password" name="nowe_haslo" placeholder="Podaj nowe haslo" required>
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
          $select = $pdo->prepare("SELECT haslo FROM uzytkownicy WHERE id_uzytkownika = '".$_SESSION['id_uzytkownika']."'");
          $select->execute();
          $f = $select->fetch();
          $stare_haslo = $f['haslo'];

          if(isset($_POST['zmien'])){
            if($_POST['stare_haslo'] == $_POST['nowe_haslo']){
              echo '<span style="color:red">Haslo musi się różnić od poprzedniego</span>';
            }
            elseif($_POST['stare_haslo'] != $stare_haslo){
              echo '<span style="color:red">Poprzednie hasło różni się od podanego</span>';
            }
            else{
              $update = $pdo->prepare("UPDATE uzytkownicy SET haslo = :haslo WHERE id_uzytkownika = :id_uzytkownika");
              $nowe_haslo = $_POST['nowe_haslo'];
              $update->bindParam(':haslo', $nowe_haslo);
              $update->bindParam(':id_uzytkownika', $_SESSION['id_uzytkownika']);
              $update->execute();

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
