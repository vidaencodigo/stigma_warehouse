-- Author: Emmanuel Lucio Urbina
USE `stigma_db`;
CREATE TABLE IF NOT EXISTS `entries_table` (
    `id` INT,
    `ticket` VARCHAR(250),
    `product_id` INT,
    `quantity` INT,
    `created_at` TIMESTAMP DEFAULT NOW(),
    `updated_at` TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    `estatus` enum('active', 'deleted') DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=armscii8 COMMENT='almacena entradas';



-- LLAVES PRIMARIAS

ALTER TABLE `entries_table`
  ADD PRIMARY KEY (`id`);



-- AUTO INCREMENTOS

ALTER TABLE `entries_table`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;


-- Arregla el campo de cambio de fecha automatico 
-- a la hora de actualizar
ALTER TABLE entries_table
    CHANGE updated_at  
        updated_at TIMESTAMP NOT NULL
            DEFAULT CURRENT_TIMESTAMP
            ON UPDATE CURRENT_TIMESTAMP;


--LLAVES FORANEAS




ALTER TABLE `entries_table` ADD CONSTRAINT `product_entrie` FOREIGN KEY (`product_id`) REFERENCES `product_table` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;