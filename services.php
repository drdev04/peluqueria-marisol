<?php
  session_start();
  error_reporting(0);
  include('includes/dbconnection.php');

  if(isset($_POST['submit'])) {
    $uid=intval($_SESSION['id']);
    $invoiceid=mt_rand(100000000, 999999999);
    $sid=$_POST['sids'];

    for ($i=0;$i<count($sid);$i++) {
    $svid=$sid[$i];
    $ret=mysqli_query($con,"insert into tblinvoice(Userid,ServiceId,BillingId) values('$uid','$svid','$invoiceid');");
    if ($ret) {
      $_SESSION['data']=2;
    }
    } 
    
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Servicios</title>
  
  <link href="https://fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,500,600,700,800,900" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i,900,900i" rel="stylesheet">

  <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
  <link rel="stylesheet" href="css/animate.css">
  
  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">
  <link rel="stylesheet" href="css/magnific-popup.css">

  <link rel="stylesheet" href="css/aos.css">

  <link rel="stylesheet" href="css/ionicons.min.css">

  <link rel="stylesheet" href="css/bootstrap-datepicker.css">
  <link rel="stylesheet" href="css/jquery.timepicker.css">

  
  <link rel="stylesheet" href="css/flaticon.css">
  <link rel="stylesheet" href="css/icomoon.css">
  <link rel="stylesheet" href="css/style.css">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <style>
  .card {
    height: 100%;
  }
  .card-img-top {
    height: 400px;
    object-fit: cover;
  }
  .btn-1 {
    background-color: #000;
    color: #fff76a;
    font-weight: bold;
    
    ;
  }
  .btn-2 {    
    background-color: #fff76a;
    color: #000;
    border-color: #000;
    font-weight: bold;
  }

  .btn-1:hover {
    background-color: #fff76a;
    color: #000;
  }

  .btn-2:hover {
    background: #000;
    color: #fff76a;
  }

  .btn-2:hover a{
    color: #fff76a;
  }

  .card-img-tup {
    height: 230px;
    width: 350px;
  }

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

  .card-img-top2 {
    display: block; /* Asegura que la imagen se trate como un bloque */
    margin-left: auto; /* Centra horizontalmente */
    margin-right: auto; /* Centra horizontalmente */
    width: 70px;
    height: 70px;
  }
  </style>
</head>

<body>
	  <?php include_once('includes/header.php');?>

    <section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg-2.jpg')" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
          <div class="col-md-9 ftco-animate pb-5">
            <h2 class="mb-0 bread">Servicios</h2>
            <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Inicio <i class="ion-ios-arrow-forward"></i></a></span> <span>Servicios <i class="ion-ios-arrow-forward"></i></span></p>
          </div>
        </div>
      </div>
    </section>
       
    <section class="ftco-section ftco-pricing">
      <div class="container pb-0">
        <div class="row justify-content-center">
          <div class="col-md-10 heading-section text-center ftco-animate">
            <h1 class="big">Corte</h1><span class="subheading">Corte</span>
            <h2 class="mb-4">Corte Damas / Caballeros</h2>
          </div>
        </div>
        <div id="servicesCarousel" class="carousel slide pb-5" data-ride="carousel">
          <div class="carousel-inner">
            <?php
              $ret = mysqli_query($con, "select * from tblservices where id BETWEEN 1 AND 18");
              $cnt = 0;
              $items = [];
              while ($row = mysqli_fetch_array($ret)) {
                $items[] = $row;
              }
              $chunks = array_chunk($items, 3); // Dividir los elementos en grupos de 3
              foreach ($chunks as $index => $chunk) {
                $activeClass = ($index == 0) ? 'active' : '';
            ?>
          <div class="carousel-item <?php echo $activeClass; ?>">
            <div class="row">
                  <?php foreach ($chunk as $row) { ?>
              <div class="col-md-4 mb-4">
                <div class="card">
                  <img src="<?php echo $row['img'];?>" class="card-img-top" alt="Imagen <?php echo $row['id']; ?>">
                  <div class="card-body">
                    <h5 class="card-title"><?php echo $row['ServiceName'];?></h5>
                    <p class="card-text">S/.<?php echo $row['Cost'];?></p>
                  </div>
                </div>
              </div>
                  <?php } ?>
            </div>
          </div>
            <?php } ?>
          </div>
        <a class="carousel-control-prev" href="#servicesCarousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#servicesCarousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
        </div>


        <div class="row justify-content-center">
          <div class="col-md-10 heading-section text-center ftco-animate">
            <h1 class="big">Servicios</h1><span class="subheading">Servicios</span>
            <h2 class="mb-4">Otros Servicios</h2>
          </div>
        </div>
        <div id="servicesCarouse2" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">
            <?php
              $ret = mysqli_query($con, "select * from tblservices where id BETWEEN 19 AND 27");
              $cnt = 0;
              $items = [];
              while ($row = mysqli_fetch_array($ret)) {
                $items[] = $row;
              }
              $chunks = array_chunk($items, 3); // Dividir los elementos en grupos de 3
              foreach ($chunks as $index => $chunk) {
                $activeClass = ($index == 0) ? 'active' : '';
            ?>
          <div class="carousel-item <?php echo $activeClass; ?>">
            <div class="row">
                  <?php foreach ($chunk as $row) { ?>
              <div class="col-md-4 mb-4">
                <div class="card">
                  <img src="<?php echo $row['img'];?>" class="card-img-top" alt="Imagen <?php echo $row['id']; ?>">
                  <div class="card-body">
                    <h5 class="card-title"><?php echo $row['ServiceName'];?></h5>
                    <p class="card-text">S/.<?php echo $row['Cost'];?></p>
                  </div>
                </div>
              </div>
                  <?php } ?>
            </div>
          </div>
            <?php } ?>
          </div>
        <a class="carousel-control-prev" href="#servicesCarouse2" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#servicesCarouse2" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
        </div>
      </div>        
		</section>

    <section style="background-image: url('images/peluca.jpg'); 
                    background-repeat: no-repeat;               
                    background-position: center; 
                    padding-bottom: 60px;" 
                    data-stellar-background-ratio="0.5">
      <div class="container">
          <h1 style="text-align:center; font-size:72px; padding-bottom: 80px; padding-top: 80px; color: white">
              <span>
                  <span><b>SERVICIOS ESPECIALES</b></span>
              </span>
          </h1>
      </div>
      <div class="container">
          <div class="row" style="text-align: center">
              <div class="col-4 p-3">
                  <img class="img-fluid card-img-tup" src="images/boda.jpg" alt="">
                  <span>
                      <p class="pt-5"><h4 style="color: yellow"><b>Matrimonio / Bodas</b></h4></p><br>
                      <p style="color: white"><b>En nuestra peluquería, ofrecemos un conjunto de servicios especializados para novias y asistentes a bodas, asegurando que todos luzcan espectaculares en ese día tan especial. </b></p>
                  </span>
              </div>
              <div class="col-4 p-3">
                  <img class="img-fluid card-img-tup" src="images/kids.jpg" alt="">
                  <span>
                    <p class="pt-5"><h4 style="color: yellow"><b>Peinado / Infantil</b></h4></p><br>
                    <p style="color: white"><b>Una peluquería para niños ofrece una variedad de servicios especializados diseñados para hacer que la experiencia de cortar el cabello sea divertida y libre de estrés para los pequeños.</b></p>
                  </span>
              </div>
              <div class="col-4 p-3">
                  <img class="img-fluid card-img-tup" src="images/graduacion.jpg" alt="">
                  <span>
                    <p class="pt-5"><h4 style="color: yellow"><b>Graduación / Promoción</b></h4></p><br>
                    <p style="color: white"><b>Para una peluquería que ofrece servicios de peinados para una graduación, la atención se centra en crear estilos elegantes y sofisticados que complementen la ocasión especial.</b></p>
                  </span>
              </div>
          </div>
      </div>
      <div class="container">
          <div class="row" style="text-align: center">
              <div class="col-4 p-3">
                  <img class="img-fluid card-img-tup" src="images/disfraz.jpg" alt="">
                  <span>
                      <p class="pt-5"><h4 style="color: yellow"><b>Maquillaje / Disfraces</b></h4></p><br>
                      <p style="color: white"><b>Para una peluquería que ofrece servicios de peinados para una fiesta de disfraces, el enfoque se centra en la creatividad y la personalización para complementar los trajes y temas únicos.</b></p>
                  </span>
              </div>
              <div class="col-4 p-3">
                  <img class="img-fluid card-img-tup" src="images/quinces.jpg" alt="">
                  <span>
                    <p class="pt-5"><h4 style="color: yellow"><b>Fiesta / Quinceañeros</b></h4></p><br>
                    <p style="color: white"><b>Para una peluquería que ofrece servicios de peinados para una quinceañera, el enfoque es crear un look elegante y deslumbrante que haga que la celebrante se sienta como una princesa en su día especial. </b></p>
                  </span>
              </div>
              <div class="col-4 p-3">
                  <img class="img-fluid card-img-tup" src="images/spa.jpg" alt="">
                  <span>
                    <p class="pt-5"><h4 style="color: yellow"><b>Spa / Masajes</b></h4></p><br>
                    <p style="color: white"><b>Una peluquería que también ofrece servicios de masajes se enfoca en proporcionar una experiencia de relajación y bienestar integral. </b></p>
                  </span>
              </div>
          </div>
      </div>
      
      <div class="container" style="background-color: #fff76a">
          <h1 style="text-align:center; color: black; font-size: 72px; padding-top: 80px; padding-bottom: 10px;">
            <span>
              <span><b>¿PLANEAS HACER UNA<br>RESERVA?</b></span>
            </span>
          </h1>
          <div class="container" style="display: flex; justify-content: center; padding-bottom: 80px;">
            <di class="row">
              <div class="col-6">
                <button class="btn-1" style="height: 60px; width: 180px;" 
                type="submit" name="submit" data-bs-toggle="modal" data-bs-target="#exampleModal">Reservar</button>
              </div>
              <div class="col-6" >
                <a href="services.php"><button class="btn-2" style="height: 60px; width: 180px;">Volver</button></a>
              </div>
            </div>
          </div>
      </div>
    </section>

  <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header" style="display: flex; justify-content: center; background-image: url(images/fondo.jpg); background-repeat: no-repeat; background-size: cover; background-position: center;">
            <h5 class="modal-title" id="exampleModalLabel"><b>Registrar Servicio Especial</b></h5>
          </div>
          <form method="post">
            <div class="modal-body" style="background-image: url(images/fondo.jpg); background-repeat: no-repeat; background-size: cover; background-position: center;">
              <!-- busqueda -->
                <div class="mb-3">
                  <label for="exampleFormControlInput1" class="form-label" style="color: #000;"><b>Buscar Tipo de Servicio:</b></label>
                  <input id="searchInput" class="form-control me-2" type="search" placeholder="Search" aria-label="Search" onkeyup="searchTable()">
                </div>
              <!-- busqueda -->
              <hr>        
              <!-- Table inside modal -->           
                <div class="table-container">
                    <table class="table table-bordered" id="myTabla">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th width="55%" style="text-align: center;">Servicio</th>
                                <th width="15%" style="text-align: center;">Categoria</th>
                                <th width="15%" style="text-align: center;">Costo</th>
                                <th width="15%" style="text-align: center;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $ret = mysqli_query($con, "select * from tblservicesEspecial");                     
                                $cnt = 1;
                                while ($row = mysqli_fetch_array($ret)) {
                            ?>
                            <tr>
                                <th scope="row" style="text-align: center;"><?php echo $cnt;?></th> 
                                <td style="text-align: center;"><?php echo $row['ServiceName'];?></td> 
                                <td style="text-align: center;"><?php echo $row['Categoria'];?></td> 
                                <td style="text-align: center;">S/.<?php echo $row['Cost'];?></td> 
                                <td style="text-align: center;"><input type="checkbox" name="sids[]" value="<?php echo $row['ID'];?>" ></td>
                            </tr>
                            <?php 
                                $cnt = $cnt + 1;
                                }
                            ?>
                        </tbody>
                    </table>
                </div>            
                <!-- Table inside modal -->
                <hr>   
                <div class="row">                 
                  <div class="mb-3 mt-3 col-6">
                    <label for="exampleFormControlInput1" class="form-label" style="color: #000;"><b>Seleccionar Fecha</b></label>
                    <input type="text" class="form-control" placeholder="Fecha" name="adate" id='adate' onkeyup="searchTable()" required="true">
                  </div>
                  <hr>                    
                  <div class="mb-3 mt-3 col-6">
                    <label for="exampleFormControlInput1" class="form-label" style="color: #000;"><b>Seleccionar Hora</b></label>
                    <input type="text" class="form-control" placeholder="Hora" name="atime" id='atime' onkeyup="searchTable()" required="true">
                  </div>
                </div>
            </div>         
            <div class="modal-footer" style="background-image: url(images/fondo.jpg); background-repeat: no-repeat; background-size: cover; background-position: center;">
              <button class="btn btn-primary p-2" type="submit" name="submit">Reservar</button>
            </div>  
          </form>       
        </div>
      </div>
    </div>
  <!-- Modal -->
 
    <?php include_once('includes/footer.php');?>
    
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/jquery.timepicker.min.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>

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
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            flatpickr("#atime", {
                enableTime: true,
                noCalendar: true,
                dateFormat: "H:i",
                minTime: "10:00",
                maxTime: "23:00",
                disable: [
                    function(date) {
                        // Disable Sundays
                        return (date.getDay() === 0);
                    },
                    // Additional dates to disable (e.g., holidays)
                    "2024-07-10", "2024-07-25"
                ],
                locale: {
                    firstDayOfWeek: 1 // Start week on Monday
                }
            });
        });
    </script>
    <script>
    	document.addEventListener('DOMContentLoaded', function() {
            flatpickr("#adate", {
                dateFormat: "Y-m-d",
                disable: [
                    // Specific dates to disable
					{ from: "2023-07-09", to: "2024-07-09" }
                ],
                locale: {
                    firstDayOfWeek: 1 // Start week on Monday
                }
            });
        });
    </script>
    
    <?php
    if(isset($_SESSION['data']) && $_SESSION['data']==2){
        echo "<script>
                Swal.fire({
                title: '¡Reserva Realizada!',
                text: 'Gracias por visitarnos',
                icon: 'success'
                });
              </script>";
        unset($_SESSION['data']);
    }
    ?>
</body>
</html>