<?php
    require_once 'CRUD/config/config.class.php';
    require_once 'CRUD/CRUD.class.php';
    
    // $host = "localhost";
    // $db = "server";
    // $user = "root";
    // $pass = "cito";
    
    // $con = new conectar();
    // $con->conexao($host, $db, $user, $pass);
    
    // $con = new Conexao();
    // $login = $_POST['login'];
    // $senha = $_POST['senha'];
    
    $con = Conexao::getInstance();
    $con->prepare("SELECT * FROM usuario WHERE name = ? AND senha = ?");
    $con->bind_param(1, $_POST['login']);
    $con->bind_param(2, $_POST['senha']);
    $con->execute();
    
    $obj = $con->fetchObject();
    if ($obj) { 
    $_SESSION['login'] = $_POST['login']; 
    header('Location: http://outro/lugar'); 
    } else { 
    echo '<p class="erro">Login/Senha inv&aacute;lidos</p>'; 
    }   

    // var_dump($con);

?>
