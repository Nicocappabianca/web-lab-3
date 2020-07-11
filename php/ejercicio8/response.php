<?php
    sleep(1);
    if(!empty($_POST['password'])){
        $password = $_POST['password'];  
        $md5_pass = md5($password);
        $sha1_pass = sha1($password); 
        echo "<h4>Clave ingresada: $password </h4>";
        echo "<h4>Clave encriptada en MD5 $md5_pass </h4>"; 
        echo "<h4>Clave encriptada en SHA1 $sha1_pass </h4>"; 
    }else{
        var_dump(http_response_code(404));
    }
?>