<?php 
    $usuario= "root";
    $senha= "";
    $host= "localhost";

    $mysqli= new mysqli($host, $usuario, $senha);

    $mysqli -> query("CREATE DATABASE IF NOT EXISTS OpinaBooks");
    
    $mysqli->close();

    $database= "OpinaBooks";

    $mysqli= new mysqli($host, $usuario, $senha, $database);
    
    if($mysqli -> error){
        die("Falha ao conectar ao banco de dados " . $mysqli -> error);
    }

    $query = "CREATE TABLE IF NOT EXISTS books (
        id  INT AUTO_INCREMENT PRIMARY KEY,
        title VARCHAR(50) NOT NULL,
        author VARCHAR(50) NOT NULL,
        dtRelease INT(4) NOT NULL,
        genre VARCHAR(50) NOT NULL,
        rating VARCHAR(50) NOT NULL,
        comment TEXT,
        img TEXT NOT NULL
    )";
    /*$query = "CREATE TABLE IF NOT EXISTS books (
    id INT(3) AUTO_INCREMENT PRIMARY KEY, 
    title VARCHAR(50), 
    author VARCHAR(50), 
    release DATETIME , 
    gener VARCHAR(50),
    rating VARCHAR(50), 
    comment TEXT,
    img TEXT,
    )";*/

    $mysqli -> query($query);
?>