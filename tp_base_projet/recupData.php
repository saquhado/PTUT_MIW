<?php
try {
    $bdd = new PDO(
        'mysql:host=localhost;dbname=ptut;charset=utf8',
        'root',
        'root',
        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING)

    );
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

if(!empty($_GET['latMin'])){
    $req = $bdd->prepare('
select * from magasin where (latMag > ? AND longMag > ?) AND (latMag < ? AND longMag < ?)');
    $req->execute(array($_GET['latMin'], $_GET['longMin'], $_GET['latMax'], $_GET['longMax'], ));
    $magasins = $req -> fetchAll(PDO::FETCH_ASSOC);
    echo(json_encode($magasins));
}
else if(!empty($_GET['ville'])){
    $ville = $_GET['ville'];
    $req = $bdd->prepare('SELECT * from villes where nom like :ville LIMIT 10');
    $req->execute(array('ville' => $ville . '%'));
    $infos_ville = $req -> fetchAll(PDO::FETCH_ASSOC);
    echo(json_encode($infos_ville));
}


