<?php 
include_once 'inc/head.php'; 

$_GET['navPage'] = 'shipments';
include_once 'inc/nav.php'; 
?>

<h3>Shipments</h3>
<table class="db-table">
    <thead>
        <tr>
            <th>Shipment ID</th>
            <th>Recipient Store</th>
            <th>Recipient Location</th>
            <th>Date</th>
            <th>Shipped</th>
        </tr>
    </thead>
    <tbody>
        <?php
        include_once 'inc/connect.php'; 
        $results = mysqli_query($connection, "SELECT shipments.id, shipments.recipient_id, recipients.location, shipments.date, shipments.shipped
            FROM shipments INNER JOIN recipients ON shipments.recipient_id=recipients.id
                ORDER BY shipments.id ASC");
        while($row = mysqli_fetch_array($results)) {
        ?>
            <tr>
                <td><?php echo $row['id']?></td>
                <td><?php echo $row['recipient_id']?></td>
                <td><?php echo $row['location']?></td>
                <td><?php echo $row['date']?></td>
                <td><?php echo $row['shipped']?></td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>

<h3>Shipment Items</h3>
<table class="db-table">
    <thead>
        <tr>
            <th>Item ID</th>
            <th>Item Name</th>
            <th>Current Inventory</th>
            <th>Shipment Quantity</th>
        </tr>
    </thead>
    <tbody>
        <?php
        include_once 'inc/connect.php'; 
        $query = "SELECT shipment_items.item_id, items.name, items.current_inventory, shipment_items.quantity, shipment_items.shipment_id
                FROM shipment_items INNER JOIN items ON shipment_items.item_id=items.id
                ORDER BY shipment_id ASC";
        $results = mysqli_query($connection, $query);
        $last_purchase_id = -1;
        while($row = mysqli_fetch_array($results)) {
            // print shipment id header each time there is a new one
            if($last_purchase_id != $row['shipment_id']){
                ?>
                <tr>
                    <th id="table-sub-header" colspan="4">Shipment ID <?php echo $row['shipment_id']?></th>
                </tr>
                <?php
                $last_purchase_id = $row['shipment_id'];
            }
            //print the items for each shipment
        ?>
            <tr>
                <td><?php echo $row['item_id']?></td>
                <td><?php echo $row['name']?></td>
                <td><?php echo $row['current_inventory']?></td>
                <td><?php echo $row['quantity']?></td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>

<?php
include_once 'inc/footer.php'
?>