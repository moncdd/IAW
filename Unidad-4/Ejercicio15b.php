<?php
/**
   Función que comprueba si una cadena está formada sólo por letras
   $p_cadena La cadena a probar
   return true si lo cumple, false si no lo cumple
 */
function compruebaLetras($p_cadena){
   $res=true; //return de la función
   //conjunto de caracteres alfabéticos del español
   $letrasValidas="A-Za-záéíóúüÁÉÍÓÚÜñÑ";
   //si cumple la expresión regular...
   if(preg_match("/^[$letrasValidas\-]+$/",$p_cadena)==false) 
      $res=false;
   return $res;   
}

/**
   Función que comprueba si una cadena está formada por letras y números empezando por letras
   $p_cadena La cadena a probar
   return true si lo cumple, false si no lo cumple
 */
function compruebaUsuario($p_cadena){
   $res=true; //return de la función
   //conjunto de caracteres alfabéticos del español
   $letrasValidas="A-Za-záéíóúüÁÉÍÓÚÜñÑ";
   //si cumple la expresión regular...
   if(preg_match("/^[$letrasValidas][{$letrasValidas}0-9]+$/",$p_cadena)==false) 
      $res=false;
   return $res; 
}
/**
   Función que comprueba si una número es un teléfono
   $p_numero El número a probar
   return true si lo cumple, false si no lo cumple
 */
function compruebaTelefono($p_numero){
   $res=true; //return de la función
   //si cumple la expresión regular...
   if(preg_match("/^[0-9]{9}$/",$p_numero)==false) 
      $res=false;
   return $res;
}
/**
   Función que comprueba un DNI o NIE
   $p_dni El DNI a probar
   return 0 si es válido, 1 si la letra es incorrecta, 2 DNI no válido
 */
function compruebaDNI($p_dni){
   $res=0; //return de la función
   //si cumple la expresión regular...
   if(preg_match("/^[0-9XYZxyz][0-9]{7}[A-Za-z]$/",$p_dni)==false) 
      $res=2;
   else{
      //comprobamos si la letra es correcta 
      if($p_dni[0]=="X") $p_dni[0] ="0" ;
      elseif($p_dni[0]=="Y") $p_dni[0]="1";
      elseif($p_dni[0]=="Z") $p_dni[0]="2";
      $numerosDNI=substr($p_dni,0,8);
      $letras="TRWAGMYFPDXBNJZSQVHLCKE";
      $resto=$numerosDNI%23;
      if($p_dni[8]!=$letras[$resto])  
         $res=1;
   }
   return $res;   
}
?>

<!DOCTYPE html>
<html lang="es">
   <head>
      <meta charset="UTF-8">
      <title>Ejercicio 15</title>
      <style>
      .error {
                 color:red;
      }
      </style>
   </head>
   <body>
      <?php
         $todoBien=true;
         if(isset($_POST["enviar"])){
            //comprobamos los datos recibidos
            if(isset($_POST["nombre"]) && !empty($_POST["nombre"]) &&
               isset($_POST["apellido1"]) && !empty($_POST["apellido1"]) && 
               isset($_POST["apellido2"]) && !empty($_POST["apellido2"]) &&
               isset($_POST["dni"]) && !empty($_POST["dni"]) && 
               isset($_POST["usuario"]) && !empty($_POST["usuario"]) && 
               isset($_POST["telefono"]) && !empty($_POST["telefono"])) {
               //recogemos los datos en variables
               $nombre =$_POST["nombre"];
               $apellido1=$_POST["apellido1"];
               $apellido2=$_POST["apellido2"];
               $dni=$_POST["dni"];
               $usuario=$_POST["usuario"];
               $telefono=$_POST["telefono"];
            
               //comprobamos nombre
               if(compruebaLetras($nombre)==false) {
                  echo "<p class='error'>Nombre no válido</p>";
                  $todoBien=false;
               }
               //comprobamos apellido1
               if(compruebaLetras($apellido1)==false) {
                  echo "<p class='error'>Primer apellido no válido</p>";
                  $todoBien=false;
               }
               //comprobamos apellido2
               if(compruebaLetras($apellido2)==false) {
                  echo "<p class='error'>Segundo apellido no válido</p>";
                  $todoBien=false;
               }
               //comprobamos usuario
               if(compruebaUsuario($usuario)==false) {
                  echo "<p class='error'>Usuario no válido</p>";
                  $todoBien=false;
               }
               //comprobamos telefono
               if(compruebaTelefono($telefono)==false) {
                  echo "<p class='error'>Teléfono no válido</p>";
                  $todoBien=false;
               }
               //comprobamos dni
               if(compruebaDNI($dni)==2) {
                  echo "<p class ='error'>DNI no válido </ p >";
                  $todoBien=false;
               }
               elseif(compruebaDNI($dni)==1){
                     echo "<p class='error'>Letra de DNI incorrecta</p>";
                     $todoBien=false;
               }
               if($todoBien==true){
                  echo "<p>Datos correctos</p>";
               }
            }//fi $_POST datos 
            else{
               echo "<p class='error'>Faltan datos</p>";
            }
         }//fi enviar
         else{
            echo "<p class='error'>Datos no enviados</p>";
         }
      ?>
      <a href="Ejercicio15a.php">Volver al formulario</a> 
   </body>
</html>
