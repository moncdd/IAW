<!DOCTYPE html>
<html lang="es">
   <head>
      <meta charset="UTF-8">
      <title>Ejercicio 11</title>
      <style>
         td,th {
                border: 1px solid black;
                text-align: center; 
         }
         td {
                text-align: center; 
         }
         .codigo {
                background-color: #cccccc;     
         }
         h3 {
              text-align: center;
         }
         table {
                  margin-left: auto;
                  margin-right: auto;
         }
      </style>
   </head>
   <body>
      <?php if(isset($_GET['pagina'])) $pag = $_GET['pagina']; else $pag = 1; ?>
      <?php $pagAnt = $pag  - 1; $pagSig = $pag  + 1;  ?>
      <h3><?php if($pag>1) echo "<a href='Ejercicio11.php?pagina=$pagAnt'>Ir a página anterior</a>"; ?><?php echo " Página $pag "; ?><?php echo "<a href='Ejercicio11.php?pagina=$pagSig'>Ir a página siguiente</a>"; ?></h3>
      <table>
         <tr>
            <th class="codigo">Código</th><th>Valor</th>
            <th class="codigo">Código</th><th>Valor</th>
            <th class="codigo">Código</th><th>Valor</th>
            <th class="codigo">Código</th><th>Valor</th>
            <th class="codigo">Código</th><th>Valor</th>
            <th class="codigo">Código</th><th>Valor</th>
            <th class="codigo">Código</th><th>Valor</th>
            <th class="codigo">Código</th><th>Valor</th> 
            <th class="codigo">Código</th><th>Valor</th>
         </tr>
         <tr>
            <?php
               if(isset($_GET['pagina'])) $inicio = ($_GET['pagina']-1)*495;
               else $inicio = 0;
               //imprimo los caracteres ASCII
               for($i=$inicio;$i<$inicio+495;$i++){
                  //al llegar a la columna 8, saltamos de fila
                  if($i%9==0) echo "</tr><tr>";
                  echo "<td class='codigo'>".$i."</td><td>&#".$i.";</td>";
               }
            ?>
         </tr>   
      </table>
   </body>
</html>

