<?php
    require('./constants.inc'); 
    
    $mysqli = new mysqli(SERVER,USER,PASSWORD,DATABASE); 


    if(! $sentence = $mysqli->prepare("INSERT INTO products (id, type, measure, description, stock) VALUES(?, ?, ?, ?, ?)")){
        http_response_code(404); 
    }

    if(! $sentence->bind_param('isssi', $code, $type, $measure, $description, $stock)){
        http_response_code(404);
    }

    $code = $_POST['code']; 
    $type = $_POST['product-type'];
    $measure = $_POST['measure'];
    $description = $_POST['description'];
    $stock = $_POST['stock'];

    if(! $sentence->execute()){
        http_response_code(404);
    } 

    $mysqli_close($mysqli); 
?>