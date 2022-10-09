<!DOCTYPE html>
<html lang="es">
   <head>
      <meta charset="UTF-8">
      <title>Ejercicio 6</title>
      <style>
         .error {
                    color: red; 
         }
         td {
                border: 1px solid black;
         }
      </style>
   </head>
   <body>
      <form action="Ejercicio6.php">
         <label for="columnas">Escriba el número de columnas </label>
         <input type="number" name="columnas" min="1"/><br/>
         <label for="filas">Escriba el número de filas </label>
         <input type="number" name="filas" min="1"/><br/>
         <input type="submit" name="enviar"/>
      </form>
      <?php
         //comprobamos si la página recibe los parámetros para dibujar la tabla
         if(isset($_GET["enviar"])){
            if(isset($_GET["columnas"]) && !empty($_GET["columnas"]) &&
               isset($_GET["filas"]) && !empty($_GET["filas"])){
                  $filas=$_GET["filas"];
                  $columnas=$_GET["columnas"];
                  if(is_numeric($filas) && is_numeric($columnas) &&
                     $filas>=1 && $columnas >=1 ) {
                     //los datos son correctos,  dibujamos la tabla
                     echo "<table>";
                        for ($i=1;$i<=$filas;$i++){
                           echo "<tr>";
                           for ($j=1;$j<=$columnas;$j++){
                              //en cada celda escribimos un espacio en blanco para asegurar que se muestre
                              echo "<td>&nbsp;</td>";
                           }//for columnas
                         echo "</tr>";
                        }//for filas
                     echo "</table>";
               }
            } else {
               echo "<p class= 'error' >"."Número de filas y/o columnas incorrecto</p> ";
            }
         }
      ?>
   </body>
</html>

