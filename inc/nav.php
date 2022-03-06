<div id="nav">
    <ul>
        <li><a href="inventory.php" <?php if($_GET['navPage'] == 'inventory') echo 'class="active"'; ?>>Inventory</a></li>
        <li><a href="purchases.php" <?php if($_GET['navPage'] == 'purchases') echo 'class="active"'; ?>>Purchases</a></li>
        <li><a href="shipments.php" <?php if($_GET['navPage'] == 'shipments') echo 'class="active"'; ?>>Shipments</a></li>
    </ul>
</div>