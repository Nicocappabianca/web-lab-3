<?php
    require('./constants.inc'); 
    
    $mysqli = new mysqli(SERVER,USER,PASSWORD,DATABASE); 


    $sql = "SELECT * FROM types";

    if(!($result = $mysqli->query($sql))){
        http_response_code(404); 
    }

    $types = []; 

    while($row = $result->fetch_assoc()){
        $newType = new stdClass(); 
        $newType->type = $row['type'];

        array_push($types, $newType); 
    }

    $types_object = new stdClass(); 

    $types_object->types = $types;
    $types_object->qty = $result->num_rows;

    $mysqli->close(); 

    echo json_encode($types_object);
?>