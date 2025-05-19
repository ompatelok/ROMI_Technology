-- Create Database
CREATE DATABASE IF NOT EXISTS romi_db;
USE romi_db;

-- Create Users Table
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL
);

-- Insert Admin User (Password: 123456)
INSERT INTO users (name, email, password) VALUES 
('Om', 'om@example.com', '123456');

-- Create IoT Data Table
CREATE TABLE IF NOT EXISTS iot_data (
    id INT AUTO_INCREMENT PRIMARY KEY,
    recorded_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    heart_rate INT,
    spo2 INT,
    temperature FLOAT
);

-- Optional: Sample IoT Data
INSERT INTO iot_data (heart_rate, spo2, temperature) VALUES
(76, 98, 36.7),
(82, 97, 37.0),
(79, 99, 36.9);

-- Insert Contact-Us
CREATE TABLE IF NOT EXISTS contact_messages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    message TEXT NOT NULL,
    submitted_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
