
<?php
require_once 'config.php' ;

$sql = 'SELECT * FROM transactions';
$result = $conn->query($sql);
$arr_records = [];
if ($result->num_rows > 0) {
    $arr_records = $result->fetch_all(MYSQLI_ASSOC);
}
?>

<table id="datatablesSimple">
    <thead>
        <tr>
            <th>ID</th>
            <th>Date of Transaction</th>
            <th>Client Name</th>
            <th>Nature of Case</th>
            <th>Price</th>
            <th>Action</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th>ID</th>
            <th>Date of Transaction</th>
            <th>Client Name</th>
            <th>Nature of Case</th>
            <th>Price</th>
            <th>Action</th>
        </tr>
    </tfoot>
    <tbody>
        <?php if(!empty($arr_records)) { ?>
            <?php foreach($arr_records as $record) { ?>
                <tr>
                    <td><?php echo $record['id']; ?></td>
                    <td><?php echo $record['date_transaction']; ?></td>
                    <td><?php echo $record['name']; ?></td>
                    <td><?php echo $record['nature_of_case']; ?></td>
                    <td><?php echo $record['price']; ?></td>
                    <td>Action</td>
                </tr>
            <?php } ?>
        <?php } ?>
    </tbody>
</table>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
<script>
    jQuery(document).ready(function($)){
        $('#datatableSimple').DataTable();
    }
</script>