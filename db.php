<?php
try
{
      //$bdd = new PDO('mysql:host=localhost;dbname=chheweqn_marsmallow;charset=utf8','chheweqn_jayli','Test123$test$');
      $bdd = new PDO('mysql:host=localhost;dbname=marsmallow;charset=utf8','root','');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}
?>
