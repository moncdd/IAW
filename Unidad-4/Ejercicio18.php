<?php
/*
Ejercicio 18. Crea una función que reciba una cadena y compruebe que se trata de una dirección de email válida.
• La función devolverá verdadero si es una dirección de de email válida; devolverá falso de no ser así.
• Consideraremos un email válido si tenemos a la izquierda de la arroba, letras, guiones, números o un punto (pero el punto solo puede ir entre medias de los anteriores). Tras la arroba solo permitiremos correos de los dominios educa.madrid.org 
Ejemplo: alumno.1234@educa.madrid.org
*/
/**
   Función que comprueba si una cadena es un correo electrónico
   $p_correo El correo a comprobar
   $res Devuelve true si es un correo válido, false si no lo es
 */
function isMail($p_correo){
   $res=false;//comprobación del correo
   $patron="/^[\w-]+\.{0,1}[\w-]*@educa.madrid.org$/";//patrón
   //$patron="/^[A-Za-z0-9_-]+\.{0,1}[A-Za-z0-9_-]*@educa.madrid.org$/";//alternativa patrón
   if(preg_match($patron,$p_correo)==1) $res=true;
   else $res=false;

   return $res;//devolvemos resultado
}

?>
<!DOCTYPE html>
<html lang="es">
   <head>
      <meta charset="UTF-8">
      <title>Ejercicio 18</title>
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
         if(isset($_POST["enviar"])){
            if(isMail($_POST["correo"])) echo "<h3 class='acierto'>".$_POST["correo"]." es un correo válido</h3>";  
            else echo "<h3 class='error'>".$_POST["correo"]." es un correo válido</h3>"; 
         }
         
      ?>
      <h1>Validar email</h1>
      <form action="Ejercicio18.php" method="post">
         <label for="texto">Escribe el correo</label>
         <input type="email" name="correo" id="correo" value='<?php if(isset($_GET["texto"])) echo $_GET["texto"]; ?>'>
         <input type="submit" name="enviar" id="enviar">
      </form> 
   </body>
</html>
