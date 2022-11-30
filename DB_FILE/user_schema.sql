-- Author: Emmanuel Lucio Urbina
USE `stigma_db`;
CREATE TABLE IF NOT EXISTS `user_table` (
    `id` INT,
    `user` varchar(255) NOT NULL,
    `name` varchar(255) NOT NULL,
    `last_name` varchar(255) NOT NULL,
    `password` varchar(255) NOT NULL,
    `user_type` enum('administrador','usuario'),
    `profile_image` longblob,
    `created_at` TIMESTAMP DEFAULT NOW(),
    `updated_at` TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    UNIQUE(user)
) ENGINE=InnoDB DEFAULT CHARSET=armscii8 COMMENT='almacena usuarios';



-- LLAVES PRIMARIAS

ALTER TABLE `user_table`
  ADD PRIMARY KEY (`id`);



-- AUTO INCREMENTOS

ALTER TABLE `user_table`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;


-- Arregla el campo de cambio de fecha automatico 
-- a la hora de actualizar
ALTER TABLE user_table
    CHANGE updated_at  
        updated_at TIMESTAMP NOT NULL
            DEFAULT CURRENT_TIMESTAMP
            ON UPDATE CURRENT_TIMESTAMP;