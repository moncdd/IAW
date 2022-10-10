<?php
/*
Ejercicio 9. Crear una página PHP que muestre por pantalla todo el código ASCII en una tabla de 16 columnas.
Como pista, la función chr(), recibe un número y muestra el código ASCII equivalente . Así chr (65) muestra el carácter A.
*/
?>
<!DOCTYPE html>
<html lang="es">
   <head>
      <meta charset="UTF-8">
      <title>Ejercicio 9</title>
      <style>
         td,th {
                border: 1px solid black;
                text-align: center; 
         }
         td {
                text-align: center; 
         }
         .codigo {
                background-color: #cccccc;     
         }
      </style>
   </head>
   <body>
      <table>
         <tr>
            <th class="codigo">Código</th><th>Valor</th>
            <th class="codigo">Código</th><th>Valor</th>
            <th class="codigo">Código</th><th>Valor</th>
            <th class="codigo">Código</th><th>Valor</th>
            <th class="codigo">Código</th><th>Valor</th>
            <th class="codigo">Código</th><th>Valor</th>
            <th class="codigo">Código</th><th>Valor</th>
            <th class="codigo">Código</th><th>Valor</th> 
            <th class="codigo">Código</th><th>Valor</th>
         </tr>
         <tr>
            <?php
               //imprimo los caracteres ASCII
               for($i=0;$i<256;$i++){
                  //al llegar a la columna 8, saltamos de fila
                  if($i%9==0) echo "</tr><tr>";
                  echo "<td class='codigo'>".$i."</td><td>".chr($i)."</td>";
               }//for
            ?>
         </tr>   
      </table>
   </body>
</html>

