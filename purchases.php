<?php 
include_once 'inc/head.php'; 

$_GET['navPage'] = 'purchases';
include_once 'inc/nav.php'; 
?>

<h3 class="button_header">Purchases</h3>
<button class="pop_up_button" data-pop-up="add_purchase_pop_up">Add Purchase</button>
<table class="db-table">
    <thead>
        <tr>
            <th>Purchase ID</th>
            <th>Supplier ID</th>
            <th>Supplier Name</th>
            <th>Date</th>
            <th>Received</th>
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

<h3 class="button_header">Purchase Items</h3>
<button class="pop_up_button" data-pop-up="add_purchase_item_pop_up">Add Purchase Item</button>
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

<div id="add_purchase_pop_up" class="pop_up">
    <div class="pop_up_content">
        <span class="close">&times;</span>
        <form name="add_purchase_form" action="forms.php" method="post">
            <h2>Add Purchase</h2>
            Purchase ID: <input type="text" name="purchase_id"><br>
            Supplier ID: <input type="text" name="supplier_id"><br>
            Item Name: <input type="date" name="purchase_date"><br>
            <button name="add_purchase_submit" type="submit" value="add_purchase_form">Submit</button>
        </form>
    </div>
</div>

<div id="add_purchase_item_pop_up" class="pop_up">
    <div class="pop_up_content">
        <span class="close">&times;</span>
        <form name="add_purchase_item_form" action="forms.php" method="post">
            <h2>Add Purchase Item</h2>
            Item ID: <input type="text" name="item_id"><br>
            Purchase ID: <input type="text" name="purchase_id"><br>
            Quantity: <input type="text" name="quantity"><br>
            <button name="add_purchase_item_submit" type="submit" value="add_purchase_item_form">Submit</button>
        </form>
    </div>
</div>

<script src="forms.js"></script>

<?php
include_once 'inc/footer.php'
?>