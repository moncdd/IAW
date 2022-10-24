<?php
/*
Ejercicio 15. Modificación del ejercicio en un único archivo
*/
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
         if(isset($_POST["enviar"])){
            //creamos array de datos para que el formulario "tenga memoria"
            $arrDatos=array(); 
            //creamos array para mostrar los datos erróneos
            $arrError=array();            
            //comprobamos los datos recibidos
            if(isset($_POST["nombre"]) && !empty($_POST["nombre"])) {
               //recogemos los datos en variables
               $nombre =$_POST["nombre"];
               //comprobamos nombre
               if(compruebaLetras($nombre))               
                  $arrDatos["nombre"]=$nombre;
               else
                  $arrError["nombre"]=true;
            }//fi nombre
            if(isset($_POST["apellido1"]) && !empty($_POST["apellido1"])){
               $apellido1=$_POST["apellido1"];
               //comprobamos apellido1
               if(compruebaLetras($apellido1)) 
                  $arrDatos["apellido1"]=$apellido1;
               else
                  $arrError["apellido1"]=true;
            }//fi apellido1
            if(isset($_POST["apellido2"]) && !empty($_POST["apellido2"])){
               $apellido2=$_POST["apellido2"];
               //comprobamos apellido2
               if(compruebaLetras($apellido2))    
                  $arrDatos["apellido2"]=$apellido2;
               else
                  $arrError["apellido2"]=true;
            }//fi apellido2
            if(isset($_POST["dni"]) && !empty($_POST["dni"])){
               $dni=$_POST["dni"];
               //comprobamos dni
               if(compruebaDNI($dni)==2) 
                  $arrError["dni"]=2;
               elseif(compruebaDNI($dni)==1)
                  $arrError["dni"]=1;
               else
                  $arrDatos["dni"]=$dni;
            }//fi dni
            if(isset($_POST["usuario"]) && !empty($_POST["usuario"])){
               $usuario=$_POST["usuario"];
               //comprobamos usuario
               if(compruebaUsuario($usuario)) 
                  $arrDatos["usuario"]=$usuario;
               else
                  $arrError["usuario"]=true; 
            }//fi usuario
            if(isset($_POST["telefono"]) && !empty($_POST["telefono"])){
               $telefono=$_POST["telefono"];
               //comprobamos telefono
               if(compruebaTelefono($telefono)) 
                  $arrDatos["telefono"]=$telefono;
               else
                  $arrError["telefono"]=true;
            }//fi telefono
            if(empty($arrError)&&!empty($arrDatos&&count($arrDatos)==6)){
               echo "<p>Datos válidos</p>";
               echo "<a href='Ejercicio15bis.php'>Volver</a>";
               exit();
            }//fi empty
         }//fi enviar
      ?>
      <form action="Ejercicio15bis.php" method="post">
         <?php if(isset($arrError["nombre"])){ echo "<p class='error'>Nombre no válido</p>"; } ?>
         <label for="nombre">Nombre </label>
         <input type="text" id="nombre" name="nombre" value='<?php if(isset($arrDatos["nombre"])){ echo $arrDatos["nombre"];} ?>'><br>
         <?php if(isset($arrError["apellido1"])){ echo "<p class='error'>Primer apellido no válido</p>"; } ?>
         <label for="apellido1" >Primer apellido </label>
         <input type="text" id="apellido1" name="apellido1" value='<?php if(isset($arrDatos["apellido1"])){ echo $arrDatos["apellido1"];} ?>'><br>
         <?php if(isset($arrError["apellido2"])){ echo "<p class='error'>Segundo apellido no válido</p>"; } ?>
         <label for="apellido2" >Segundo apellido </label>
         <input type="text" id="apellido2" name="apellido2" value='<?php if(isset($arrDatos["apellido2"])){ echo $arrDatos["apellido2"];} ?>'><br>
         <?php if(isset($arrError["usuario"])){ echo "<p class='error'>Usuario no válido</p>"; } ?>
         <label for="usuario">Nombre de usuario </label>
         <input type="text" id="usuario" name="usuario" value='<?php if(isset($arrDatos["usuario"])){ echo $arrDatos["usuario"];} ?>'><br>
         <?php if(isset($arrError["dni"])){ echo "<p class='error'>DNI no válido</p>"; } ?>
         <label for="dni">Número de identificación (DNI o NIE) </label>
         <input type="text" id ="dni" name="dni" value='<?php if(isset($arrDatos["dni"])){ echo $arrDatos["dni"];} ?>'><br>
         <?php if(isset($arrError["telefono"])){ echo "<p class='error'>Teléfono no válido</p>"; } ?>
         <label for="telefono">Teléfono </label>
         <input type="text" id="telefono" name="telefono" value='<?php if(isset($arrDatos["telefono"])){ echo $arrDatos["telefono"];} ?>'><br>
         <input type="submit" name="enviar" id="enviar" value="Validar">
      </form> 
   </body>
</html>
