-- @BLOCK
CREATE TABLE items(
    id INT AUTO_INCREMENT,
    name VARCHAR(255),
    sku INT UNIQUE,
    current_inventory int,
    required_inventory int,
    PRIMARY KEY (id)
);

-- @BLOCK
CREATE TABLE suppliers(
    id INT AUTO_INCREMENT,
    supplier_name VARCHAR(255),
    PRIMARY KEY (id)
);

-- @BLOCK
CREATE TABLE purchases(
    id INT AUTO_INCREMENT,
    date DATE,
    supplier_id INT,
    recieved BOOLEAN,
    PRIMARY KEY (id),
    FOREIGN KEY (supplier_id) REFERENCES suppliers(id)
);

-- @BLOCK
CREATE TABLE purchase_items(
    id INT AUTO_INCREMENT,
    item_id INT,
    purchase_id INT,
    quantity INT NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (item_id) REFERENCES items(id),
    FOREIGN KEY (purchase_id) REFERENCES purchases(id)
);

-- @BLOCK
CREATE TABLE recipients(
    id INT AUTO_INCREMENT,
    store_number INT UNIQUE,
    location VARCHAR(255),
    Primary KEY (id)
);

-- @BLOCK
CREATE TABLE shipments(
    id INT AUTO_INCREMENT,
    date DATE,
    recipient_id INT,
    recieved BOOLEAN,
    PRIMARY KEY (id),
    FOREIGN KEY (recipient_id) REFERENCES recipients(id)
);

-- @BLOCK
CREATE TABLE shipment_items(
    id INT AUTO_INCREMENT,
    item_id INT,
    shipment_id INT,
    quantity int NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (item_id) REFERENCES items(id),
    FOREIGN KEY (shipment_id) REFERENCES shipments(id)
);

