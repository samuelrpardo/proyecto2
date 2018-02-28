<?php 
require_once('../class/Utility.php');

$date = $_GET['date'];
$dailyUtility = $utility->daily_utility($date);


 ?>
 <!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/bootstrap-theme.min.css">
    <!-- Font Awesome -->
    <link href="../assets/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <script type="text/javascript">
        print();
    </script>
  </head>
  <body>
    
 <center>
    <h1>Reporte Diario de Utilidad</h1>
    <h2>de</h2>
    <h3><?= $date; ?></h3>
 </center>
<br />
<div class="table-responsive">
        <table id="myTable-utility" class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                   <th>Código</th>
                    <th>Nombre</th>
                    <th>Cantidad</th>
                    <th><center>Precio Compra</center></th>
                    <th><center>Precio Venta</center></th>
                    <th><center>Ingreso</center></th>
                    <th><center>Costo</center></th>
                    <th><center>Sub Total</center></th>
                </tr>
            </thead>
            <tbody>
            <?php 
                $total = 0;
                foreach($dailyUtility as $ds):
                 $subTotal = number_format($ds['price_sale']-$ds['price_purchase'], 2);   
                 $total += $subTotal; 
            ?>
                <tr>
                   <td><?= $ds['cod']; ?></td>
                    <td><?= $ds['product']; ?></td>
                    <td><?= $ds['cant']; ?></td>
                    <td><?= number_format($ds['purchase'],2); ?></td>
                    <td><?= number_format($ds['price'],2); ?></td>
                    <td align="right"><?= number_format($ds['price_sale'],2); ?></td>
                    <td align="right"><?= number_format($ds['price_purchase'],2); ?></td>
                    <td align="right"><?= $subTotal; ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td align="right"><strong>TOTAL:</strong></td>
                <td align="center">
                    <strong><?= number_format($total,2); ?></strong>
                </td>
            </tr>
        </table>
</div>


<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />

<!-- for the datatable of employee -->
<script type="text/javascript">
    $(document).ready(function() {
        $('#myTable-utility').DataTable();
    });
</script>

<?php 
$utility->Disconnect();
 ?>