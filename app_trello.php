<?php

    $card = $_POST['cardContent'];

    $bdd = new 
        PDO('mysql:host=localhost;dbname=dev2jQuery;charset=utf8', 'root', 'root');
    $reponse = $bdd->query('SELECT COUNT(*) FROM cards');
    $count = $reponse->fetchColumn();
    $count++;

    $bdd->exec('INSERT INTO cards(id, content, position) VALUES("", "'.$card.'", "'.$count.'")');
    $id = $bdd->lastInsertId();

    $array = array('card' => $card, 'id' => $id, 'message' => 'Carte sauvegardée !');

    echo json_encode($array);

?>