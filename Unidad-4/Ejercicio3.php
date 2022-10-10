<?php
/*
Ejercicio 3. Crea un formulario que lea un número , después un mensaje nos indicará si era realmente o no un número y, si es un número , si tenía decimales. 
*/
?>
<!DOCTYPE html >
<html lang="es">
   <head>
      <meta charset="UTF-8">
      <title>Ejercicio 3</title>
   </head>
   <body>
      <?php
         if(isset($_GET["enviar"])){
            if(isset($_GET["number"])){//se ha recibido el número
               $n=$_GET["number"];//por comodidad usamos la variable $n
               if(is_numeric($n)){// $n contiene realmente un número
                  $resto=$n-(int)$n; //quitamos la parte entera al número
                  if($resto==0)
                     echo "<h1>El número es entero</h1>";
                  else
                     echo "<h1 >El número es decimal</h1>";
               }else{
                  echo "<h1>No se ha recibido un número</h1>" ;
               }
            exit;   
            }//fi number
         }//fi enviar             

      ?>
      <form action="Ejercicio3.php">
         <labe1 for="numero">Escriba un número </1abe1>
         <input type="number" step="0.001" name="number"/><br/>
         <input type="submit" name="enviar" value="enviar"/>
      </form>
   </body>
</html>
