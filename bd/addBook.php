<?php
    include('conexao.php');

    //var_dump($_GET);
    //var_dump($_POST);
    $title = $_POST['inTitle'];
    $author = $_POST['inAuthor'];
    $release = $_POST['inRelease'];
    $genre = $_POST['slcGenre'];
    $rating = $_POST['rnRating'];
    $comment = $_POST['txtComment'] ?? '';

    $file= $_FILES['inImg'];
 
    $pasta= "img/";
    $file_name= $file["name"];
    $new_file_name= uniqid();
 
    $copy_file= $_FILES['inImg'];
    $copy_file= explode(".", $copy_file['name']);
    $extencao= strtolower($copy_file[sizeof($copy_file) -1 ]);
 
    
    if($extencao == 'jpg' or $extencao == 'png'){
        $upload=move_uploaded_file($file["tmp_name"], $pasta . $new_file_name . "." . $extencao);
     }else{
        die("Extençao do arquivo não aceita");
    }
 
    $img= $pasta . $new_file_name . "." . $extencao;

    echo "INSERT INTO books (title, author, dtRelease, genre, rating, comment, img) VALUES ('$title', '$author', '$release', '$genre', '$rating', '$comment', '$img')";

    $query_post = "INSERT INTO books (title, author, dtRelease, genre, rating, comment, img) VALUES ('$title', '$author', '$release', '$genre', '$rating', '$comment', '$img')";

    $sql_post = $mysqli -> query($query_post);

    header('Location: ../index.html');
?>