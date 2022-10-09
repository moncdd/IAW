<!DOCTYPE html>
<html lang="es">
   <head>
      <meta charset="UTF-8">
      <title>Ejercicio 7</title>
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
      <table>
         <tr>
            <?php
               for($i=1;$i<1001;$i++){
                  echo "<td>".$i."</td>";
                  //al llegar a la columna 5, saltamos de fila
                  if($i%5==0) echo "</tr><tr>";
               }
            ?>
         </tr>   
      </table>
   </body>
</html>

