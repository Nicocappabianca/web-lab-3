<style>html{font-family: Verdana, Geneva, Tahoma, sans-serif;}span{color:#2C9FD8}th{border: solid 1px; padding: 10px;}</style>
<title>Ejercicio 1 - Base</title>

<h3>Texto escrito fuera de las marcas de PHP</h3>
<hr>
<?= "<h3>Texto html <span>entregado por el procesador PHP</span> mediante la sentencia echo</h3>" ?>
<hr>
<?php 
    $variable1 = 'valor1'; 
    echo "<h4>\$variable1 = $variable1 <span>Sin concatenado</span></h4>"; 
    echo "<h4>\$variable1 = " .$variable1 ."<span> Concatenado</span></h4>"; 
    echo "<hr>"; 

    $verdadera = true; 
    $falsa = false; 
    echo "<h4>Booleana verdadera = <span>$verdadera</span></h4>"; 
    echo "<h4>Booleana falsa = <span>$falsa</span></h4>"; 
    echo "<hr>"; 

    define("CONSTANTE","Valor constante"); 
    echo "<h4>CONSTANTE: " ."<span>" .CONSTANTE ."</span></h4>"; 
    echo "<h4>Tipo de <span>CONSTANTE</span>: " .gettype(CONSTANTE); 
    echo "<hr>"; 

    $palabras = ["adiós", "goodbye", "addio", "adieu"]; 
    $i = 0; 
    echo "<h4>Array</h4>"; 
    foreach($palabras as $palabra){
        echo "<h4>palabras[$i]: <span>$palabra</span></h4>"; 
        $i++; 
    }
    
    echo "<h4>Tipo de <span>palabras</span>: " .gettype($palabras); "</h4>"; 
    array_push($palabras, "do widzenia", "وداعا", "slán", "adéu");
    echo "<h5>Se agregan elementos por programa</h5><h4>A continuación, todos los elementos del array</h4>";
    echo"<ul>";
    $j = 0;  
    foreach($palabras as $palabra){
        echo "<li>palabras[$j]: <span>$palabra</span></li>"; 
        $j++; 
    } 
    echo "</ul>"; 
    echo "<hr>"; 

    $diccionario = []; 
    $palabra1 = ["hola", "hello", "ciao", "こんにちは"];
    $palabra2 = ["adios", "goodbye", "addio", "さようなら"];
    $palabra3 = ["casa", "house", "casa", "家"]; 
    array_push($diccionario, $palabra1, $palabra2, $palabra3);

    echo "<table style='border: solid 1px; border-collapse: collapse;'>";
    echo "<th>Español</th><th>Inglés</th><th>Italiano</th><th>Japonés</th>"; 
    foreach($diccionario as $palabra){
        echo "<tr>";
        foreach($palabra as $word){
            echo "<td style='border: solid 1px; padding: 10px'>$word</td>"; 
        }
        echo "</tr>";
    }
    echo "</table>";

    echo "<h4>También se puede expresar así: <span>\$diccionario[1][3]</span> = " .$diccionario[1][3] ."</h4>"; 
    echo "<h4>Cantidad de elementos del diccionario: <span>" .count($diccionario) ."</span></h4>"; 
    echo "<hr>"; 
?>

<h4>Variables de arreglo asociativo</h4>
<?php
    $alumno = [
        "legajo"        => "15-25493",
        "apellido"      => "Cappabianca",
        "nombre"        => "Nicolás",
        "nacimiento"    => "12/06/1997",
        "edad"          => 23
    ]; 

?>
<h5>Datos de alumno</h5>
<p>Legajo: <?= $alumno['legajo']; ?></p>
<p>Apellido: <?= $alumno['apellido']; ?></p>
<p>Nombre: <?= $alumno['nombre']; ?></p>
<p>Fecha de nacimiento: <?= $alumno['nacimiento']; ?></p>
<p>Edad: <?= $alumno['edad']; ?></p>
<hr>

<h3>Expresiones aritméticas</h3>
<?php
    $valor1 = 3; 
    $valor2 = 4; 
?>

<h4>La variable $valor1 tiene el siguiente valor: <span><?= $valor1 ?></span></h4>
<h4>La variable $valor2 tiene el siguiente valor: <span><?= $valor2 ?></span></h4>
<h4>La variable $valor1 es de tipo: <span><?= gettype($valor1) ?></span></h4>
<h4>La variable $valor2 es de tipo: <span><?= gettype($valor2) ?></span></h4>
<h4>$valor1 + $valor2 = <span><?= ($valor1 + $valor2) ?></span></h4>
<h4>$valor1 * $valor2 = <span><?= ($valor1 * $valor2) ?></span></h4>
<h4>$valor1 / $valor2 = <span><?= ($valor1 / $valor2) ?></span></h4>