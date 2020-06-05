<?php
  session_start();
  try
  {
    $pdo = new PDO('mysql:host=userdb1;dbname=1197239_EkE', '1197239_EkE', 'yXApv34o3YkEFR');
  } catch(PDOException $e){
    echo $e -> getMessage();
    die();
  }

  if(isset($_POST['log-in'])){
    $login = $_POST['login'];
    $haslo = $_POST['haslo'];

    $select = $pdo->prepare("SELECT * FROM uzytkownicy WHERE login=:login");
    $select->bindParam(':login', $login);
    $select->execute();
    //$count = count($select->fetchAll());
    $result = $select->fetchAll();
    $count = count($result);
    foreach($result as $row){
      $haslo_hash = $row['haslo'];
    }

    // jezeli znalazlo obiekt o podanym loginie i hasle
    if($count == "1" && password_verify($haslo, $haslo_hash)){
        $select = $pdo -> prepare("SELECT zbanowany FROM uzytkownicy WHERE login=:login");
        $select->bindParam(':login', $login);
        $f = $select->fetch();
        $zbanowany = $f['zbanowany'];
        // sprawdz czy uzytkownik jest zbanowany
        if($zbanowany == 1){
          $_SESSION['blad'] = '<span style="color:red">Konto zbanowane</span>';
        }
        else{
          $_SESSION['login'] = $login;

          $data = $pdo->prepare("SELECT id_uzytkownika, uprawnienia, email FROM uzytkownicy WHERE login= '$login'");
          $data->execute();
          foreach($data as $row){
            $id_uzytkownika = $row['id_uzytkownika'];
            $uprawnienia = $row['uprawnienia'];
            $email = $row['email'];
          }

          $_SESSION['id_uzytkownika'] = $id_uzytkownika;
          $_SESSION['uprawnienia'] = $uprawnienia;
          $_SESSION['email'] = $email;

          unset($_SESSION['blad']);
          header('Location: ../index.php');
        }

    } // jezeli nie udalo sie zalogowac
    else{
      $_SESSION['blad'] = '<span style="color:red">Nieprawidłowy login lub hasło</span>';
    }
  }
?>

<!DOCTYPE html>
<html lang="pl">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/rejestracja.css">
    <link rel="stylesheet" href="../css/styles.css">
    <title>Zaloguj się</title>
  </head>
  <body>
    <header>
      <a id="logo" href="../index.php">SkiForum</a>

    </header>
    <div class="content">
      <div class="register">
        <header class="register-welcome">Witaj ponownie!</header>
        <form class="register-form" action="logowanie.php" method="post">
          <input type="text" name="login" required placeholder="login">
          <input type="password" name="haslo" required placeholder="Hasło">
          <input style="margin-bottom: 5px;" id="register-btn" type="submit" name="log-in" value="Zaloguj">
          <p>Jednak nie masz konta? <a style="color: white" href="rejestracja.php">Zarejestruj się teraz</a></p>

          <?php
            if(isset($_SESSION['blad'])){
              echo $_SESSION['blad'];

              unset($_SESSION['blad']);
            }
           ?>
        </form>
      </div>
    </div>

    <footer>Made by Bartosz Jabłoński</footer>
  </body>
</html>
