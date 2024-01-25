-- Create the database 'oxygen-school' if it doesn't exist
CREATE DATABASE IF NOT EXISTS oxygen_school;
USE oxygen_school;

-- Create the 'student' table
DROP TABLE IF EXISTS student;
CREATE TABLE student (
                          id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
                          first_name VARCHAR(150) NOT NULL,
                          last_name VARCHAR(150) NOT NULL,
                          email VARCHAR(150) NOT NULL,
                          phone VARCHAR(20) NOT NULL,
                          birthday DATE NOT NULL,
                          student_address TEXT NOT NULL,
                          motivation TEXT NOT NULL,
                          course_id INT NOT NULL,
                          FOREIGN KEY (course_id) REFERENCES course(id)
);


-- Create the 'course' table
DROP TABLE IF EXISTS course;
CREATE TABLE course (
                          id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
                          course_name VARCHAR(150) NOT NULL,
                          course_description VARCHAR(5000) NOT NULL,
                          capacity INT NOT NULL,
                          course_address VARCHAR(200) NOT NULL,
                          course_date DATE NOT NULL,
                          duration VARCHAR(100) NOT NULL,
                          degree VARCHAR(200) NOT NULL,
                          financing_supported BOOLEAN NOT NULL,
                          discipline_id INT NOT NULL,
                          image_src VARCHAR(255) NOT NULL,
                          FOREIGN KEY (discipline_id) REFERENCES discipline(id)
);




-- Create the 'discipline' table
DROP TABLE IF EXISTS discipline;
CREATE TABLE discipline (
                          id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
                          discipline_name VARCHAR(200) NOT NULL,
                          discipline_description VARCHAR(5000) NOT NULL,
                          image_src VARCHAR(255) NOT NULL
);


-- Create the 'review' table
DROP TABLE IF EXISTS review;
CREATE TABLE student_review (
                         id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
                         student_id INT NOT NULL,
                         review VARCHAR(5000) NOT NULL,
                         FOREIGN KEY (`student_id`) REFERENCES `Student`(`id`)
);


-- Create the 'contact' table
DROP TABLE IF EXISTS contact;
CREATE TABLE contact (
                     id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
                     first_name VARCHAR(150) NOT NULL,
                     last_name VARCHAR(150) NOT NULL,
                     email VARCHAR(150) NOT NULL,
                     phone VARCHAR(20) NOT NULL,
                     contact_message VARCHAR(5000) NOT NULL
);



-- Create the 'team_member' table
DROP TABLE IF EXISTS team_member;
CREATE TABLE team_member (
                        id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
                        member_name VARCHAR(150) NOT NULL,
                        member_description VARCHAR(255) NOT NULL,
                        linkedin_url VARCHAR(255),
                        github_url VARCHAR(255),
                        img_src VARCHAR(255),
);


