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
            <input type="text" name="imie" placeholder="Podaj imie">
            <input type="text" name="nazwisko" placeholder="Podaj nazwisko">
            <input type="text" name="wiek" placeholder="Podaj wiek">
            <select name="plec">
                <option value=""></option>
                <option value="m">Mężczyzna</option>
                <option value="k">Kobieta</option>
            </select>
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
            $update = $pdo->prepare("UPDATE dane_konta SET imie=:imie, nazwisko=:nazwisko, wiek=:wiek, plec=:plec WHERE id_uzytkownika = :id_uzytkownika");
            $update->bindParam(':id_uzytkownika', $_SESSION['id_uzytkownika']);

            if(!empty($_POST['imie'])){
              $update->bindParam(':imie', $_POST['imie']);
            } else{
              $update->bindParam(':imie', $_SESSION['imie']);
            }

            if(!empty($_POST['nazwisko'])){
              $update->bindParam(':nazwisko', $_POST['nazwisko']);
            } else{
              $update->bindParam(':nazwisko', $_SESSION['nazwisko']);
            }

            if(!empty($_POST['wiek'])){
              $update->bindParam(':wiek', $_POST['wiek']);
            } else{
              $update->bindParam(':wiek', $_SESSION['wiek']);
            }

            $update->bindParam(':plec', $_POST['plec']);

            $update->execute();

            header('Location: profil.php');
          }
         ?>
      </div>
      <?php require ('poboczny_posty.php'); ?>

    </main>


<footer>Made by Bartosz Jabłoński</footer>
  </body>
</html>
