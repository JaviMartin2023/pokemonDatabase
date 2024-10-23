<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();
if(!isset($_SESSION['user'])) {
    header('Location:.');
    exit;
}
$user = $_SESSION['user'];

try {
    $connection = new \PDO(
      'mysql:host=localhost;dbname=pokemondatabase',
      'pokemonuser',
      'pokemonpassword',
      array(
        PDO::ATTR_PERSISTENT => true,
        PDO::MYSQL_ATTR_INIT_COMMAND => 'set names utf8')
    );
} catch(PDOException $e) {
    header('Location: ..');
    exit;
}
if(isset($_POST['id'])) {
    $id = $_POST['id'];
} else {
    $url = '.?op=updatepokemon&result=noid';
    header('Location: ' . $url);
    exit;
}

if(($user === 'even' && $id % 2 != 0) ||
    ($user === 'odd' && $id % 2 == 0)) {
    header('Location: .?op=updatepokemon&result=evenodd');
    exit;
}

if(isset($_POST['name'])) {
    $name = trim($_POST['name']);
} else {
    header('Location: .');
    exit;
}

if(isset($_POST['evolution'])) {
    $evolution = $_POST['evolution'];
} else {
    header('Location: .');
    exit;
}

if(isset($_POST['type'])) {
    $evolution = $_POST['type'];
} else {
    header('Location: .');
    exit;
}

$ok = true;
if(strlen($name) < 2 || strlen($name) > 100) {
    $ok = false;
}
if(!(is_numeric($evolution) && $evolution >= 0 && $evolution <= 1000000)) {
    $ok = false;
}
if(strlen($type) < 2 || strlen($type) > 50) {
    $ok = false;
}

$resultado = 0;

if($ok) {
    $sql = 'update pokemon set name = :name, evolution = :evolution where id = :id, pokemon set type = :type';
    $sentence = $connection->prepare($sql);
    $parameters = ['name' => $name, 'evolution' => $evolution,'type' => $type, 'id' => $id];
    foreach($parameters as $nombreParametro => $valorParametro) {
        $sentence->bindValue($nombreParametro, $valorParametro);
    }
    try {
        $sentence->execute();
        $resultado = $sentence->rowCount();
        $url = '.?op=editpokemon&result=' . $resultado;
    } catch(PDOException $e) {
    }
}

if($resultado == 0) {
    $_SESSION['old']['name'] = $name;
    $_SESSION['old']['evolution'] = $evolution;
    $_SESSION['old']['type'] = $type;
    $url = 'edit.php?op=editpokemon&result=' . $resultado . '&id=' . $id;
}
header('Location: ' . $url);