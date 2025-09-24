-- create database if it's not exists
CREATE DATABASE IF NOT EXISTS todolist;
USE todolist;

-- create tasks table if it's not exists
CREATE TABLE IF NOT EXISTS tasks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    task VARCHAR(255) NOT NULL,
    status BOOLEAN DEFAULT 0
);
