<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 7 | Form to encrypt</title>
    <style>
        html{
            font-family: monospace; 
            padding-top: 30px; 
            font-size: 20px; 
        }
        span{
            color: #F05731; 
        }
        p{
            padding-bottom: 30px; 
        }
    </style>
</head>
<body>
    <?php
        if(empty($_POST['password'])){
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            die(); 
        }
    ?>

    <h4>Clave ingresada: <span><?= $_POST['password']; ?></span></h4>
    <h4>Clave encriptada en MD5: <span><?= md5($_POST['password']); ?></span></h4>
    <p>(120 bits o 16 pares hexadecimales)</p>
    <h4>Clave encriptada en SHA1: <span><?= sha1($_POST['password']); ?></span></h4>
    <p>(160 bits o 20 pares hexadecimales)</p>
</body>
</html>