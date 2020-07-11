<style>html{font-size: 12px; font-family: Verdana, Geneva, Tahoma, sans-serif;}th{border: solid 1px; padding: 10px;}</style>
<title>Ejercicio 3 - Require</title>

<h2>En este ejercicio se utiliza la función require() que ubica código PHP definido en el archivo file2.inc</h2>
<h2>Antes de añadir el require, las variables declaradas en el mismo no existen</h2>
<h2>Variables antes de ejecutar require:</h2>


<p><?= $persona1['nombre']; ?></p>
<p><?= $persona1['apellido']; ?></p>
<p><?= $persona1['edad']; ?></p>
<p><?= $persona2['nombre']; ?></p>
<p><?= $persona2['apellido']; ?></p>
<p><?= $persona2['edad']; ?></p>

<h4>La longitud de los arrays es: <?= count($persona1); ?></h4>

<?php require('./file2.inc'); ?>
<h2>Luego de ejecutar la función require...</h2>

<h2>Las variables del array asociativo son</h2>

<table>
    <tr>
        <th><?= $persona1['nombre']; ?></th>
        <th><?= $persona1['apellido']; ?></th>
        <th><?= $persona1['edad']; ?></th>
    </tr>
    <tr>
        <th><?= $persona2['nombre']; ?></th>
        <th><?= $persona2['apellido']; ?></th>
        <th><?= $persona2['edad']; ?></th>
    </tr>
</table>

<h3>La longitud de los arrays es: <?= count($persona1); ?></h3>