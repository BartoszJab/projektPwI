<?php
  // jezeli uzytkownik jest zalogowany
    if(isset($_SESSION['login'])){
      echo '<li><a href="profil.php">Profil</a></li>';
    }
  ?>
