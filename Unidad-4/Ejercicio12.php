<?php
/*
Ejercicio 12. Crea una página PHP que permita elegir una serie de artículos de una tienda online mediante checkbox.
    • Cada checkbox permite seleccionar un artículo, en el que se indica su precio .
    • Tras pulsar el botón Enviar del formulario, se nos indicará el detalle de la compra, así como el total de lo que hemos comprado.
*/
?>
<!DOCTYPE html>
<html lang="es">
   <head>
      <meta charset="UTF-8">
      <title>Ejercicio 12</title>
   </head>
   <body>
      <?php
         if(isset($_POST['enviar'])){
            if(isset($_POST['articulo']) && !empty($_POST['articulo'])){
               $articulos=$_POST['articulo'];
               //comprobamos que los articulos se reciben en array
               if(is_array($articulos)){
                  echo "<ul>";
                  $suma = 0;
                  foreach($articulos as $key=>$val){
                     echo "<li>$key, precio: $val €</li>";
                     $suma+=$val;
                  }//foreach
                  echo "</ul>";
                  ECHO "<h3>Total: $suma €</h3>";
               }//fi is_array              
            }//fi articulo
            else {
               echo "<h3>No has seleccionado ningún artículo</h3>";
            }
            exit;
         }//fi enviar 
      ?>
      <h1>Seleccione los artículos que desea comprar</h1>
      <form action="Ejercicio12.php" method="post">
         <input type="checkbox" name="articulo['Bolígrafo rojo']" value=".35" id="boliRojo"/>
         <label for="boliRojo"> Bolígrafo Rojo (35 céntimos)</label><br>
         <input type="checkbox" name="articulo['Bolígrafo azul']" value=".35" id="boliAzul"/>
         <label for="boliAzul"> Bolígrafo Azul (35 céntimos) </label><br>
         <input type="checkbox" name="articulo['Lapicero grueso']" value=".27" id="lapizGrueso"/>
         <label for="lapizGrueso"> Lapicero grueso (27 céntimos)</label><br>
         <input type="checkbox" name="articulo['Lapicero fino']" value=".30" id="lapizFino"/> 
         <label for="lapizFino"> Lapicero fino (30 céntimos) </label><br>
         <input type="checkbox" name="articulo['Goma de borrar']" value=".35" id="goma"/>
         <label for="goma" > Goma de borrar (35 céntimos)</label><br>
         <input type="submit" name="enviar">
   </body>
</html>

