<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 7 | Form to encrypt</title>
    <style>
        html{
            font-family: monospace;
            text-align: center; 
            padding-top: 20px; 
        }
        label{
            font-weight: bold;
            font-size: 18px; 
        }
        input{
            display: block; 
            margin: 20px auto; 
        }
    </style>
</head>
<body>
    <form action="./response.php" method="POST">
        <label for="password">Ingrese clave para encriptar</label>
        <input type="text" name="password" required>
        <button type="submit">Enviar</button>
    </form>
</body>
</html>