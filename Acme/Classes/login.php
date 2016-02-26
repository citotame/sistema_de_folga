<?php
    require_once 'CRUD/config/config.class.php';
    require_once 'CRUD/CRUD.class.php';
    
    $login = ($_POST['login']);
    $senha = ($_POST['senha']);
    
    $con = Conexao::getInstance();
    $sth = $con->prepare("SELECT * FROM usuario WHERE name < :login AND senha < :senha");
    $sth->bind_param(':login', $login, PDO::PARAM_STR);
    $sth->bind_param(':senha', $senha, PDO::PARAM_STR);
    $sth->execute();


?>
