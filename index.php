<?php 
include_once 'inc/head.php'; 

$_GET['navPage'] = 'inventory';
include_once 'inc/nav.php'; 
?>

<h3 class="button_header">Inventory</h3>
<button class="pop_up_button" data-pop-up="add_item_pop_up">Add Item</button>
<table class="db-table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Current Inventory</th>
            <th>Required Inventory</th>
        </tr>
    </thead>
    <tbody>
        <?php
        include_once 'inc/connect.php'; 
        $results = mysqli_query($connection, "SELECT * FROM items");
        while($row = mysqli_fetch_array($results)) {
        ?>
            <tr class="pop_up_row" data-pop-up="update_item_pop_up">
                <td class="row_data"><?php echo $row['id']?></td>
                <td class="row_data"><?php echo $row['name']?></td>
                <td class="row_data"><?php echo $row['current_inventory']?></td>
                <td class="row_data"><?php echo $row['required_inventory']?></td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>

<div id="add_item_pop_up" class="pop_up">
    <div class="pop_up_content">
        <span class="close">&times;</span>
        <form name="add_item_form" action="forms.php" method="post">
            <h2>Add Item</h2>
            Item ID: <input type="text" name="item_id"><br>
            Item Name: <input type="text" name="item_name"><br>
            Starting Inventory: <input type="text" name="current_inventory"><br>
            Required Inventory: <input type="text" name="required_inventory"><br><br>
            <button name="add_item_submit" type="submit" value="add_item_form">Submit</button>
        </form>
    </div>
</div>

<div id="update_item_pop_up" class="pop_up">
    <div class="pop_up_content">
        <span class="close">&times;</span>
        <form name="update_item_form" action="forms.php" method="post">
            <h2>Update Item</h2><br>
            Item ID: <input class="row_input" readonly type="text" name="item_id"><br>
            Item Name: <input class="row_input" type="text" name="item_name"><br>
            Starting Inventory: <input class="row_input" type="text" name="current_inventory"><br>
            Required Inventory: <input class="row_input" type="text" name="required_inventory"><br>
            <button name="update_item_submit" type="submit" value="update_item_form">Submit</button>
            <button name="delete_item_submit" class="red_button" type="submit" value="update_item_form">Delete Item</button>
        </form>
    </div>
</div>

<script src="forms.js"></script>

<?php
include_once 'inc/footer.php';
?>
