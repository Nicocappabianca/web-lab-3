<?php
    sleep(1); 
    if(!empty($_POST)){
        $response = new stdclass; 
        $response->userId = $_POST['user-id']; 
        $response->nickname = $_POST['nickname']; 
        $response->name = $_POST['name']; 
        $response->surname = $_POST['surname']; 
        $response->birth = $_POST['birth']; 

        echo json_encode($response); 
    } else {
        echo 'Error'; 
    }
?>