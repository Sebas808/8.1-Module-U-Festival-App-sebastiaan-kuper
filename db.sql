CREATE DATABASE ufestival;
USE ufestival;

-- Secties (zoals FAQ, Bereikbaarheid etc.)
CREATE TABLE sections (
  id INT AUTO_INCREMENT PRIMARY KEY,
  key_name VARCHAR(100)
);

-- Content per sectie (meertalig)
CREATE TABLE content (
  id INT AUTO_INCREMENT PRIMARY KEY,
  section_id INT,
  title_nl VARCHAR(255),
  title_en VARCHAR(255),
  text_nl TEXT,
  text_en TEXT,
  FOREIGN KEY (section_id) REFERENCES sections(id)
);

-- FAQ
CREATE TABLE faq (
  id INT AUTO_INCREMENT PRIMARY KEY,
  question_nl TEXT,
  question_en TEXT,
  answer_nl TEXT,
  answer_en TEXT
);

-- Schedule blijft hetzelfde
CREATE TABLE schedule (
  id INT AUTO_INCREMENT PRIMARY KEY,
  day VARCHAR(20),
  time VARCHAR(50),
  artist VARCHAR(255),
  stage VARCHAR(255)
);
