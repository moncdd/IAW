<?php
/*
Ejercicio 2. Lee el nombre, los apellidos, el salario (número con decimales) y la edad de una persona (un número) en un formulario. Recoge los datos y con ellos calcula un nuevo salario para esa person a en base a esta situación: 
    • Si el salario es mayor de 2 000 euros, no cambiará 
    • Si el salario está entre 1000 y 2000: 
        ◦ Si además la edad es mayor de 45 años, se sube un 3% 
        ◦ Si la edad es menor de 45 o igual, se sube un 10% 
    • Si el salario es menor de 1000:
        ◦ Los menores de 30 años cobrarán, a partir de ahora , exactamente 1100 euros 
        ◦ De 30 a 45 años, sube un 3% 
        ◦ A los mayores de 45 años, sube un I5%
*/
?>

<!DOCTYPE html >
<html lang="es">
   <head>
      <meta charset="UTF-8">
      <title>Ejercicio 2</title>
   </head>
   <body>
      <?php
         if(isset($_GET["enviar"])){
         
            if(isset($_GET["nombre"]) && !empty($_GET["nombre"]) && 
               isset($_GET["apellidos"]) && !empty($_GET["apellidos"]) &&
               isset($_GET["edad"]) && !empty($_GET["edad"]) &&
               isset($_GET["salario"]) && !empty($_GET["salario"])){ 
              
                  $nombre=$_GET["nombre"];
                  $apellidos=$_GET["apellidos"];
                  $edad=$_GET["edad"];
                  $salario=$_GET["salario"];
                  
                  //Si el salario es menor de 1000
                  if($salario<1000){
                     //menores de 30 cobran 1100
                     if($edad<30) $salario=1100;
                     //de 30 a 45 sube 3%
                     else if($edad<=45) $salario*=1.3;
                     //mayores de 45 sube 15%
                     else $salario*=1.15;
                  }
                  //salario entre 1000 y 2000
                  else if($salario<=2000){
                     //si la edad es mayor de 45 sube 3%
                     if($edad>45) $salario*=1.03;
                     //si la edad es menor sube 10%
                     else $salario*=1.1;
                  } 
                  
               echo $nombre." ".$apellidos.", tu salario será de ".$salario." €" ;
               exit;
            }
            else {
               echo "<h3>Faltan datos</h3>" ;
               echo "<a href='Ejercicio2.php'>Volver</a>";
               exit;
            }
         }        

      ?>
      <form action="Ejercicio2.php" method="get">
         <label for="nombre">Nombre </label>
         <input type="text" name="nombre"><br>
         <label for="apellidos">Apellidos</label>
         <input type="text" name="apellidos"><br>
         <label for="edad">Edad </label>
         <input type="number" name="edad"><br>
         <label for="salario">Salario </label>
         <input type="number" name="salario"><br>
         <input type="submit" name="enviar">
      </form>
   </body>
</html>
