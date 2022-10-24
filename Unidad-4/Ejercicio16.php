<?php
/*
Ejercicio 16. Crea una página web con un formulario que se encarga de encriptar o desencriptar un texto (<input type="radio">) dependiendo de lo que elijamos. 
La encriptación se basa en sumar el número elegido (que debe de estar entre 1 y 99) a cada carácter del texto. El desencriptado se hace igual, pero restando. 
Hay que validar que el texto elegido tenga más de 10 caracteres (de otro modo se informa del error) y que la clave sea un número entre 1 y 99.
Nota: Es muy interesante usar las funciones ord y chr.
*/
/**
   Función que se encarga de cifrar un texto
   $p_texto El texto a cifrar
   $_rot La rotación elegida
   Devuelve el texto cifrado
*/
function cifrado($p_texto,$p_rot){
   $textoCifrado="";//el texto cifrado devuelto
   //recorremos cadena, alternativa for
   $i = 0;
   while ($i<strlen($p_texto)) {
      $caracterActual=$p_texto[$i];//obtengo el caracter actual
      $posActual=ord($caracterActual);//obtengo la posición del caracter
      //si está dentro del rango [A-Z]
      if($posActual>64&&$posActual<91){
         //traslado la posición por el número de rotación 
         $posCifrada=$posActual+$p_rot;
         //si me desplazo por encima de la Z, empiezo por la A
         if($posCifrada>90) $posCifrada=$posCifrada-91+65;          
         $textoCifrado.=chr($posCifrada);//añado el caracter a la cadena cifrada
      }
      //si está dentro del rango [a-z]
      elseif($posActual>96&&$posActual<123){
         //traslado la posición por el número de rotación 
         $posCifrada=$posActual+$p_rot;
         //si me desplazo por encima de la z, empiezo por la a
         if($posCifrada>122) $posCifrada=$posCifrada-123+97;
         $textoCifrado.=chr($posCifrada);//añado el caracter a la cadena cifrada
             
      }
      //si es cualquier otro caracter, no hago nada
      else $textoCifrado.=$caracterActual;
      $i++;
   }
   return $textoCifrado;  
}
/**
   Función que se encarga de descifrar un texto
   $p_texto El texto a descifrar
   $_rot La rotación elegida
   Devuelve el texto descifrado
*/
function descifrado($p_texto,$p_rot){
   $textoDescifrado="";//el texto descifrado devuelto
   //recorremos cadena, alternativa for
   $i = 0;
   while ($i<strlen($p_texto)) {
      $caracterActual=$p_texto[$i];//obtengo el caracter actual
      $posActual=ord($caracterActual);//obtengo la posición del caracter
      //si está dentro del rango [A-Z]
      if($posActual>64&&$posActual<91){
         //traslado la posición por el número de rotación 
         $posDescifrada=$posActual-$p_rot;
         //si me desplazo por debajo de la A, empiezo por la Z
         if($posDescifrada<65) $posDescifrada=90-(64-$posDescifrada);  
         $textoDescifrado.=chr($posDescifrada);//añado el caracter a la cadena cifrada
      }
      //si está dentro del rango [a-z]
      elseif($posActual>96&&$posActual<123){
         //traslado la posición por el número de rotación 
         $posDescifrada=$posActual-$p_rot;
         //si me desplazo por debajo de la A, empiezo por la Z
         if($posDescifrada<97) $posDescifrada=122-(96-$posDescifrada);  
         $textoDescifrado.=chr($posDescifrada);//añado el caracter a la cadena cifrada
             
      }
      //si es cualquier otro caracter, no hago nada
      else $textoDescifrado.=$caracterActual;
      $i++;
   }
   return $textoDescifrado;  
}
?>
<!DOCTYPE html>
<html lang="es">
   <head>
      <meta charset="UTF-8">
      <title>Ejercicio 16</title>
      <style>
      .error {
                 color:red;
      }
      .exito {
                 color:blue;
      }
      </style>
   </head>
   <body>
      <?php
         if(isset($_POST["enviar"])){
            //variable que comprueba errores
            $error=false; 
            //comprobamos texto
            if(isset($_POST["texto"])&&!empty(($_POST["texto"]))/*&&strlen($_POST["texto"])>10*/){
               $texto=$_POST["texto"];
            }else{
               echo "<p class='error'>Texto no válido</p>";
               $error=true;
            }   
            //comprobamos opción
            if($_POST["opcion"]=="encriptar"||$_POST["opcion"]=="desencriptar"){
               $opcion=$_POST["opcion"];
            }else{
               echo "<p class='error'>Opción no válida</p>";
               $error=true;
            }
            //comprobamos clave
            if(isset($_POST["clave"])&&!empty(($_POST["clave"]))&&is_numeric($_POST["clave"])&&$_POST["clave"]>0&&$_POST["clave"]<100){
               $clave=$_POST["clave"];
            }else{
               echo "<p class='error'>clave no válida</p>";
               $error=true;
            }
            //si no hay errores
            if(!$error){
               if($opcion=="encriptar") echo "<h3 class='exito'>Texto cifrado: ".cifrado($texto,$clave)."</h3>";
               elseif($opcion=="desencriptar") echo "<h3 class='exito'>Texto descifrado: ".descifrado($texto,$clave)."</h3>";
            }              
         }
      ?>
      <h1>Encriptado y desencriptado tipo César</h1>
      <form action="Ejercicio16.php" method="post">
         <label for="texto">Escribe el texto a encriptar/desencriptar</label><br>
         <textarea name="texto" id="texto" cols="50" rows="4"><?php if(isset($_POST["texto"])) echo $_POST["texto"]; ?></textarea>
         <p>Elija opción</p>
         <input type="radio" name="opcion" id="opEnc" value="encriptar" checked="checked"><label for="opEnc"> Encriptar</label>
         <input type="radio" name="opcion" id="opDes" value="desencriptar"><label for="opDes"> Desencriptar</label><br>
         <label for="clave">Escribe la clave </label>
         <input type="number" name="clave"><br>
         <input type="submit" name="enviar" id="enviar">
      </form> 
   </body>
</html>
