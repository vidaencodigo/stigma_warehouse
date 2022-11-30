-- Author: Emmanuel Lucio Urbina
USE `stigma_db`;
CREATE TABLE IF NOT EXISTS `product_table` (
    `id` INT,
    `sku` varchar(255) NOT NULL,
    `name` varchar(255) NOT NULL,
    `description` varchar(255) NOT NULL,
    `category` enum('general','entretenimiento', 'cocina', 'snack'),
    `marca` varchar(255) NOT NULL,
    `supplier_price` decimal(12,2) NOT NULL,
    `percent_gain` TINYINT (100) NOT NULL DEFAULT(25),
    `taxes` TINYINT(100) NOT NULL DEFAULT(16),
    `min` int DEFAULT 5,
    `max` int DEFAULT 30, 
    `product_image` longblob,
    `created_at` TIMESTAMP DEFAULT NOW(),
    `updated_at` TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    `estatus` enum('active', 'deleted') DEFAULT 'active',
    UNIQUE(sku)
) ENGINE=InnoDB DEFAULT CHARSET=armscii8 COMMENT='almacena productos';



-- LLAVES PRIMARIAS

ALTER TABLE `product_table`
  ADD PRIMARY KEY (`id`);



-- AUTO INCREMENTOS

ALTER TABLE `product_table`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;


-- Arregla el campo de cambio de fecha automatico 
-- a la hora de actualizar
ALTER TABLE product_table
    CHANGE updated_at  
        updated_at TIMESTAMP NOT NULL
            DEFAULT CURRENT_TIMESTAMP
            ON UPDATE CURRENT_TIMESTAMP;