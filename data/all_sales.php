<?php 
require_once('../class/Sales.php');

$date = $_GET['date'];
//var_dump($_REQUEST); exit();
$dailySales = $sales->daily_sales($date);


 ?>
<br />
<div class="table-responsive">
        <table id="myTable-sales" class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th>Nro Venta</th>
                    <th>Código</th>
                    <th>Nombre</th>
                    <th>Fabricante</th>
                    <th><center>Gramos</center></th>
                    <th><center>Tipo</center></th>
                    <th><center>Precio</center></th>
                    <th><center>Cant.</center></th>
                    <th><center>Sub Total</center></th>
                </tr>
            </thead>
            <tbody>
            <?php 
                $total = 0;
                foreach($dailySales as $ds):
                $subTotal = ($ds['price'] * $ds['qty']);
//                 var_dump(count($dailySales));  exit();
                $total += $subTotal; 
            ?>
                <tr>
                	<td><?= $ds['code_transaction']; ?></td>
                    <td><?= $ds['item_code']; ?></td>
                    <td><?= $ds['generic_name']; ?></td>
                    <td><?= $ds['brand']; ?></td>
                    <td><?= $ds['gram']; ?></td>
                    <td><?= $ds['type']; ?></td>
                    <td align="right"><?= number_format($ds['price'],2); ?></td>
                    <td align="center"><?= $ds['qty']; ?></td>
                    <td align="right"><?= number_format($subTotal,2); ?></td>
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
                 <td></td>
                <td align="right"><strong>TOTAL:</strong></td>
                <td align="right">
                    <strong><?= "S/.". number_format($total,2); ?></strong>
                </td>
            </tr>
        </table>
</div>


<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />

<!-- for the datatable of employee -->
<script type="text/javascript">
    $(document).ready(function() {
        $('#myTable-sales').DataTable(
        		{
        	        "order": [[ 1, "desc" ]]
        	    } 

        	    );
    });
</script>

<?php 
$sales->Disconnect();
 ?>