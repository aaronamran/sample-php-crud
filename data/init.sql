-- data/init.sql
-- Create database and table for the sample PHP CRUD app

CREATE DATABASE IF NOT EXISTS sampledb;
USE sampledb;

CREATE TABLE IF NOT EXISTS todos (
  id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(255) NOT NULL,
  description TEXT,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
