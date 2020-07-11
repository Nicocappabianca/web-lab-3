<?php
    require('./constants.inc'); 
    
    $mysqli = new mysqli(SERVER,USER,PASSWORD,DATABASE); 

    $sql = "SELECT * FROM products ORDER by stock"; 

    if(!($result = $mysqli->query($sql))){
        http_response_code(404); 
    }

    $products = []; 

    while($row = $result->fetch_assoc()){
        $newProduct = new stdClass(); 
        $newProduct->code = $row['id'];
        $newProduct->type = $row['type'];
        $newProduct->measure = $row['measure'];
        $newProduct->description = $row['description'];
        $newProduct->date = $row['date']; 
        $newProduct->stock = $row['stock']; 

        array_push($products, $newProduct); 
    }

    $products_object = new stdClass(); 

    $products_object->products = $products;
    $products_object->qty = $result->num_rows;

    $mysqli->close(); 

    echo json_encode($products_object);

?>