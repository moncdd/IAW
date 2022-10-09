<!DOCTYPE html>
<html lang="es">
   <head>
      <meta charset="UTF-8" >
      <title>Ejercicio 1</title>
   </head>
   <body>
      <?php
         $numero=mt_rand(0,1);
         if($numero==0){
            echo '<img height="500" src="img/imagen1.jpg">';
         }
         else {
            echo '<img height="500" src="img/imagen2.jpg"' ;
         }
      ?>
   </body>
</html>
