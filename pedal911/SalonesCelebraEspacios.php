<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Administrador</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Joel Ganchozo">
  <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
  <link rel="shortcut icon" href="assets/ico/favicon.ico">
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
  <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
</head>
<body data-offset="40" style="background-attachment: fixed">
<div class="container">
  <header class="header">
    <div class="row">
      <?php include("include/cabecera.php"); ?>
    </div>
  </header>

  <!-- Navbar -->
  <div class="row">  
    <div class="span12">
      <div class="caption">
        <!-- Empieza cuerpo del documento interno -->
        <div class="row-fluid">
          <?php
            require("connect_db.php");
            $sql = "SELECT * FROM salones";
            $query = mysqli_query($mysqli, $sql);

            echo "<table id='tabla-salones' class='table table-hover'>";
            echo "<thead>";
            echo "<tr class='warning'>";
            echo "<th>Nombre</th>";
            echo "<th>Informacion</th>";
            echo "<th>Precio</th>";
            echo "<th>Ubicacion</th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";

            while ($arreglo = mysqli_fetch_array($query)) {
              echo "<tr>";
              echo "<td>$arreglo[1]</td>";
              echo "<td>$arreglo[2]</td>";
              echo "<td>$arreglo[3]</td>";
              echo "<td>$arreglo[4]</td>";
              echo "</tr>";
            }

            echo "</tbody>";
            echo "</table>";
          ?>
        </div>
        <br/>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <hr class="soften"/>
  <footer class="footer">
    <hr class="soften"/>
    <p>&copy; Copyright Joel Ganchozo <br/><br/></p>
  </footer>
</div><!-- /container -->

<!-- Le javascript -->
<script src="bootstrap/js/jquery-1.8.3.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script>

  $(document).ready(function() {
    $('#tabla-salones').DataTable({
      language: {
        search: "Buscar:",
        lengthMenu: "VISUALIZAR
        _MENU_entradas",
        info: "Mostrando _START_ a _END_ de _TOTAL_ entradas",
        infoEmpty: "Mostrando 0 a 0 de 0 entradas",
        infoFiltered: "(filtrado de _MAX_ entradas totales)",
        paginate: {
          first: "Primero",
          last: "Último",
          next: "Siguiente",
          previous: "Anterior"
        },
        aria: {
          sortAscending: ": activar para ordenar la columna ascendente",
          sortDescending: ": activar para ordenar la columna descendente"
        }
      },
      initComplete: function () {
        this.api().columns().every(function () {
          var column = this;
          if (column.index() == 2) { // index of 'Precio' column
            var select = $('<select><option value=""></option></select>')
              .appendTo($(column.footer()).empty())
              .on('change', function () {
                var val = $.fn.dataTable.util.escapeRegex(
                  $(this).val()
                );

                column
                  .search(val ? '^' + val + '$' : '', true, false)
                  .draw();
              });

            column.data().unique().sort().each(function (d, j) {
              select.append('<option value="' + d + '">' + d + '</option>')
            });
          } else {
            $(column.footer()).empty(); // Clear footer for other columns
          }
        });
      }
    });
  });


</script>
</body>
</html>
