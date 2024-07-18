<?php
	session_start();
	error_reporting(0);
	include('includes/dbconnection.php');

	if (strlen($_SESSION['bpmsaid']==0)) {
		header('location:logout.php');
	} else {
?>

<!DOCTYPE HTML>
<html>
<head>
    <title>SPA | Detalle de Factura</title>
    <!-- Existing CSS and JS includes -->
    <link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
    <link href="css/style.css" rel='stylesheet' type='text/css' />
    <link href="css/font-awesome.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
    <link href="css/custom.css" rel="stylesheet">
    <script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/modernizr.custom.js"></script>
    <script src="js/wow.min.js"></script>
    <script>
        new WOW().init();
    </script>
    <script src="js/metisMenu.min.js"></script>
    <script src="js/custom.js"></script>
    <script src="js/bootstrap.js"></script>

    <!-- Add CSS for print -->
    <style>
        @media print {
            .table {
                width: 100%;
                border-collapse: collapse;
            }
            .table th, .table td {
                border: 1px solid #000;
                padding: 8px;
                text-align: left;
            }
            .table th {
                background-color: #f2f2f2;
            }
            .title {
                text-align: center;
                margin-bottom: 20px;
            }
        }
    </style>
</head>

<body class="cbp-spmenu-push">
    <div class="main-content">
        <?php include_once('includes/sidebar.php');?>
        <?php include_once('includes/header.php');?>
        <div id="page-wrapper">
            <div class="main-page">
                <div class="tables" id="exampl">
                    <div id="printHeader" style="display: none;">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <img src="images/Logo.png" alt="Logo" style="height: 80px;">
                            <div style="text-align: left;">
                                <p>Salon de Belleza Marisol</p>
                                <p>Av. los Pinos Mz.e, Lima 15011</p>
                                <p>salon@example.com</p>
                                <p>944704796</p>
                            </div>
                            <div style="text-align: center;">
                                <p>Factura</p>
                                <p>Nro: <span id="invoiceNumber"></span></p>
                            </div>
                            
                        </div>
                        <hr>
                    </div>
                    <h3 class="title1">Detalle de Factura</h3>
                    <?php
                        $invid=intval($_GET['invoiceid']);
                        echo "<script>document.getElementById('invoiceNumber').innerText = $invid;</script>";
                        $ret=mysqli_query($con,"select DISTINCT  tblinvoice2.PostingDate,tbcliente.Name,tbcliente.Dni,tbcliente.Email,tbcliente.MobileNumber,tbcliente.Genero
                        from  tblinvoice2
                        join tbcliente on tbcliente.ID=tblinvoice2.Userid 
                        where tblinvoice2.BillingId='$invid'");
                        $cnt=1;
                        while ($row=mysqli_fetch_array($ret)) {
                    ?>                                                        
                    <div class="table-responsive bs-example widget-shadow">
                        <h4>Factura #<?php echo $invid;?></h4>
                        <table class="table table-bordered">
                            <tr><th colspan="6" class="title">Detalle de Cliente</th></tr>
                            <tr>
                                <th>Nombre</th>
                                <td><?php echo $row['Name']?></td>
                                <th>No de Contacto.</th>
                                <td><?php echo $row['MobileNumber']?></td>
                                <th>Correo</th>
                                <td><?php echo $row['Email']?></td>
                            </tr>
                            <tr>
                                <th>Género</th>
                                <td><?php echo $row['Genero']?></td>
                                <th>Dni</th>
                                <td><?php echo $row['Dni']?></td>
                                <th>Fecha de Factura</th>
                                <td><?php echo $row['PostingDate']?></td>
                            </tr>
                        <?php } ?>
                        </table>
                        <table class="table table-bordered">
                            <tr><th colspan="3" class="title">Detalle de Servicios</th></tr>
                            <tr>
                                <th>#</th>
                                <th>Nombre de Servicio</th>
                                <th>Costo</th>
                            </tr>
                            <?php
                                $ret=mysqli_query($con,"select tblservices.ServiceName,tblservices.Cost  
                                from  tblinvoice2 
                                join tblservices on tblservices.ID=tblinvoice2.ServiceId 
                                where tblinvoice2.BillingId='$invid'");
                                $cnt=1;
                                while ($row=mysqli_fetch_array($ret)) {
                            ?>
                            <tr>
                                <th><?php echo $cnt;?></th>
                                <td><?php echo $row['ServiceName']?></td>
                                <td><?php echo $subtotal=$row['Cost']?></td>
                            </tr>
                            <?php 
                                $cnt=$cnt+1;
                                $gtotal+=$subtotal;
                                }
                            ?>
                            <tr>
                                <th colspan="2" style="text-align:center">Total</th>
                                <th><?php echo $gtotal?></th>
                            </tr>
                        </table>
                        <p style="margin-top:1%" align="center">
                            <i class="fa fa-print fa-2x" style="cursor: pointer;" OnClick="CallPrint(this.value)"></i>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <?php include_once('includes/footer.php');?>
    </div>
    <script src="js/classie.js"></script>
    <script>
        var menuLeft = document.getElementById('cbp-spmenu-s1'),
            showLeftPush = document.getElementById('showLeftPush'),
            body = document.body;

        showLeftPush.onclick = function() {
            classie.toggle(this, 'active');
            classie.toggle(body, 'cbp-spmenu-push-toright');
            classie.toggle(menuLeft, 'cbp-spmenu-open');
            disableOther('showLeftPush');
        };

        function disableOther(button) {
            if (button !== 'showLeftPush') {
                classie.toggle(showLeftPush, 'disabled');
            }
        }

        function CallPrint(strid) {
            var prtContent = document.getElementById("exampl").innerHTML;
            var prtHeader = document.getElementById("printHeader").innerHTML;
            var WinPrint = window.open('', '', 'left=0,top=0,width=800,height=900,toolbar=0,scrollbars=0,status=0');
            WinPrint.document.write('<html><head><title>Imprimir Factura</title>');
            WinPrint.document.write('<style>@media print { .table { width: 100%; border-collapse: collapse; } .table th, .table td { border: 1px solid #000; padding: 8px; text-align: left; } .table th { background-color: #f2f2f2; } .title { text-align: center; margin-bottom: 20px; } }</style>');
            WinPrint.document.write('</head><body>');
            WinPrint.document.write(prtHeader);
            WinPrint.document.write(prtContent);
            WinPrint.document.write('</body></html>');
            WinPrint.document.close();
            WinPrint.focus();
            WinPrint.print();
            WinPrint.close();
        }
    </script>
</body>
</html>
<?php 
	}  
?>