<aside class="">
  <header class="aside-header">
    Najnowsze posty
  </header>

<?php

  try
  {
    $pdo = new PDO('mysql:host=userdb1;dbname=1197239_EkE', '1197239_EkE', 'yXApv34o3YkEFR');
  } catch(PDOException $e){
    echo $e -> getMessage();
    die();
  }

  $select = $pdo->prepare("SELECT nazwa, id_wpisu FROM (
                              SELECT * FROM wpisy ORDER BY id_wpisu DESC LIMIT 5
                            ) sub
                         ORDER BY id_wpisu ASC");
  $select->execute();
  foreach($select as $row){
    $nazwa = $row['nazwa'];
    $id_wpisu = $row['id_wpisu'];
    echo '<div class="content" style="font-size: 20px;">
    Temat: <a href="forum_post.php?nr_posta='.$id_wpisu.'">'.$nazwa.'</a> </div>';
  }
 ?>


</aside>
