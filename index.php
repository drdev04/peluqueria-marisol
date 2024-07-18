<?php 
include('includes/dbconnection.php'); 	// Incluir el archivo de conexión a la base de datos.
session_start(); 					  	// Iniciar la sesión.
error_reporting(0); 				 	// Configurar el nivel de reporte de errores a cero (no mostrar errores).

if(isset($_POST['submit'])) 			// Verificar si el formulario ha sido enviado (si se ha presionado el botón 'submit').
  {										// Asignar los datos del formulario a variables...
    $name=$_POST['name']; 				
    $email=$_POST['email'];
    $services=$_POST['services'];
    $adate=$_POST['adate'];
    $atime=$_POST['atime'];
    $phone=$_POST['phone'];
    $aptnumber = mt_rand(100000000, 999999999);   // Generar un número de cita aleatorio.
	
	// Insertar los datos de la cita en la base de datos.
    $query=mysqli_query($con,"insert into tblappointment(AptNumber,Name,Email,PhoneNumber,AptDate,AptTime,Services) value('$aptnumber','$name','$email','$phone','$adate','$atime','$services')");
    
	if ($query) {   // Verificar si la inserción fue exitosa.
		$ret=mysqli_query($con,"select AptNumber from tblappointment where Email='$email' and  PhoneNumber='$phone'"); // Recuperar el número de la cita recién insertada.
		$result=mysqli_fetch_array($ret);
		$_SESSION['aptno']=$result['AptNumber'];   						// Guardar el número de la cita en la sesión.
 		echo "<script>window.location.href='thank-you.php'</script>";   // Redirigir al usuario a la página 'thank-you.php'.	
  	} else {
      $msg="Algo salió mal. Inténtalo de nuevo";						// Mostrar un mensaje de error si la inserción falla.
    }
  }

  	if(isset($_POST['evento'])) {

    $nameEve=$_POST['name2'];
    $dniEve=$_POST['dni2'];
    $emailEve=$_POST['email2'];
    $fonoEve=$_POST['number2'];
	$evento=$_POST['evento2'];
	$ubi=$_POST['ubicacion'];

        $query2=mysqli_query($con, "insert into  tb_evento (NOMBRE,DNI,CORREO,TELEFONO,EVENTO,UBICACION) 
		values ('$nameEve','$dniEve','$emailEve','$fonoEve','$evento','$ubi')");
    if ($query2) {
        $_SESSION['data']=2;
    }
	}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Inicio</title>
	
	<!--Estilos CSS para el diseño de la pagina web-->
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
	<!-- Estilos CSS para el diseño de la pagina web -->

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  	
	<style>
	.card-img-tup {
    	height: 200px;
  	}

	.card-img-top {
    	height: 250px;
  	}
	</style>
  </head>

  <body>
	<?php include_once('includes/header.php');?>   <!-- Incluir el diseño del header -->

	<!-- Primer contenedor -->
    <section id="home-section" class="hero" style="background-image: url(images/fondo.jpg);" data-stellar-background-ratio="0.5">	
		<!-- Contenedor principal del carrusel -->
		<div class="home-slider owl-carousel">
			<!-- Elemento individual del slider -->
			<div class="slider-item js-fullheight">
	      		<div class="overlay"></div>
	        	<div class="container-fluid p-0">
	          		<div class="row d-md-flex no-gutters slider-text align-items-end justify-content-end" data-scrollax-parent="true">
	          		<img class="one-third align-self-end order-md-last img-fluid" src="images/c.png" alt="" width="1000" height="500">
		          		<div class="one-forth d-flex align-items-center ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
		          			<div class="text mt-5">
		          				<span class="subheading">Marisol</span>
			            		<h1 class="mb-4">Salón de Belleza</h1>
			            		<p class="mb-4">Nos enorgullecemos de nuestro trabajo de alta calidad y atención al detalle. Los productos que utilizamos son de marca de primera calidad.</p>
		            		</div>
		          		</div>
	        		</div>
	        	</div>
	      	</div>
			<!-- Elemento individual del slider -->
	      	<div class="slider-item js-fullheight">
	      		<div class="overlay"></div>
	        	<div class="container-fluid p-0">
	          		<div class="row d-flex no-gutters slider-text align-items-center justify-content-end" data-scrollax-parent="true">
	          		<img class="one-third align-self-end order-md-last img-fluid" src="images/corte.png" alt="">
		          		<div class="one-forth d-flex align-items-center ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
		          			<div class="text mt-5">
		          				<span class="subheading">Marisol</span>
			            		<h1 class="mb-4">Peluquería y SPA</h1>
			            		<p class="mb-4">Este salón ofrece enormes instalaciones con equipos de tecnología avanzada y un servicio de la mejor calidad. Aquí le ofrecemos el mejor tratamiento que nunca haya experimentado antes.</p> 
		            		</div>
		          		</div>
	        		</div>
	        	</div>
	    	</div>
	    </div>
    </section>

	<br>

	<!-- Segundo contenedor -->
    <section class="ftco-section ftco-no-pt ftco-booking">
    	<div class="container-fluid px-0">
    		<div class="row no-gutters d-md-flex justify-content-end">
				<div class="one-forth d-flex align-items-end">
					<div class="text">
						<div class="overlay"></div>
						<div class="appointment-wrap">
							<span class="subheading">Reservaciones</span>
							<h3 class="mb-2">Haga una cita</h3>
							<!-- bloque del formulario de registro de cita -->
							<form action="#" method="post" class="appointment-form">
								<div class="row">
									<div class="col-sm-12">										
										<div class="form-group">								
											<input type="text" class="form-control" id="name" placeholder="<?php echo $_SESSION['nam'];?>" value="<?php echo $_SESSION['nam'];?>" name="name" required="true" readonly>
										</div>
									</div>
									<div class="col-sm-12">
										<div class="form-group">
											<input type="email" class="form-control" id="appointment_email" placeholder="<?php echo $_SESSION['correo'];?>" value="<?php echo $_SESSION['correo'];?>" name="email" required="true" readonly>
										</div>
									</div>
									<div class="col-sm-12">
										<div class="form-group">
											<div class="select-wrap">
												<div class="icon"><span class="ion-ios-arrow-down"></span></div>
												<select name="services" id="services" required="true" class="form-control">
													<option value="">Selecciona Nuestros Servicios</option>
														<!-- bloque php-->
														<?php $query=mysqli_query($con,"select * from tblservices");
															while($row=mysqli_fetch_array($query))
															{
														?>
															<option value="<?php echo $row['ServiceName'];?>"><?php echo $row['ServiceName'];?></option>
														<?php 
															} 
														?> 
														<!-- bloque php-->
												</select>
											</div>
										</div>
									</div>
									<div class="col-sm-12">
										<div class="form-group">
											<input type="text" class="form-control" placeholder="Fecha" name="adate" id='adate' required="true">
										</div>    
									</div>
									<div class="col-sm-12">
										<div class="form-group">
											<input type="text" class="form-control" placeholder="Hora" name="atime" id='atime' required="true">
										</div>
									</div>
									<div class="col-sm-12">
										<div class="form-group">
											<input type="text" class="form-control" id="phone" name="phone" placeholder="<?php echo $_SESSION['num'];?>" value="<?php echo $_SESSION['num'];?>" required="true" readonly>
										</div>
									</div>
								</div>
								<div class="form-group">
									<input type="submit" name="submit" value="HAZ UNA CITA" class="btn btn-primary">
								</div>
							</form>
						</div>
					</div>
				</div>
				<div class="one-third">
					<div class="img" style="background-image: url(images/bg-1.jpg);"></div>
				</div>
    		</div>
    	</div>
    </section>

	<div class="container-fluid" style="margin-top: 30px; background-color: #583c4c;">
		<img class="img" src="images/evento.jpg" style="width: 100%">
    </div>
	<div class="container-fluid" style="background-image: url(images/fondo.jpg); background-repeat: no-repeat; background-size: cover; background-position: center;">
        <h1 style="text-align:center; color: #000; padding: 50px; font-family: Georgia, 'Times New Roman', Times, serif">
            <span>
            	<span><b>- Participa en Nuestros Eventos -</b></span>
            </span>
        </h1>
		<p style="text-align:center; color: #000; padding: 400px; padding-top: 0px; padding-bottom: 50px; font-family: Georgia, 'Times New Roman', Times, serif">
			Te invitamos a ser parte de nuestros eventos sociales, en donde te ofreceremos una experiencia de belleza excepcional 
			en un ambiente cálido y acogedor. Nuestro equipo de estilistas altamente capacitados está aquí para 
			ayudarte a lucir y sentirte lo mejor posible. Ya sea que necesites un corte de cabello moderno, 
			un color vibrante o un tratamiento rejuvenecedor, estamos listos para transformar tu look y darte un impulso de confianza.
		</p>
    </div>
	<div class="container-fluid" style="display: flex; align-content: center; justify-content: center;">
          <div class="row" style="text-align: center">
              <div class="col-4 p-3">
			  	<div class="card" style="width: 25rem;">
					<img src="images/peru.png" class="card-img-top" alt="...">
					<div class="card-body card-img-tup">
						<h5 class="card-title">¡Felices Fiestas!</h5>
						<p class="card-text">
							Queremos que luzcas increíble durante las celebraciones 
							de las Fiestas Patrias. Por eso, hemos preparado descuentos especiales para que te sientas 
							y te veas fabuloso/a.
						</p>
					</div>
					<div class="card-footer" style="background: white;">
						<a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal1">Ver más</a>
					</div>
				</div>
              </div>
              <div class="col-4 p-3">
				<div class="card" style="width: 25rem;">
						<img src="images/desc.png" class="card-img-top" alt="...">
						<div class="card-body card-img-tup">
							<h5 class="card-title">Descuentos Especiales</h5>
							<p class="card-text">
								¡Nos complace anunciar que ahora puedes disfrutar de descuentos exclusivos 
								todos los fines de semana en nuestra peluquería!
							</p>					
						</div>
						<div class="card-footer" style="background: white;">
						<a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal2">Ver más</a>
						</div>
					</div>
              </div>
              <div class="col-4 p-3">
				<div class="card" style="width: 25rem;">
						<img src="images/aniver.png" class="card-img-top" alt="...">
						<div class="card-body card-img-tup">
							<h5 class="card-title">¡Celebremos Nuestro Aniversario!</h5>
							<p class="card-text">
								Estamos emocionados de invitarte a la fiesta de aniversario de nuestra peluquería. 
								¡Queremos agradecerte por tu lealtad y apoyo a lo largo del tiempo!
							</p>
						</div>
						<div class="card-footer" style="background: white;">
						<a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal3">Reservar</a>
						</div>
					</div>
              </div>
          </div>
      </div>

	<br>

	<!-- Modal 1-->
	<div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header" style="display: flex; justify-content: center;">
				<h1 class="modal-title fs-5" id="exampleModalLabel"><b>¡Felices Fiestas!</b></h1>
			</div>	
			<form class="needs-validation" method="post" novalidate>	
				<div class="modal-body">
					<div class="container" style="display: flex; justify-content: center;">
						<img src="images/peru.png" width="90%" height="90%" alt="...">			
					</div>
					<hr>
					<div class="container">
						<h5 style="display:flex; justify-content: center; padding-top: 10px; ; padding-bottom: 10px;"><b>Servicios que ofreceremos:</b></h5>
							<ul style="color: #000; text-align: justify; padding: 100px; padding-top: 0px; padding-bottom: 0px;">
								<li>Cortes de cabello con estilos modernos y tradicionales, ajustados a las preferencias del cliente.</li>
								<li>Peinados especiales, elegantes y tradicionales.</li>
								<li>Ofertas en productos de belleza + Descuentos en productos de cuidado personal y belleza.</li>
								<li>Sorteos de productos de belleza. ¡Habran premios atractivos para los ganadores!</li>
							</ul>
					</div>		
					<hr>				
					<div class="container pt-2">
					<h5 style="display:flex; justify-content: center; padding-bottom: 20px;"><b>Registrate recibiras una invitacion a tu correo</b></h5>
						<div class="row">
							<div class="col-6">
								<label for="validationCustom01" class="form-label">Nombre y Apellido</label>
								<div class="input-group has-validation">
									<input type="text" class="form-control" id="validationCustom01" value="" name="name2"required>
									<div class="invalid-feedback">¡Campo incompleto!</div>
									<div class="valid-feedback">¡Campo completo!</div>
								</div>
							</div>
							<div class="col-6">
								<label for="validationCustom02" class="form-label">Documento de Identidad</label>
								<div class="input-group has-validation">
									<input type="number" class="form-control" id="validationCustom02" value="" name="dni2" required>
									<div class="invalid-feedback">¡Campo incompleto!</div>
									<div class="valid-feedback">¡Campo completo!</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<label for="validationCustomEmail" class="form-label">Correo Electrónico</label>
								<div class="input-group has-validation">
									<span class="input-group-text" id="inputGroupPrepend">@</span>
									<input type="email" class="form-control" id="validationCustomEmail" aria-describedby="inputGroupPrepend" name="email2" required>
									<div class="invalid-feedback">¡Campo incompleto!</div>
									<div class="valid-feedback">¡Campo completo!</div>
								</div>					
							</div>	
							<div class="col-6">
								<label for="validationCustom03" class="form-label">Número de Teléfono</label>
								<div class="input-group has-validation">
									<input type="number" class="form-control" id="validationCustom03" value="" name="number2" maxlength="9" required>
									<div class="invalid-feedback">¡Campo incompleto!</div>
									<div class="valid-feedback">¡Campo completo!</div>
								</div>
							</div>	
							<input type="hidden" class="form-control" type="text" name="evento2" id="id-evento2" value="Evento por fiestas patrias">
							<input type="hidden" class="form-control" type="text" name="ubicacion" id="id-evento2" value="Av. los Pinos Mz.e, Lima 15011">								
						</div>		
					</div>			
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
					<button class="btn btn-primary" type="submit" name="evento">Reservar</button>
				</div>
			</form>
		</div>
	</div>
	</div>
	<!-- Modal 1-->

	<!-- Modal 2-->
	<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
		<div class="modal-header" style="display: flex; justify-content: center;">
			<h1 class="modal-title fs-5" id="exampleModalLabel"><b>Descuentos Especiales</b></h1>
		</div>
		<form class="needs-validation" method="post" novalidate >	
				<div class="modal-body">
					<div class="container" style="display: flex; justify-content: center;">
						<img src="images/desc.png" width="100%" height="90%" alt="...">			
					</div>	
					<hr>
					<div class="container">
						<h5 style="display:flex; justify-content: center; padding-top: 10px; ; padding-bottom: 10px;"><b>Servicios que ofreceremos:</b></h5>
							<ul style="color: #000; text-align: justify; padding: 100px; padding-top: 0px; padding-bottom: 0px;">
								<li>Manicura +  Gel básico: cuidado estético de las uñas proporcionando una base duradera para el esmalte de gel.</li>
								<li>Tratamiento faciales: relajación y el bienestar general al proporcionar un cuidado personalizado y eficaz.</li>
								<li>Pedicura + Spa: tratamiento estético con una experiencia de relajación. Incluye la limpieza, el recorte y limado de uñas, la eliminación de callos y durezas, y la aplicación de esmalte.</li>
								<li>Descuento del 50% en los servicios mostrados anteriormente</li>
							</ul>
					</div>		
					<hr>										
					<div class="container pt-2">
					<h5 style="display:flex; justify-content: center; padding-bottom: 20px;"><b>Registrate recibiras una invitacion a tu correo</b></h5>
						<div class="row">
							<div class="col-6">
								<label for="validationCustom01" class="form-label">Nombre y Apellido</label>
								<div class="input-group has-validation">
									<input type="text" class="form-control" id="validationCustom01" value="" name="name2"required>
									<div class="invalid-feedback">¡Campo incompleto!</div>
									<div class="valid-feedback">¡Campo completo!</div>
								</div>
							</div>
							<div class="col-6">
								<label for="validationCustom02" class="form-label">Documento de Identidad</label>
								<div class="input-group has-validation">
									<input type="number" class="form-control" id="validationCustom02" value="" name="dni2" required>
									<div class="invalid-feedback">¡Campo incompleto!</div>
									<div class="valid-feedback">¡Campo completo!</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<label for="validationCustomEmail" class="form-label">Correo Electrónico</label>
								<div class="input-group has-validation">
									<span class="input-group-text" id="inputGroupPrepend">@</span>
									<input type="email" class="form-control" id="validationCustomEmail" aria-describedby="inputGroupPrepend" name="email2" required>
									<div class="invalid-feedback">¡Campo incompleto!</div>
									<div class="valid-feedback">¡Campo completo!</div>
								</div>					
							</div>	
							<div class="col-6">
								<label for="validationCustom03" class="form-label">Número de Teléfono</label>
								<div class="input-group has-validation">
									<input type="number" class="form-control" id="validationCustom03" value="" name="number2" maxlength="9" required>
									<div class="invalid-feedback">¡Campo incompleto!</div>
									<div class="valid-feedback">¡Campo completo!</div>
								</div>
							</div>	
							<input type="hidden" class="form-control" type="text" name="evento2" id="id-evento2" value="Descuentos por fin de semana">
					        <input type="hidden" class="form-control" type="text" name="ubicacion" id="id-evento2" value="Av. los Pinos Mz.e, Lima 15011">
						</div>		
					</div>			
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
					<button class="btn btn-primary" type="submit" name="evento">Reservar</button>
				</div>
			</form>
		</div>
	</div>
	</div>
	<!-- Modal 2-->

	<!-- Modal 3-->
	<div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
		<div class="modal-header" style="display: flex; justify-content: center;">
			<h1 class="modal-title fs-5" id="exampleModalLabel"><b>¡Celebremos Nuestro Aniversario!</b></h1>
		</div>
		<form class="needs-validation" method="post" novalidate>	
				<div class="modal-body">
					<div class="container" style="display: flex; justify-content: center;">
						<img src="images/aniver.png" width="90%" height="90%" alt="...">			
					</div>		
					<hr>
					<div class="container">
						<h5 style="display:flex; justify-content: center; padding-top: 10px; ; padding-bottom: 10px;"><b>Servicios que ofreceremos:</b></h5>
							<ul style="color: #000; text-align: justify; padding: 100px; padding-top: 0px; padding-bottom: 0px;">
								<li>Demostraciones en vivo de técnicas de corte, peinado.</li>
								<li>Fiesta y Compartir</li>
								<li>Ofertas en productos de belleza + Descuentos en productos de cuidado personal y belleza.</li>
								<li>Sorteos de productos de belleza. ¡Habran premios atractivos para los ganadores!</li>
								<li>Ofreceremos una pequeña área para que los asistentes se tomen fotos con nuestros trabajadores.</li>
							</ul>
					</div>		
					<hr>				
					<div class="container pt-2">
					<h5 style="display:flex; justify-content: center; padding-bottom: 20px;"><b>Registrate recibiras una invitacion a tu correo</b></h5>
						<div class="row">
							<div class="col-6">
								<label for="validationCustom01" class="form-label">Nombre y Apellido</label>
								<div class="input-group has-validation">
									<input type="text" class="form-control" id="validationCustom01" value="" name="name2"required>
									<div class="invalid-feedback">¡Campo incompleto!</div>
									<div class="valid-feedback">¡Campo completo!</div>
								</div>
							</div>
							<div class="col-6">
								<label for="validationCustom02" class="form-label">Documento de Identidad</label>
								<div class="input-group has-validation">
									<input type="number" class="form-control" id="validationCustom02" value="" name="dni2" required>
									<div class="invalid-feedback">¡Campo incompleto!</div>
									<div class="valid-feedback">¡Campo completo!</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<label for="validationCustomEmail" class="form-label">Correo Electrónico</label>
								<div class="input-group has-validation">
									<span class="input-group-text" id="inputGroupPrepend">@</span>
									<input type="email" class="form-control" id="validationCustomEmail" aria-describedby="inputGroupPrepend" name="email2" required>
									<div class="invalid-feedback">¡Campo incompleto!</div>
									<div class="valid-feedback">¡Campo completo!</div>
								</div>					
							</div>	
							<div class="col-6">
								<label for="validationCustom03" class="form-label">Número de Teléfono</label>
								<div class="input-group has-validation">
									<input type="number" class="form-control" id="validationCustom03" value="" name="number2" maxlength="9" required>
									<div class="invalid-feedback">¡Campo incompleto!</div>
									<div class="valid-feedback">¡Campo completo!</div>
								</div>
							</div>	
							<input type="hidden" class="form-control" type="text" name="evento2" id="id-evento2" value="Aniversario Peluqueria Marisol">
							<input type="hidden" class="form-control" type="text" name="ubicacion" id="id-evento2" value="Av. los Pinos Mz.e, Lima 15011">
						</div>		
					</div>			
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
					<button class="btn btn-primary" type="submit" name="evento">Reservar</button>
				</div>
			</form>
		</div>
	</div>
	</div>
	<!-- Modal 3-->

   	<?php include_once('includes/footer.php');?>   <!-- Incluir el diseño del footer -->
    
	<!-- loader -->
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
	<script>
		(() => {
		'use strict'

		// Fetch all the forms we want to apply custom Bootstrap validation styles to
		const forms = document.querySelectorAll('.needs-validation')

		// Loop over them and prevent submission
		Array.from(forms).forEach(form => {
			form.addEventListener('submit', event => {
			if (!form.checkValidity()) {
				event.preventDefault()
				event.stopPropagation()
			}

			form.classList.add('was-validated')
			}, false)
		})
		})()
	</script>
	<script>
		const inputField = document.getElementById('validationCustom03');

		inputField.addEventListener('input', function() {
			if (this.value.length > 9) {
			this.value = this.value.slice(0, 9);
			}
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