 <!-- Handles the submission of all forms on the site, and send the page back when completed -->
<?php 
include_once 'inc/connect.php';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    //Invetory Page (index.php)
    if (!empty($_POST['add_item_submit'])) {
        $id = $_POST['item_id'];
        $name = $_POST['item_name'];
        $current = $_POST['current_inventory'];
        $required = $_POST['required_inventory'];

        $sql = "INSERT INTO items (id, name, current_inventory, required_inventory) 
            VALUES ($id, '$name', $current, $required)";
        if(mysqli_query($connection, $sql)){
            echo "Item added successfully.";
            header("location:index.php");   
        } else{
            echo "ERROR: Could not execute $sql. " . mysqli_error($connection);
        }
    }

    if (!empty($_POST['update_item_submit'])) {
        $id = $_POST['item_id'];
        $name = $_POST['item_name'];
        $current = $_POST['current_inventory'];
        $required = $_POST['required_inventory'];

        $sql = "UPDATE items
            SET name='$name', current_inventory=$current, required_inventory=$required
            WHERE id=$id";
        if(mysqli_query($connection, $sql)){
            echo "Item updated successfully.";
            header("location:index.php");   
        } else{
            echo "ERROR: Could not execute $sql. " . mysqli_error($connection);
        }
    }
    if (!empty($_POST['delete_item_submit'])) {
        $id = $_POST['item_id'];

        $sql="DELETE FROM items WHERE id=$id";
        if(mysqli_query($connection, $sql)){
            echo "Item deleted successfully.";
            header("location:index.php");   
        } else{
            echo "ERROR: Could not execute $sql. " . mysqli_error($connection);
        }
    }
    //Purchases Page
    if (!empty($_POST['add_purchase_submit'])) {
        $id = $_POST['purchase_id'];
        $date = $_POST['purchase_date'];
        $supplier_id = $_POST['supplier_id'];

        $sql = "INSERT INTO purchases (id, date, supplier_id, recieved) 
            VALUES ($id, $date, $supplier_id, False)";
        if(mysqli_query($connection, $sql)){
            echo "Purchase added successfully.";
            header("location:purchases.php");   
        } else{
            echo "ERROR: Could not execute $sql. " . mysqli_error($connection);
        }
    }
    if (!empty($_POST['add_purchase_item_submit'])) {
        $item_id = $_POST['item_id'];
        $purchase_id = $_POST['purchase_id'];
        $quantity = $_POST['quantity'];

        $sql = "INSERT INTO purchase_items(item_id, purchase_id, quantity)
            VALUES ($item_id, $purchase_id, $quantity)";
        if(mysqli_query($connection, $sql)){
            echo "Purchase item added successfully.";
            header("location:purchases.php");   
        } else{
            echo "ERROR: Could not execute $sql. " . mysqli_error($connection);
        }
    }
    //Shipments Page
    if (!empty($_POST['add_shipment_submit'])) {
        $id = $_POST['shipment_id'];
        $date = $_POST['shipment_date'];
        $recipient_id = $_POST['recipient_id'];

        $sql = "INSERT INTO shipments (id, date, recipient_id, shipped) 
            VALUES ($id, $date, $recipient_id, False)";
        if(mysqli_query($connection, $sql)){
            echo "Shipment added successfully.";
            header("location:shipments.php");   
        } else{
            echo "ERROR: Could not execute $sql. " . mysqli_error($connection);
        }
    }
    if (!empty($_POST['add_shipment_item_submit'])) {
        $item_id = $_POST['item_id'];
        $shipment_id = $_POST['shipment_id'];
        $quantity = $_POST['quantity'];

        $sql = "INSERT INTO shipment_items(item_id, shipment_id, quantity)
            VALUES ($item_id, $shipment_id, $quantity)";
        if(mysqli_query($connection, $sql)){
            echo "Shipment item added successfully.";
            header("location:shipments.php");   
        } else{
            echo "ERROR: Could not execute $sql. " . mysqli_error($connection);
        }
    }
}
?>