CREATE DATABASE IF NOT EXISTS university_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE university_db;

CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(100) NOT NULL UNIQUE,
  password_hash VARCHAR(255) NOT NULL,
  role ENUM('admin','staff','student') NOT NULL DEFAULT 'admin',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE students (
  id INT AUTO_INCREMENT PRIMARY KEY,
  student_number VARCHAR(50) UNIQUE,
  name_en VARCHAR(200),
  name_ar VARCHAR(200),
  email VARCHAR(200),
  course VARCHAR(200),
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE courses (
  id INT AUTO_INCREMENT PRIMARY KEY,
  course_code VARCHAR(50) UNIQUE,
  name_en VARCHAR(200),
  name_ar VARCHAR(200),
  instructor VARCHAR(200),
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO users (username, password_hash, role) VALUES
('admin', '$2y$10$uV4f7y8L8nQw0YwDq1o3be7xkzjYxQZkY0G1y2Z3a4b5c6d7e8f9', 'admin');

INSERT INTO students (student_number, name_en, name_ar, email, course) VALUES
('2025001','Mohamed Essam','محمد عصام','mohamed@example.com','Communications');

INSERT INTO courses (course_code, name_en, name_ar, instructor) VALUES
('COM101','Intro to Communications','مقدمة في الاتصالات','Dr. Ahmed');
