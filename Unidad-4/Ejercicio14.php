<?php
/*
Ejercicio 14. Crea una función llamada dibujarArray que reciba un array y escriba el array usando una
tabla HTML de dos columnas, en la primera aparecerán los índices (esta primera estará sombreada
de gris) y en la segunda los valores.
*/

function dibujarArray($array){
   echo "<table style='border: 1px solid black; border-collapse: collapse'>";
   echo "\t<tr style='background-color :black; color:white; border:1px solid black'>\n";
   echo "\t\t<th>Índices</th><th>Valores</th>\n";
   echo "\t</tr>\n"; 
   foreach($array as $i=>$v){
      echo "\t<tr style='border:1px solid black'>\n";
      echo "\t\t<td style='background-color:gray'>$i</td>";
      echo "\t\t<td>$v</td>\n";
      echo "\t</tr>\n";
   }//foreach
   echo "</table>";
}//function
?>
<!DOCTYPE html>
<html lang="es">
   <head>
      <meta charset="UTF-8">
      <title>Ejercicio 14</title>
   </head>
   <body>
      <?php
         $localidades=array("Palencia"=>8000,
                            "Valladolid"=>306000,
                            "Murcia"=>439000,
                            "Albacete"=>170000,
                            "Barcelona"=>160000,
                            "A Coruña"=>25000);
         dibujarArray($localidades);
         echo "<br>";
         $simbolos=array("Au"=>"Oro","Ag"=>"Plata","Hg"=>"Mercurio","H"=>"Hidrógeno");
         dibujarArray($simbolos);
      ?>
   </body>
</html>

