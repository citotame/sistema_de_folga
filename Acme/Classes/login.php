<?php
    require_once 'CRUD/config/config.class.php';
    require_once 'CRUD/CRUD.class.php';

    $login = ($_POST['login']);
    $senha = ($_POST['senha']);

    $con = Conexao::getInstance();
    // $sql = "SELECT * FROM usuario";
    $validar = $con->prepare("SELECT * FROM usuario WHERE name=:name AND senha=:senha");
    $validar->bindValue(":name", $login);
    $validar->bindValue(":senha", $senha);
    $validar->execute();
    // echo $validar->rowCount(); 
    // $validar->execute();
    // $count = $validar->fetchAll(); 
    // print_r ($validar); 
    
//     $result = $con->query( $sql );
//     $rows = $result->fetchAll();
 
//    var_dump( $rows );

    // var_dump($validar);
    
    if ($validar->rowCount() == 1) {
    	echo "<div class='container ui three column centered grid'";
    	echo 	"<h1>Login feito com sucesso!</h1>";
    	echo 	"<h2>Aguarde enquato e redirecionado</h2>";
    	echo "</div>";
        header('location: ../../teste.php');
    }else {
       	echo "<div class='container ui three column centered grid'";
    	echo 	"<h1>deu merda!</h1>";
    	echo 	"<h2>Aguarde enquato e redirecionado</h2>";
    	echo "</div>";
        header('location: ../../index.php');
    }