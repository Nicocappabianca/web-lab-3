<?php
    require('./constants.inc'); 
    
    $mysqli = new mysqli(SERVER,USER,PASSWORD,DATABASE); 

    $product_id = $_GET['id']; 

    $sql = "SELECT * FROM products WHERE id='$product_id'";

    if(! ($result = $mysqli->query($sql))){
        http_response_code(404); 
    }

    $row = $result->fetch_assoc();
    $product = new stdClass(); 
    $product->code = $row['id'];
    $product->type = $row['type'];
    $product->measure = $row['measure'];
    $product->description = $row['description'];
    $product->date = $row['date']; 
    $product->stock = $row['stock']; 

    $mysqli->close(); 

    echo json_encode($product);
?>