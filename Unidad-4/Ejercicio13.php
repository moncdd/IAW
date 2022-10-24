<?php
/*
Ejercicio 13. Crea un array que contenga todos los equipos de fútbol de primera división española, al final de la temporada 2015 y los puntos que consiguieron. La lista no hace falta que esté ordenada. A través de ese array , consigue que aparezca un formulario con un cuadro combinado que permita elegir el equipo y, tras hacerlo, se nos indiquen los puntos del equipo y su posición en la clasificación.
*/


$listaEquipos=array(
   "F.C. Barcelona"=>94,
   "Real Madrid"=>92,
   "Atlético Madrid"=>78,
   "Valencia"=>77,
   "Sevilla"=>76,
   "Villarreal"=>60 ,
   "Málaga"=>50,
   "Espanyol"=>49 ,
   "Athlétic Bilbao"=>55,
   "Celta"=>51,
   "Real Sociedad"=>46,
   "Rayo Vallecano"=>49,
   "Getafe"=>37,
   "Eibar"=>35,
   "Elche"=>41,
   "Deportivo"=>35,
   "Almería"=>29,
   "Levante"=>37,
   "Granada"=>35,
   "Córdoba"=>20
);
arsort($listaEquipos);
/* la lista de equipos se ordena por puntos, el array clasificación tendrá la lista ordenada de equipos por puntos pero los puntos en sí */
$clasificacion=array_keys($listaEquipos);
?>
<!DOCTYPE html>
<html lang="es">
   <head>
      <meta charset="UTF-8">
      <title>Ejercicio 13</title>
   </head>
   <body>
      <form action="Ejercicio13.php" method="post">
         <label for="equipo">Elija el equipo </label>
         <select name="equipo" id="equipo">
         <?php
            //Ordenamos el array para que el cuadro combinado muestre los equipos en orden alfabético
            ksort($listaEquipos);
            //mostramos el array en el select
            foreach($listaEquipos as $nombre=>$p) {
               echo "<option value='$nombre'>$nombre</option>";
            }
        ?>
        </select><br>
        <input type="submit" name="enviar" value="Comprobar">
        <?php
           if(isset($_POST['enviar'])){
              if(isset($_POST["equipo"])){
                 $equipo=$_POST["equipo"];
                 /* comprobamos si el equipo existe, de ser así, tomamos los
                    puntos y buscamos su posición en clasificación
                    Podría no existir si alguien manipula los parámetros
                  */
                 if(isset($listaEquipos[$equipo])){
                    $puntos=$listaEquipos[$equipo];
                    $posicion=array_search($equipo,$clasificacion)+1;
                    echo "<p >El $equipo tiene $puntos puntos, ahora mismo".
                         " es el $posicion"."º en la clasificación </p>";
                 }//fi $listaEquipos
                 else{
                    echo "<p>Equipo inexistente. Has intentado liarme</p>";
                 }//else $listaEquipos
              }//fi equipo
           }//fi enviar
        ?>
      </form>
   </body>
</html>

