-- @BLOCK
INSERT INTO items (id, name, current_inventory, required_inventory)
VALUES
    (001001, 'Headphones', 15, 10),
    (001002, 'Earbuds', 17, 15),
    (001003, 'Gaming Headset', 10, 5),
    (001004, 'Bluetooth Speaker', 20, 12),
    (001005, 'Smartwatch', 15, 10),
    (001006, 'Webcam', 10, 5),
    (001007, 'Tablet', 15, 8),
    (001008, 'AA Batteries', 30, 20),
    (001009, 'AAA Batteries', 30, 20),
    (002001, 'Perfume', 30, 15),
    (002002, 'Hair Brush', 25, 10),
    (002003, 'Lotion', 20, 15),
    (002004, 'Eye Liner', 25, 12),
    (002005, 'Mascara', 30, 10),
    (002006, 'Concealer', 12, 8),
    (002007, 'Foundation', 15, 10),
    (002008, 'Blue Nail Polish', 12, 10),
    (002009, 'Black Nail Polish', 17, 10),
    (003001, 'Blender', 15, 5),
    (003002, 'Food Processor', 16, 5),
    (003003, 'Spatula', 15, 10),
    (003004, 'Oven Mit', 10, 8),
    (003005, 'Knife Set', 10, 5),
    (003006, 'Cast Iron Pan', 12, 5),
    (003007, 'Alunimum Pan', 15, 5),
    (003008, 'Plate', 13, 8),
    (003009, 'Bowl', 15, 8),
    (003010, 'Saucer', 11, 8),
    (003011, 'Mug', 17, 8),
    (003012, 'Cup', 15, 8),
    (003013, 'Water Bottle', 17, 15),
    (003014, 'Water Filter', 16, 10),
    (004001, 'Office Chair', 13, 10),
    (004002, 'Office Desk', 8, 5),
    (004003, 'Kitchen Chair', 27, 20),
    (004004, 'Kitchen Table', 7, 5),
    (004005, 'Reclining Chair', 8, 6),
    (004006, 'Couch', 7, 4),
    (004007, 'Futon', 8, 5),
    (004008, 'Bed Frame', 7, 6),
    (004009, 'Dresser', 5, 3);

-- @BLOCK
INSERT INTO suppliers (id, supplier_name)
VALUES
    (1, 'Jims Warehouse'),
    (2, 'Low Price Outlet'),
    (3, 'Shellys Supply Shop');

-- @BLOCK
INSERT INTO purchases(id, date, supplier_id, recieved)
VALUES
    (1, '2022-03-02', 1, True),
    (2, '2022-03-03', 2, True),
    (3, '2022-03-04', 1, True),
    (4, '2022-03-05', 3, True);

-- @BLOCK
INSERT INTO purchase_items(item_id, purchase_id, quantity)
VALUES
    (001001, 1, 2),
    (001003, 1, 5),
    (001004, 1, 6),
    (001005, 1, 17),
    (001007, 1, 2),
    (002001, 1, 5),
    (002002, 1, 18),
    (004007, 1, 3),

    (001002, 2, 15),
    (001004, 2, 1),
    (001004, 2, 22),
    (002003, 2, 1),
    (003001, 2, 4),
    (003003, 2, 7),

    (001001, 3, 10),
    (001007, 3, 12),
    (001008, 3, 2),
    (002001, 3, 25),
    (002003, 3, 2),
    (003013, 3, 1),

    (001003, 4, 2),
    (001004, 4, 4),
    (001005, 4, 12),
    (001008, 4, 22),
    (003003, 4, 5),
    (003005, 4, 16),
    (003013, 4, 4),
    (004001, 4, 39),
    (004002, 4, 6),
    (004009, 4, 3);

-- @BLOCK
INSERT INTO recipients(id, location)
VALUES
    (1386, 'Streetsboro'),
    (1299, 'Stow'),
    (2456, 'Akron');

-- @BLOCK
INSERT INTO shipments(id, date, recipient_id, shipped)
VALUES
    (1, '2022-03-01', 1386, FALSE),
    (2, '2022-03-02', 1299, FALSE),
    (3, '2022-03-03', 2456, FALSE),
    (4, '2022-03-04', 1386, FALSE);

-- @BLOCK
INSERT INTO shipment_items(item_id, shipment_id, quantity)
VALUES
    (001001, 1, 2),
    (001003, 1, 5),
    (001004, 1, 6),
    (001005, 1, 17),
    (001007, 1, 2),
    (002001, 1, 5),
    (004007, 1, 3),

    (001002, 2, 15),
    (001004, 2, 1),
    (002003, 2, 1),
    (003001, 2, 4),
    (003003, 2, 7),

    (001001, 3, 10),
    (001007, 3, 12),
    (001008, 3, 2),
    (002001, 3, 25),
    (002003, 3, 2),
    (003013, 3, 1),
    (001004, 2, 14),

    (001003, 4, 2),
    (001004, 4, 4),
    (001005, 4, 12),
    (001008, 4, 22),
    (003003, 4, 5),
    (003005, 4, 16),
    (003013, 4, 4),
    (004001, 4, 39),
    (004002, 4, 6),
    (004009, 4, 3),
    (002002, 1, 15);