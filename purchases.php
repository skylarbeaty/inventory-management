<?php 
include_once 'inc/head.php'; 

$_GET['navPage'] = 'purchases';
include_once 'inc/nav.php'; 
?>

<h3>Purchases</h3>
<table class="db-table">
    <thead>
        <tr>
            <th>Purchase ID</th>
            <th>Supplier ID</th>
            <th>Supplier Name</th>
            <th>Date</th>
            <th>Recieved</th>
        </tr>
    </thead>
    <tbody>
        <?php
        include_once 'inc/connect.php'; 
        $results = mysqli_query($connection, "SELECT purchases.id, purchases.supplier_id, suppliers.supplier_name, purchases.date, purchases.recieved
                FROM purchases INNER JOIN suppliers ON purchases.supplier_id=suppliers.id
                ORDER BY purchases.id ASC");
        while($row = mysqli_fetch_array($results)) {
        ?>
            <tr>
                <td><?php echo $row['id']?></td>
                <td><?php echo $row['supplier_id']?></td>
                <td><?php echo $row['supplier_name']?></td>
                <td><?php echo $row['date']?></td>
                <td><?php echo $row['recieved']?></td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>

<h3>Purchase Items</h3>
<table class="db-table">
    <thead>
        <tr>
            <th>Item ID</th>
            <th>Item Name</th>
            <th>Current Inventory</th>
            <th>Required Inventory</th>
            <th>Purchase Quantity</th>
        </tr>
    </thead>
    <tbody>
        <?php
        include_once 'inc/connect.php'; 
        $query = "SELECT purchase_items.item_id, items.name, items.current_inventory, items.required_inventory, purchase_items.quantity, purchase_items.purchase_id
                FROM purchase_items INNER JOIN items ON purchase_items.item_id=items.id
                ORDER BY purchase_id ASC";
        $results = mysqli_query($connection, $query);
        $last_purchase_id = -1;
        while($row = mysqli_fetch_array($results)) {
            // print purchase id header each time there is a new one
            if($last_purchase_id != $row['purchase_id']){
                ?>
                <tr>
                    <th id="table-sub-header" colspan="5">Purchase ID <?php echo $row['purchase_id']?></th>
                </tr>
                <?php
                $last_purchase_id = $row['purchase_id'];
            }
            //print the items for each purchase
        ?>
            <tr>
                <td><?php echo $row['item_id']?></td>
                <td><?php echo $row['name']?></td>
                <td><?php echo $row['current_inventory']?></td>
                <td><?php echo $row['required_inventory']?></td>
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