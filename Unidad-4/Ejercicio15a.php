<?php
/*
Ejercicio 15. Crea una página web que pida los datos personales de una persona: (Nombre, Apellidos, Nombre de usuario, DNI o NIE, Teléfono). Después crea otra que valide los datos de esta forma:
- Nos comunicará un error si en el nombre y los apellidos hay texto diferente de letras y/o espacios y guiones. Cualquier otro símbolo provocará un error.
- Para el nombre de usuario solo se admite comenzar por letra (sea mayúscula o minúscula) y después seguirán números o más letras. Mínimos tiene que haber seis caracteres.
- El DNI tiene que cumplir las reglas de los DNI españoles: 8 números y una letra. Pero se pue de especificar también un NlE, en cuyo caso consta de una letra (solo puede ser X, Y o Z) y de siete números más una letra final.
- Además la letra final del DNI cumple esta fórmula. Los números se dividen entre 23 y se toma el resto, el resto se sustituye por una letra siguiendo este patrón:
0 T
1 R
2 W
3 A
4 G
5 M
6 Y
7 F
8 P
9 D
10 X
11 B
12 N 
13 J
14 Z 
15 S
16 Q
17 V
18 H
19 L
20 C
21 K
22 E
- En el caso de los NIE, para calcular la letra final se hace lo mismo, pero sustituyendo la letra X inicial por cero, si es Y por uno y si es Z por 2.
*/

?>
<!DOCTYPE html>
<html lang="es">
   <head>
      <meta charset="UTF-8">
      <title>Ejercicio 15</title>
   </head>
   <body>
      <form action="Ejercicio15b.php" method="post">
         <label for="nombre">Nombre </label>
         <input type="text" id="nombre" name="nombre"><br>
         <label for="apellido1" >Primer apellido </label>
         <input type="text" id="apellido1" name="apellido1"><br>
         <label for="apellido2" >Segundo apellido </label>
         <input type="text" id="apellido2" name="apellido2"><br>
         <label for="usuario">Nombre de usuario </label>
         <input type="text" id="usuario" name="usuario"><br>
         <label for="dni">Número de identificación (DNI o NIE) </label>
         <input type="text" id ="dni" name="dni"><br>
         <label for="telefono">Teléfono </label>
         <input type="text" id="telefono" name="telefono"><br>
         <input type="submit" name="enviar" id="enviar" value="Validar">
      </form> 
   </body>
</html>
