<?php
  if(!isset($_SESSION['login'])){
    echo " <div class='acc-bar'>
            <ul>
              <li><a href='logowanie.php'>Zaloguj</a></li>
              <li style='margin-left:10px;'><a href='rejestracja.php'>Zarejestruj</a></li>
            </ul>
          </div>";
   }
  else{
    // jezeli login nie zostal zmieniony to wyswietl login, w innym przypadku login_zalogowany, ktory jest loginem po zmianie
    if(!isset($_SESSION['login_zalogowany'])){
      echo "<div class='acc-bar'>
          <ul>
            <li style='margin-right: 20px;'><p>Milo, ze jestes " .$_SESSION['login']."!</p></li>
            <li><a href='../wyloguj.php'>Wyloguj</a></li>
          </ul>
        </div>";
    }else {
      echo "<div class='acc-bar'>
          <ul>
            <li style='margin-right: 20px;'><p>Milo, ze jestes " .$_SESSION['login_zalogowany']."!</p></li>
            <li><a href='../wyloguj.php'>Wyloguj</a></li>
          </ul>
        </div>";
    }
  }
?>
