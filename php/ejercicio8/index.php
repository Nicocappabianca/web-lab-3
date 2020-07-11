<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 8 | AJAX</title>
    <style>
        *{box-sizing: border-box;}
        html{
            font-family: monospace;
            text-align: center; 
            padding-top: 20px;
            font-weight: bold;  
        }
        .box{
            width: 200px;
            height: 200px;
            float: left; 
            margin: 10px; 
        }
        .one{
            background-color: #E2F52A; 
            padding-top: 70px;
        }
        .one input{margin-top: 10px;}
        .two{
            background-color: #8ABAF7; 
            padding-top: 40px; 
        }
        .two img:hover{width:65px;}
        .three{
            background-color: #F07930; 
            padding-top: 50px; 
        }
        .four{
            background-color: #DF7298; 
            padding: 10px 0 0 20px; 
            width: 400px; 
            text-align: left; 
        }
    </style>
</head>
<body>
    <div class="box one">
        <label for="password">Ingrese clave para encriptar</label>
        <input type="text" name="password" id="password">
    </div>
    <div class="box two">
        <h3>Click para ecriptar</h3>
        <a href="#" id="btn-encrypt"><img src="./ecrypt.png" alt="encriptar" width="50"></a>
    </div>
    <div class="box three">
        <h3>Estado del requerimiento</h3>
        <p id="request-status"></p>
    </div>
    <div class="box four">
        <h3>Resultado</h3>
        <div id="response"></div>
    </div>
    <div style="clear:both;"></div>
</body>
</html>

<script src="./jquery.js"></script>


<script>
    $(document).ready(function(){
        $('#btn-encrypt').click(function(){
            $('#response').html('esperando respuesta...'); 
            $('#request-status').html('pending...'); 
            $.ajax({
                type:'POST', 
                url: './response.php', 
                data: {password: $('#password').val()}, 
                success: function(res, status){
                    $('#response').empty();
                    $('#request-status').empty();
                    $('#response').append(res); 
                    $('#request-status').append(status);  
                }, 
                error: function(res, status) {
                    $('#response').empty();
                    $('#request-status').empty();
                    $('#request-status').append(status);  
                },
            }); 
        }); 
    }); 
</script>