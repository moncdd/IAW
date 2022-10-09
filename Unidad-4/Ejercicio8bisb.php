<!DOCTYPE html>
<html lang="es">
   <head>
      <meta charset="UTF-8">
      <title>Ejercicio 8 bis</title>
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
         }
      ?>
      <a href="Ejercicio8bisa.php?numero=<?php echo $_GET['numero'] ?>">Volver</a>
   </body>
</html>

