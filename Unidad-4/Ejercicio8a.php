<?php
/*
Ejercicio 8. Crea un formulario que pida al usuario un número.
Después, en otra página, recoge ese número y muestra la suma de todos los números pares anteriores a él.
Por ejemplo, si el usuario escribe el número 9 saldría por pantalla el número 20, resultado de sumar 2 + 4 + 6 + 8
Mejorar el resultado para que la página que muestra la suma, después muestre un enlace con el que regresar al formulario de modo que, al hacer clic en él, el cuadro de entrada del número muestre el último número introducido
*/
?>
<!DOCTYPE html>
<html lang="es">
   <head>
      <meta charset="UTF-8">
      <title>Ejercicio 8</title>
   </head>
   <body>
      <form action="Ejercicio8b.php">
         <label for="numero">Escribe un número</label>
         <!-- Con el código php de value recuperamos el valor de la página anterior -->
         <input type="number" name="numero" min="1" value="<?php if(isset($_GET['numero'])) echo $_GET['numero'];?>"/><br/>
         <input type="submit" name="enviar"/>
      </form>
   </body>
</html>

