USE `stigma_db`;

ALTER TABLE `user_table`
    ADD `estatus` enum('active', 'deleted') DEFAULT 'active';