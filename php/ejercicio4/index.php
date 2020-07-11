<style>html{font-family: Verdana, Geneva, Tahoma, sans-serif;}td{border: solid 1px; padding: 5px;}</style>
<title>Ejercicio 4 - Variables del servidor</title>

<h3>Variables del servidor</h3>
<table>
    <tr>
        <td>SERVER_ADDR</td>
        <td><?= $_SERVER['SERVER_ADDR']; ?></td>
    </tr>
    <tr>
        <td>SERVER_PORT</td>
        <td><?= $_SERVER['SERVER_PORT']; ?></td>
    </tr>
    <tr>
        <td>SERVER_NAME</td>
        <td><?= $_SERVER['SERVER_NAME']; ?></td>
    </tr>
    <tr>
        <td>DOCUMENT_ROOT</td>
        <td><?= $_SERVER['DOCUMENT_ROOT']; ?></td>
    </tr>
</table>

<h3>Variables del cliente</h3>
<table>
    <tr>
        <td>REMOTE_ADDR</td>
        <td><?= $_SERVER['REMOTE_ADDR']; ?></td>
    </tr>
    <tr>
        <td>REMOTE_PORT</td>
        <td><?= $_SERVER['REMOTE_PORT']; ?></td>
    </tr>
</table>

<h3>Variables de requerimiento</h3>
<table>
    <tr>
        <td>SCRIPT_NAME</td>
        <td><?= $_SERVER['SCRIPT_NAME']; ?></td>
    </tr>
    <tr>
        <td>REQUEST_METHOD</td>
        <td><?= $_SERVER['REQUEST_METHOD']; ?></td>
    </tr>
</table>

<h3>Todas las variables</h3>
<?php 
    foreach($_SERVER as $key_name => $key_value){
        echo "<p> $key_name: $key_value </p>";  
    }
?>