<div class="user-data">
  <?php
    try{
      $pdo = new PDO('mysql:host=userdb1;dbname=1197239_EkE', '1197239_EkE', 'yXApv34o3YkEFR');
    }catch(PDOException $e){
      echo $e->getMessage();
      die();
    }

     $data2 = $pdo->prepare("SELECT imie, nazwisko, wiek, plec, avatar FROM dane_konta WHERE id_uzytkownika='".$_SESSION['id_uzytkownika']."'");
     $data2->execute();
     foreach($data2 as $row){
       $imie = $row['imie'];
       $nazwisko = $row['nazwisko'];
       $wiek = $row['wiek'];
       $plec = $row['plec'];
       $avatar = $row['avatar'];
     }
     $_SESSION['imie'] = $imie;
     $_SESSION['nazwisko'] = $nazwisko;
     $_SESSION['wiek'] = $wiek;

     $select = $pdo->prepare("SELECT login, email FROM uzytkownicy WHERE id_uzytkownika = '".$_SESSION['id_uzytkownika']."'");
     $select->execute();
     foreach($select as $row){
       $login_uzytkownika = $row['login'];
       $email_uzytkownika = $row['email'];
     }


     echo "<p>Nazwa użytkownika: ".$login_uzytkownika."</p>";
     echo "<p>Email: ".$email_uzytkownika."</p>";

     switch($_SESSION['uprawnienia']){
       case 1:
        echo "<p>Rola: administrator</p>";
        break;
       case 2:
         echo "<p>Rola: moderator</p>";
         break;
       case 3:
         echo "<p>Rola: użytkownik</p>";
         break;
     }
     echo "<p>Wiek: $wiek</p>";

    echo "<p>Imie: $imie</p>";
    echo "<p>Nazwisko: $nazwisko</p>";
    switch($plec){
      case 'm':
        echo "<p>Plec: mężczyzna</p>";
        break;
      case 'k':
        echo "<p>Plec: kobieta</p>";
        break;
      default:
        echo "<p>Plec: </p>";
    }
   ?>
</div>
