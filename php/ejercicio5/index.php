<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 5 | Variables Objeto</title>
    <style>html{font-family: Verdana, Geneva, Tahoma, sans-serif;}span{color:#2C9FD8;}td{border: solid 1px; padding: 5px;}</style>
</head>
<body>
    <h1>Variables de tipo objeto en PHP</h1>
    <h2>Objeto <span>orderRow</span></h2>
    <?php
        $orderRow = new stdclass; 
        $orderRow->code = 'A0101';
        $orderRow->price = '24000';
        $orderRow->description = 'Monitor Samsung 24 pulgadas';
        $orderRow->stock = '120';

        $orderRow2 = new stdclass; 
        $orderRow2->code = 'B2020';
        $orderRow2->price = '9000';
        $orderRow2->description = 'Teclado HyperX';
        $orderRow2->stock = '180';

        foreach($orderRow as $key_name=>$key_value){
            echo "<p>$key_name: <span>$key_value</span></p>"; 
        }

        echo "<h2>Objeto <span>orderRow2</span></h2>"; 
        foreach($orderRow2 as $key_name=>$key_value){
            echo "<p>$key_name: <span>$key_value</span></p>"; 
        }
    ?>
    <br>
    <h3>Tipo de <span>$orderRow</span>: <?= gettype($orderRow) ?></h3>
    <br>
    <h3>Array de pedidos: <span>$allOrders</span></h3>
    <?php
        $allOrders = []; 
        array_push($allOrders, $orderRow, $orderRow2);
    ?>
    <h3>Recorriendo <span>$allOrders</span></h3>
    <table>
    <?php
        foreach($allOrders as $order){
            echo "<tr>"; 
            foreach($order as $key=>$value){
                echo "<td>$value</td>"; 
            }
            echo "</tr>"; 
        }
    ?>
    </table>
    <h4>Cantidad de renglones: <?= count($allOrders); ?></h4>
    <br>
    <h3>Objeto <span>$objOrders</span> que contiene ordenes y cantidad total</h3>
    <?php
        $objOrders = new stdclass;
        $objOrders->orders = $allOrders; 
        $objOrders->qty = count($allOrders); 
    ?>
    <h4>Cantidad total de pedidos: <?= $objOrders->qty; ?></h4>
    <br>
    <h3>JSON <span>jsonOrders</span></h3>
    <?php
        $jsonOrders = json_encode($objOrders, JSON_PRETTY_PRINT); 
    ?>
    <p><?= $jsonOrders;?></p>
</body>
</html>