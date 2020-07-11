<?php
    require('./constants.inc'); 
    
    $mysqli = new mysqli(SERVER,USER,PASSWORD,DATABASE); 


    if(! $sentence = $mysqli->prepare("UPDATE products SET id=?, type=?, measure=?, description=?, stock=? WHERE id=?")){
        http_response_code(404); 
    }

    if(! $sentence->bind_param('isssii', $code, $type, $measure, $description, $stock, $id)){
        http_response_code(404);
    }

    $id = $_POST['original-code'];
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