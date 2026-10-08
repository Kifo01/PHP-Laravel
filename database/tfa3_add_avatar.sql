-- Run this in phpMyAdmin after selecting the northstar_pos database.
ALTER TABLE users
    ADD COLUMN avatar VARCHAR(255) NULL AFTER full_name;
