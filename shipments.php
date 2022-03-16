<?php 
include_once 'inc/head.php'; 

$_GET['navPage'] = 'shipments';
include_once 'inc/nav.php'; 
?>

<h3 class="button_header">Shipments</h3>
<button class="pop_up_button" data-pop-up="add_shipment_pop_up">Add Shipment</button>
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

<h3 class="button_header">Shipment Items</h3>
<button class="pop_up_button" data-pop-up="add_shipment_item_pop_up">Add Shipment Item</button>
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

<div id="add_shipment_pop_up" class="pop_up">
    <div class="pop_up_content">
        <span class="close">&times;</span>
        <form name="add_shipment_form" action="forms.php" method="post">
            <h2>Add Shipment</h2>
            Shipment ID: <input type="text" name="shipment_id"><br>
            Recipient ID: <input type="text" name="recipient_id"><br>
            Date: <input type="date" name="shipment_date"><br>
            <button name="add_shipment_submit" type="submit" value="add_shipment_form">Submit</button>
        </form>
    </div>
</div>

<div id="add_shipment_item_pop_up" class="pop_up">
    <div class="pop_up_content">
        <span class="close">&times;</span>
        <form name="add_shipment_item_form" action="forms.php" method="post">
            <h2>Add Shipment Item</h2>
            Item ID: <input type="text" name="item_id"><br>
            Shipment ID: <input type="text" name="shipment_id"><br>
            Quantity: <input type="text" name="quantity"><br>
            <button name="add_shipment_item_submit" type="submit" value="add_shipment_item_form">Submit</button>
        </form>
    </div>
</div>

<?php
include_once 'inc/footer.php'
?>