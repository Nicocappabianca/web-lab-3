<?php
    require('./constants.inc'); 
    
    $mysqli = new mysqli(SERVER,USER,PASSWORD,DATABASE); 

    $product_id = $_POST['id']; 
    
    $sql = "DELETE FROM products WHERE id='$product_id'"; 

    if(! $mysqli->query($sql)){
        http_response_code(404); 
    }

    $mysqli->close(); 

?>