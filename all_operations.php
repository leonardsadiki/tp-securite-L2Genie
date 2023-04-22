<?php
    require('mesfonctions.php');
    if($_POST['contexte']=="q1"){
        $result=GenererCles($_POST['key'],$_POST['function']);
        echo "<h2>Voici le résultat:  $result</h2>";
    }elseif ($_POST['contexte']=="q2") {
        $result=chiffrement($_POST['N'],$_POST['pi'],$_POST['p'],$_POST['k1'],$_POST['k2']);
        echo "<h2>Voici le résultat:   $result</h2>";
    }elseif ($_POST['contexte']=="q3") {
        $result=dechiffrement($_POST['N'],$_POST['pi'],$_POST['p'],$_POST['k1'],$_POST['k2']);
        echo "<h2>Voici le résultat:   $result</h2>";
    }
