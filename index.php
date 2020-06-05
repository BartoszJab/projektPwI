<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="pl">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/styles.css">
    <title>Strona główna</title>
  </head>
  <body>
    <header>
      <a id="logo" href="index.php">SkiForum</a>
      <nav class=topnav>
        <ul>
          <?php // jezeli uzytkownik jest zalogowany
            if(isset($_SESSION['login'])){
              echo '<li><a href="pages/profil.php">Profil</a></li>';
            } ?>
          <li><a href="pages/forum.php">Forum</a></li>
          <li><a href="pages/pogoda.php">Pogoda</a></li>
          <li><a href="pages/asortyment.php">Asortyment</a></li>
        </ul>
      </nav>
    </header>
    <?php
    if(!isset($_SESSION['login'])){
      echo " <div class='acc-bar'>
              <ul>
                <li><a href='pages/logowanie.php'>Zaloguj</a></li>
                <li style='margin-left:10px;'><a href='pages/rejestracja.php'>Zarejestruj</a></li>
              </ul>
            </div>";
     }
    else{
      // jezeli login nie zostal zmieniony to wyswietl login, w innym przypadku login_zalogowany, ktory jest loginem po zmianie
      if(!isset($_SESSION['login_zalogowany'])){
        echo "<div class='acc-bar'>
            <ul>
              <li style='margin-right: 20px;'><p>Milo, ze jestes " .$_SESSION['login']."!</p></li>
              <li><a href='wyloguj.php'>Wyloguj</a></li>
            </ul>
          </div>";
      }else {
        echo "<div class='acc-bar'>
            <ul>
              <li style='margin-right: 20px;'><p>Milo, ze jestes " .$_SESSION['login_zalogowany']."!</p></li>
              <li><a href='wyloguj.php'>Wyloguj</a></li>
            </ul>
          </div>";
      }
    }
     ?>

    <main class="main-site-content">
      <div class="popular">
        <div class="popular-element">
          <?php
          try
          {
            $pdo = new PDO('mysql:host=userdb1;dbname=1197239_EkE', '1197239_EkE', 'yXApv34o3YkEFR');
          } catch(PDOException $e){
            echo $e -> getMessage();
            die();
          }

          $recent_posts = $pdo->prepare("SELECT nazwa, id_wpisu FROM (
                                      SELECT * FROM wpisy ORDER BY id_wpisu DESC LIMIT 4
                                    ) sub
                                 ORDER BY id_wpisu ASC");
          $recent_posts->execute();
          echo '<header class="aside-header">Nowe posty</header>';
          foreach($recent_posts as $row){
            $nazwa = $row['nazwa'];
            $id_wpisu = $row['id_wpisu'];

            echo '<div class="content" style="font-size: 20px;">
            Temat: <a href="pages/forum_post.php?nr_posta='.$id_wpisu.'">'.$nazwa.'</a>
             </div>';
          }

          echo '<header class="aside-header">Nowi użytkownicy</header>';
          $new_users = $pdo->prepare("SELECT login FROM (
                                      SELECT * FROM uzytkownicy WHERE zbanowany = 0 ORDER BY id_uzytkownika DESC LIMIT 3
                                    ) sub
                                 ORDER BY id_uzytkownika ASC");
          $new_users->execute();
          foreach($new_users as $row){
            $login = $row['login'];

            echo '<div class="content" style="font-size: 20px; justify-content: center;">
            <span>'.$login.'</span>
             </div>';
          }

          ?>

        </div>
      </div>
      <article class="regulations">
        <h2>Regulamin:</h2>
        <ol>
          <li><p>Nie obrażamy innych. Wyzwiska skutkują banem</p></li>
          <li><p>Nie spamujemy na forum</p></li>
        </ol>
      </article>
    </main>





<footer>Made by Bartosz Jabłoński</footer>
  </body>
</html>
