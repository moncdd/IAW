<?php
/*
Ejercicio 8. Ejercicio en una única página
*/
?>
<!DOCTYPE html>
<html lang="es">
   <head>
      <meta charset="UTF-8">
      <title>Ejercicio 8</title>
      <style>
         .error {
                    color: red; 
         }
         .acierto {
                    color: blue; 
         }
      </style>
   </head>
   <body>
      <form action="Ejercicio8bis.php">
         <label for="numero">Escribe un número</label>
         <input type="number" name="numero" min="1"/><br/>
         <input type="submit" name="enviar"/>
      </form>
      <?php
         //comprobamos si la página recibe el número
         if(isset($_GET["enviar"])){
            if(isset($_GET["numero"]) && !empty($_GET["numero"])){
               $numero = $_GET["numero"];
               if($numero > 1){
                  //alternativa bucle for
                  $i = 1;
                  $suma = 0;
                  while($i<$numero){
                     if($i%2==0) $suma += $i; //sumamos el número par
                     $i++;
                  }
                  echo "<p class= 'acierto' >La suma de los números pares desde el 1 hasta el ".$numero." es ".$suma."</p> ";
               }      
            } else {
               echo "<p class= 'error' >Número erróneo</p> ";
            }
         }//fi enviar
      ?>
   </body>
</html>

