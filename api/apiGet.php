<?php
    include('../bd/conexao.php');

    $return = array();

    $query = "SELECT * FROM books";

    $sql_get = $mysqli -> query($query);

    while($data = mysqli_fetch_assoc($sql_get)) {
        $return[] = array(
            'id' => $data['id'],
            'title' => $data['title'],
            'author' => $data['author'],
            'dtRelease' => $data['dtRelease'],
            'genre' => $data['genre'],
            'rating' => $data['rating'],
            'comment' => $data['comment'],
            'img' => $data['img'],
        );
    }

    die(json_encode($return));
?>