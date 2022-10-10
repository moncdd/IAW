<?php
/*
Ejercicio 4. Crea una página PHP que ponga de fondo un color aleatorio. Para ello recuerda que en CSS el color de fondo se puede realizar mediante la función rgb a la que se le pasan tres números del 0 al 255, el primero es el nivel de rojo, el segundo el de verde y el tercero el de azul 
*/
?>
<!DOCTYPE html>
<html lang="es">
   <head>
      <?php
         //cálculo aleatorio de cada nivel de color
         $rojo=mt_rand(0,255);
         $verde=mt_rand(0,255) ;
         $azul=mt_rand(0,255);
      ?>
      <meta charset="UTF-8">
      <title>Ejercicio 4</title>
      <style>
         body {
                 background-color : <?php echo "rgb($rojo,$verde,$azul);"?>;
         }
      </style>
   </head>
   <body>
   </body>
</html>
