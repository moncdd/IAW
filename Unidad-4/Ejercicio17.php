<?php
/*
Ejercicio 17. Crea un formulario en el que se pida un texto y después de enviar su contenido se nos indique si es un palíndromo. Ejemplos de palíndromos:
- dabale arroz a la zorra el abad
- se verlas al reves
*/
/**
   Función que comprueba si un texto es palíndromo
   $p_texto Texto a comprobar
   $res True si es palíndromo, False si no lo es
 */
function palindromo($p_texto){
   $res=false;//comprobación del texto
   $minusculas=explode(" ",strtolower($p_texto));//Convertimos la cadena a minusculas
   $nuevo="";//cadena temporal que almacena el texto sin espacios
   foreach($minusculas as $m){
        trim($m); //Eliminamos los espacios en blanco
        $nuevo .= $m; 
   }
   if($nuevo==strrev($nuevo)){
        $res=true;
   }
   return $res;//devolvemos resultado
}
?>
<!DOCTYPE html>
<html lang="es">
   <head>
      <meta charset="UTF-8">
      <title>Ejercicio 17</title>
      <style>
      .error {
                 color:red;
      }
      .acierto {
                 color:blue;
      }
      </style>
   </head>
   <body>
      <?php
         if(isset($_GET["enviar"])){
            if(palindromo($_GET["texto"])) echo "<h3 class='acierto'>".$_GET["texto"]." es palíndromo</h3>";  
            else echo "<h3 class='error'>".$_GET["texto"]." no es palíndromo</h3>";   
         }
         
      ?>
      <h1>Palíndromos</h1>
      <form action="Ejercicio17.php" method="get">
         <label for="texto">Escribe el texto</label><br>
         <textarea name="texto" id="texto" cols="50" rows="4"><?php if(isset($_GET["texto"])) echo $_GET["texto"]; ?></textarea>
         <input type="submit" name="enviar" id="enviar">
      </form> 
   </body>
</html>
