<!DOCTYPE html>
<html lang="es">
   <head>
      <meta charset="UTF-8">
      <title>Ejercicio 5</title>
      <style>
         .error {
                    color: red; 
         }
      </style>
   </head>
   <body>
      <form action="Ejercicio5.php">
         <label for="asteriscos">Escriba el número de asteriscos</label>
         <input type="number" name="asteriscos" min="1"/><br/>
         <input type="submit" name="enviar"/>
      </form>
      <?php
         //comprobamos si la pagina recibe correctamente el número de asteriscos
         if(isset($_GET["enviar"])){
            $asteriscos=$_GET["asteriscos"];
            if(is_numeric($asteriscos) && $asteriscos>=1) {
               //los datos son correctos, escribimos los asteriscos
               echo "<p>";
               for($i=1;$i<=$asteriscos;$i++) {
                  echo "*" ;
               }
               echo "</p>";
            } else {
               echo "<p class='error' >Número incorrecto</p>";
            }
         }
      ?>
   </body>
</html>

