<?php
    session_start();
    try
    {
      $pdo = new PDO('mysql:host=userdb1;dbname=1197239_EkE', '1197239_EkE', 'yXApv34o3YkEFR');
    } catch(PDOException $e){
      echo $e -> getMessage();
      die();
    }

      if(isset($_POST["register"])){
        $sql = 'INSERT INTO uzytkownicy (id_uzytkownika, login, haslo, email, uprawnienia) VALUES
                                       (DEFAULT, :login, :haslo, :email, 3)';

        $sql2 = 'INSERT INTO dane_konta (id_uzytkownika, imie, nazwisko, wiek, plec, avatar) VALUES
                                      (LAST_INSERT_ID(), NULL, NULL, NULL, NULL, "../images/default_avatar.PNG")';

        $login = $_POST['login'];
        $haslo = $_POST['haslo'];
        $email = $_POST['email'];
        // sprawdz czy login i email sa zajete
        $checkLogin = $pdo->prepare('SELECT COUNT(*) FROM uzytkownicy WHERE login = ?');
        $checkLogin->execute([$login]);
        $loginCount = $checkLogin->fetchColumn();

        $checkEmail = $pdo->prepare('SELECT COUNT(*) FROM uzytkownicy WHERE email = ?');
        $checkEmail->execute([$email]);
        $emailCount = $checkEmail->fetchColumn();

        if($loginCount > 0){
          $_SESSION['loginBlad'] = '<span style="color:red">Nazwa jest zajęta</span>';
        }
        elseif($emailCount > 0){
          $_SESSION['emailBlad'] = '<span style="color:red">Istnieje konto o podanym emailu</span>';
        }
        else{
          unset($_SESSION['loginBlad']);
          unset($_SESSION['emailBlad']);

          $haslo_hash = password_hash($haslo, PASSWORD_DEFAULT);

          $insert = $pdo -> prepare($sql);
          $insert->bindParam(':login', $login);
          $insert->bindParam(':haslo', $haslo_hash);
          $insert->bindParam(':email', $email);
          $insert->execute();

          $insert2 = $pdo->prepare($sql2);
          $insert2->execute();

          header('Location: logowanie.php');
        }
    }
 ?>

<!DOCTYPE html>
<html lang="pl">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/rejestracja.css">
    <link rel="stylesheet" href="../css/styles.css">
    <title>Zarejestruj się</title>
  </head>
  <body>
    <header>
      <a id="logo" href="../index.php">SkiForum</a>
    </header>
    <div class="content">
      <div class="register">
        <header class="register-welcome">Witaj nowy użytkowniku</header>
        <form action="rejestracja.php" class="register-form" method="POST">
          <input type="text" name="login" required placeholder="Login">
          <input type="password" name="haslo" required placeholder="Hasło">
          <input type="email" name="email" required placeholder="e-mail">
          <input style="margin-bottom: 5px;" id="register-btn" type="submit" name="register" value="Zarejestruj">
          <p>Masz już konto? <a href="logowanie.php" style="text-decoration:underline; color: white">Zaloguj się</a></p>
          <?php
            if(isset($_SESSION['loginBlad'])){
              echo $_SESSION['loginBlad'];

            } elseif(isset($_SESSION['emailBlad'])){
              echo $_SESSION['emailBlad'];
            }
            unset($_SESSION['loginBlad']);
            unset($_SESSION['emailBlad']);
           ?>

        </form>
      </div>
    </div>

    <footer>Made by Bartosz Jabłoński</footer>
  </body>
</html>
