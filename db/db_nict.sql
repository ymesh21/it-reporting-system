CREATE DATABASE IF NOT EXISTS db_nict;
USE db_nict;

-- Roles Table (Admin, Zone, Woreda)
CREATE TABLE roles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name ENUM('Admin', 'Zone', 'Woreda') NOT NULL UNIQUE
);

-- Users Table
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- User Roles Table (Many-to-Many Relationship)
CREATE TABLE user_roles (
    user_id INT,
    role_id INT,
    PRIMARY KEY (user_id, role_id),
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (role_id) REFERENCES roles(id) ON DELETE CASCADE
);
-- Locations
CREATE TABLE locations (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    parent_id INT UNSIGNED NULL,
    type ENUM('Zone', 'Woreda') NOT NULL,
    FOREIGN KEY (parent_id) REFERENCES locations(id) ON DELETE CASCADE
);
-- Training categories
CREATE TABLE categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL UNIQUE
);
-- Trainings
CREATE TABLE trainings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    category_id INT NOT NULL,
    trainer VARCHAR(255) NOT NULL,
    location_id INT UNSIGNED NOT NULL, -- Can be a zone or woreda
    date DATE NOT NULL,
    created_by INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (category_id) REFERENCES categories(id) ON DELETE CASCADE,
    FOREIGN KEY (location_id) REFERENCES locations(id) ON DELETE CASCADE,
    FOREIGN KEY (created_by) REFERENCES users(id) ON DELETE CASCADE
);
-- Devices
CREATE TABLE devices (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    type ENUM('Computer', 'Printer', 'Router', 'Photocopier', 'Other') NOT NULL,
    location_id INT UNSIGNED NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (location_id) REFERENCES locations(id) ON DELETE CASCADE
);
-- Maintenance
CREATE TABLE maintenance (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    device_id INT NOT NULL,
    location_id INT UNSIGNED NOT NULL,
    performed_by VARCHAR(255) NOT NULL,
    date DATE NOT NULL,
    created_by INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (device_id) REFERENCES devices(id) ON DELETE CASCADE,
    FOREIGN KEY (location_id) REFERENCES locations(id) ON DELETE CASCADE,
    FOREIGN KEY (created_by) REFERENCES users(id) ON DELETE CASCADE
);
-- Websites
CREATE TABLE websites (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    url VARCHAR(255) NOT NULL UNIQUE,
    status ENUM('Active', 'Inactive', 'Under Development') NOT NULL,
    location_id INT UNSIGNED NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (location_id) REFERENCES locations(id) ON DELETE CASCADE
);

-- Applications
CREATE TABLE apps (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    version VARCHAR(50) NOT NULL,
    location_id INT UNSIGNED NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (location_id) REFERENCES locations(id) ON DELETE CASCADE
);
-- OPen sources
CREATE TABLE open_sources (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    location_id INT UNSIGNED NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (location_id) REFERENCES locations(id) ON DELETE CASCADE
);

-- Activity logs
CREATE TABLE activity_logs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    action VARCHAR(255) NOT NULL,  -- e.g., 'Added Training', 'Deleted Maintenance'
    table_name VARCHAR(100) NOT NULL, -- e.g., 'trainings', 'maintenance'
    record_id INT NOT NULL, -- The ID of the affected record
    location_id INT UNSIGNED NOT NULL, -- The zone or woreda where the action was performed
    timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (location_id) REFERENCES locations(id) ON DELETE CASCADE
);
-- Error logs
CREATE TABLE error_logs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    error_message TEXT NOT NULL,
    file_name VARCHAR(255) NOT NULL,
    line_number INT NOT NULL,
    user_id INT NULL, -- NULL if system-generated error
    timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE SET NULL
);

-- Reports
CREATE TABLE reports (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    report_type ENUM('Training', 'Maintenance', 'Website', 'App', 'Device', 'Open Source') NOT NULL,
    related_table VARCHAR(100) NOT NULL, -- E.g., 'trainings', 'maintenance'
    record_id INT NOT NULL, -- The ID of the related activity
    location_id INT UNSIGNED NOT NULL, -- Zone or Woreda submitting the report
    submitted_by INT NOT NULL, -- User who submitted the report
    status ENUM('Pending', 'Approved', 'Rejected') DEFAULT 'Pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (location_id) REFERENCES locations(id) ON DELETE CASCADE,
    FOREIGN KEY (submitted_by) REFERENCES users(id) ON DELETE CASCADE
);

-- Approval
CREATE TABLE approvals (
    id INT AUTO_INCREMENT PRIMARY KEY,
    report_id INT NOT NULL, -- Links to reports table
    approved_by INT NOT NULL, -- User who approved/rejected the report
    status ENUM('Approved', 'Rejected') NOT NULL,
    remarks TEXT NULL, -- Optional remarks by the approver
    approved_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (report_id) REFERENCES reports(id) ON DELETE CASCADE,
    FOREIGN KEY (approved_by) REFERENCES users(id) ON DELETE CASCADE
);



-- Index for searching users by email
CREATE INDEX idx_users_email ON users(email);

-- Index for location-based queries
CREATE INDEX idx_locations_type ON locations(type);

-- Index for faster activity lookups
CREATE INDEX idx_trainings_location ON trainings(location_id);
CREATE INDEX idx_maintenance_location ON maintenance(location_id);

-- Insert Roles
INSERT INTO roles (name) VALUES ('Admin'), ('Zone'), ('Woreda');
