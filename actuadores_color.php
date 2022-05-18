<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Control de Estado de las Lámparas</title>
    <link rel="stylesheet" href="css/style.css">
</head>

    <center>
        <h1>Control de Estado de las Lámparas</h1>
        <h2>Quiroga Dylan</h2>
        
        <img src="/iluminacion-jardin-local/IOTproject_smart_garden_lamps/img/luz.jpg">
        
        <div id = "frame"> 
            <h1>LÁMPARA 1</h1>
        
            <button class = "button-off" type='button' onClick=location.href='/iluminacion-jardin-local/IOTproject_smart_garden_lamps/lampara1.php?dispositivo=node1&lamparauno=0'><h2>Apagar</h2>
            </button>
            <button class = "button-on" type='button' onClick=location.href='/iluminacion-jardin-local/IOTproject_smart_garden_lamps/lampara1.php?dispositivo=node1&lamparauno=1'><h2>Encender</h2>
            </button>
            <br>
            <br>

            <h1>LÁMPARA 2</h1>
        
            <button style='background-color:red;  color:white; border-radius: 10px; border-color: rgb(255, 0, 0);' 
                type='button' onClick=location.href='/iluminacion-jardin-local/IOTproject_smart_garden_lamps/lampara2.php?dispositivo=node1&lamparados=0'><h2>Apagar</h2>
            </button>
            <button style='background-color:rgb(94, 255, 0); color:white; border-radius: 10px; border-color: rgb(25, 255, 4);' 
                type='button' onClick=location.href='/iluminacion-jardin-local/IOTproject_smart_garden_lamps/lampara2.php?dispositivo=node1&lamparados=1'><h2>Encender</h2>
            </button>
            <br>
            <br>


            <?php //COMINEZA PHP
                //Insertamos codigo PHP en medio del HTML para mostrar el estado de las lamparas
                
                require_once('conexion.php');
                $conn=new conexion();

                //Hago la consulta para obtener los estados de las lamparas
                $querySELECT="SELECT`lamparauno`, `lamparados` FROM `estado` WHERE `dispositivo`= 'node1';";
                //primer parametro la conexion, el segundo la consulta
                $result= mysqli_query($conn->conectardb(),$querySELECT);

                //Creo una variable $row (fila) en la cual vamos a guardar la fila que nos da como resultado la consulta SELECT
                $row=mysqli_fetch_row($result);
                
                //Con el estado de lampara1 $row[0] armo una estructura if - else if - else para los distintos mensajes
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
                
                
                //TERMINA PHP
            ?>
            
        </div>
    </center>
</body>
</html>