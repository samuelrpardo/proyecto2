<?php 
require_once('../class/Utility.php');

$date = $_GET['date'];
//var_dump($_REQUEST); exit();
//$dailySales = $sales->daily_sales($date);

$dailyUtility = $utility->daily_utility($date);

 ?>
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
                <td align="right">
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