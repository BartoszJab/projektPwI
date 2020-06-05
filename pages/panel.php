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
          <li><a href="pogoda.php">Pogoda</a></li>
          <li><a href="asortyment.php">Asortyment</a></li>
        </ul>
      </nav>
    </header>
    <?php require ('../rejestruj_loguj.php'); ?>
    <div class="btn-container">
      <ul class="select-list">
        <li>
          <button onclick="window.location.href = 'ustawienia_strony.php'" type="button" name="button">Ustawienia strony</button>
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

        $select = $pdo->prepare("SELECT id_uzytkownika, login, email, uprawnienia, zbanowany FROM uzytkownicy");
        $select->execute();

        foreach($select as $row){
          $zbanowany = $row['zbanowany'];
          $id_uzytkownika = $row['id_uzytkownika'];
          $login = $row['login'];
          $email = $row['email'];
          $uprawnienia = $row['uprawnienia'];

          if($uprawnienia != 1 && $zbanowany == 0){
            echo '       <div class="content">
                          <div class="user-data">
                            <div>
                              nick: '.$login.'
                            </div>
                            <div>
                              email: '.$email.'
                            </div>
                            <div>
                              uprawnienia: '.$uprawnienia.'
                            </div>
                          </div>
                          <div class="user-options">
                            <form class="" method="post">
                              <input type="hidden" name="id_banowanego_uzytkownika" value='.$row['id_uzytkownika'].'>
                              <input type="submit" name="zbanuj_uzytkownika" value="Banuj" formmethod="POST">
                            </form>
                          </div>
                        </div>';
           }

        }
        if(isset($_POST['zbanuj_uzytkownika'])){
            $id_banowanego_uzytkownika = $_POST['id_banowanego_uzytkownika'];
            $ban = $pdo->prepare("UPDATE uzytkownicy SET zbanowany = 1 WHERE id_uzytkownika = :id_banowanego_uzytkownika");
            $ban->bindParam('id_banowanego_uzytkownika', $id_banowanego_uzytkownika);
            $ban->execute();
        }
       ?>


        <!--  <img src="../images/avatar2.png" alt="avatar"> -->

      </div>

      <?php require ('poboczny_posty.php'); ?>




    </main>





<footer>Made by Bartosz Jabłoński</footer>
  </body>
</html>
