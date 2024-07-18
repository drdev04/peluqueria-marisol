<?php
	session_start();
	error_reporting(0);
	include('includes/dbconnection.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Servicios especiales</title>   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<style>
    .table-container {
        max-height: 300px; /* Ajusta la altura máxima según tus necesidades */
        overflow-y: auto;  /* Agrega la barra de desplazamiento vertical */
    }
    table {
        width: 100%;
        border-collapse: collapse;
    }
    th, td {
        padding: 8px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }
</style>
</head>
<body style="background-color: black">
    <div class="container">
        <h1 style="text-align:center; font-size:72px; padding-bottom: 80px; padding-top: 80px; color: white">
            <span>
                <span><b>SERVICIOS</b></span>
            </span>
        </h1>
    </div>

    <div class="container">
        <div class="row" style="text-align: center">
            <div class="col-4 p-3">
                <img class="img-fluid" src="images/bg-1.jpg" alt="">
                <span>
                    <p class="pt-5"><h4 style="color: yellow">Eventos en vivo</h4></p><br>
                    <p class="m-5 mt-0" style="color: white">Párrafo. Haz click aquí para añadir tu texto. Deja que los usuarios te conozcan.</p>
                </span>
            </div>
            <div class="col-4 p-3">
                <img class="img-fluid" src="images/bg-1.jpg" alt="">
                <span>
                    <p class="pt-5"><h4 style="color: yellow">Eventos en vivo</h4></p><br>
                    <p class="m-5 mt-0" style="color: white">Párrafo. Haz clic aquí para añadir tu texto. Deja que los usuarios te conozcan.</p>
                </span>
            </div>
            <div class="col-4 p-3">
                <img class="img-fluid" src="images/bg-1.jpg" alt="">
                <span>
                    <p class="pt-5"><h4 style="color: yellow">Eventos en vivo</h4></p><br>
                    <p class="m-5 mt-0" style="color: white">Párrafo. Haz clic aquí para añadir tu texto. Deja que los usuarios te conozcan.</p>
                </span>
            </div>
        </div>
    </div>

    <!-- Button to trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
      Open Modal with Table
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Table inside Modal</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">

            <!-- busqueda -->
                <div class="mb-3">
                <input id="searchInput" class="form-control me-2" type="search" placeholder="Search" aria-label="Search" onkeyup="searchTable()">
                </div>
            <!-- busqueda -->

            <!-- Table inside modal -->
            <form method="post">
                <div class="table-container">
                    <table class="table table-bordered" id="myTabla">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Age</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $ret = mysqli_query($con, "select * from tblservices");                     
                                $cnt = 1;
                                while ($row = mysqli_fetch_array($ret)) {
                            ?>
                            <tr>
                                <th scope="row"><?php echo $cnt;?></th> 
                                <td><?php echo $row['ServiceName'];?></td> 
                                <td><?php echo $row['Cost'];?></td> 
                                <td><input type="checkbox" name="sids[]" value="<?php echo $row['ID'];?>" ></td>
                            </tr>
                            <?php 
                                $cnt = $cnt + 1;
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </form>
            <!-- Table inside modal -->
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </div>
    </div>
    <!-- Modal -->

    <script>
        function searchTable() {
            // Obtener el valor del input de búsqueda
            var input = document.getElementById("searchInput");
            var filter = input.value.toLowerCase();
            var table = document.getElementById("myTabla");
            var tr = table.getElementsByTagName("tr");

            // Recorre todas las filas de la tabla y oculta las que no coincidan con el valor de búsqueda
            for (var i = 1; i < tr.length; i++) {
                var tds = tr[i].getElementsByTagName("td");
                var rowContainsFilter = false;
                for (var j = 0; j < tds.length; j++) {
                    if (tds[j]) {
                        if (tds[j].innerText.toLowerCase().indexOf(filter) > -1) {
                            rowContainsFilter = true;
                            break;
                        }
                    }
                }
                if (rowContainsFilter) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    </script>


    
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>