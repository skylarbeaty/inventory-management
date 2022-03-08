<?php 
include_once 'inc/head.php'; 

$_GET['navPage'] = 'inventory';
include_once 'inc/nav.php'; 
?>

<h3>Inventory</h3>
<table class="db-table">
    <thead>
        <tr>
            <th>Id</th>
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
            <tr>
                <td><?php echo $row['id']?></td>
                <td><?php echo $row['name']?></td>
                <td><?php echo $row['current_inventory']?></td>
                <td><?php echo $row['required_inventory']?></td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>

<?php
include_once 'inc/footer.php';
?>
