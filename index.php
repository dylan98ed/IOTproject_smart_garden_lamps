<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Control de Estado de las Lámparas</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
        <h1>Control de Estado de Lámparas</h1>
        <h2>Quiroga Dylan</h2>

        <form action="/iluminacion-jardin-local/IOTproject_smart_garden_lamps/receive.php" method="get">

            <img src="/iluminacion-jardin-local/IOTproject_smart_garden_lamps/img/lamps.jpg">

            <h1>LÁMPARA 1</h1>
        
            <button class = "button-off" type='submit' name="button_l1_off"><h2>Apagar</h2> </button>
            <button class = "button-on" type='submit' name="button_l1_on"><h2>Encender</h2> </button>
            <br>
            <br>

            <h1>LÁMPARA 2</h1>
        
            <button class = "button-off" type='submit' name="button_l2_off"><h2>Apagar</h2> </button>
            <button class = "button-on" type='submit' name="button_l2_on"><h2>Encender</h2> </button>
            <br>
            <br>


            <?php
                //Muestro el estado de las lamparas
                
                require_once('connection.php');
                $conn=new conexion();

                //Hago la consulta para obtener los estados de las lamparas
                $querySELECT="SELECT`lamparauno`, `lamparados` FROM `estado` WHERE `dispositivo`= 'node1';";
                $result= mysqli_query($conn->conectardb(),$querySELECT);

                //Creo una variable $row (fila) donde se guarda la fila que da como resultado la consulta SELECT
                $row=mysqli_fetch_row($result);

                if(($row[0]==1)&&($row[1]==1)){
                    echo "La lámpara 1 se encuentra ENCENDIDA";
                    echo "<br>";
                    echo "La lámpara 2 se encuentra ENCENDIDA";
                    echo "<br>";

                }else if(($row[0]==1)&&($row[1]==0)){
                    echo "La lámpara 1 se encuentra ENCENDIDA";
                    echo "<br>";
                    echo "La lámpara 2 se encuentra APAGADA";
                    echo "<br>";
                
                }else if(($row[0]==0)&&($row[1]==1)){
                    echo "La lámpara 1 se encuentra APAGADA";
                    echo "<br>";
                    echo "La lámpara 2 se encuentra ENCENDIDA";
                    echo "<br>";
                
                }else if(($row[0]==0)&&($row[1]==0)){
                    echo "La lámpara 1 se encuentra APAGADA";
                    echo "<br>";
                    echo "La lámpara 2 se encuentra APAGADA";
                    echo "<br>";
                
                }else if(($row[1]==1)||($row[1]==0)){
                    echo "Valor invalido para la lámpara 1";
                    echo "<br>";
                
                }else if(($row[0]==1)||($row[0]==0)){
                    echo "Valor invalido para la lámpara 2";
                    echo "<br>";
                
                }else{
                    echo "Valor invalido para la lámpara 1 y lámpara 2";
                    echo "<br>";
                }
            ?>
        </form>
</body>
</html>