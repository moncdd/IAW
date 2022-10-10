<?php
/*
Ejercicio 10. Mejora el ejercicio anterior para mostrar los caracteres de la tabla Unicode del 0 al 50000
    • En este caso es mejor usar esta idea: en HTML si escribimos &# seguido de un número y del símbolo de punto y coma (;), nos muestra el carácter Unicode correspondiente a ese número. Así el código &#241; en una página web, muestra el carácter ñ.
*/
?>
<!DOCTYPE html>
<html lang="es">
   <head>
      <meta charset="UTF-8">
      <title>Ejercicio 10</title>
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
               for($i=0;$i<50001;$i++){
                  //al llegar a la columna 8, saltamos de fila
                  if($i%9==0) echo "</tr><tr>";
                  echo "<td class='codigo'>".$i."</td><td>&#".$i.";</td>";
               }//for
            ?>
         </tr>   
      </table>
   </body>
</html>

