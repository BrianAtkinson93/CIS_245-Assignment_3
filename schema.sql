-- Create the schema
CREATE SCHEMA Assignment_3;

-- Create the tables
CREATE TABLE Assignment_3.Students (
                                       s_id INT PRIMARY KEY,
                                       name VARCHAR(50) NOT NULL,
                                       password VARCHAR(50) NOT NULL
);

CREATE TABLE Assignment_3.Courses (
                                      c_id INT PRIMARY KEY,
                                      course_code VARCHAR(10) NOT NULL,
                                      section CHAR(1) NOT NULL
);

CREATE TABLE Assignment_3.Registered (
                                         s_id INT NOT NULL,
                                         c_id INT NOT NULL,
                                         PRIMARY KEY (s_id, c_id),
                                         FOREIGN KEY (s_id) REFERENCES Assignment_3.Students(s_id),
                                         FOREIGN KEY (c_id) REFERENCES Assignment_3.Courses(c_id)
);

-- Insert the data
INSERT INTO Assignment_3.Students (s_id, name, password) VALUES
                                                             (514333, 'Sara', 'sara123'),
                                                             (515300, 'Carl', 'kAr@m1998');

INSERT INTO Assignment_3.Courses (c_id, course_code, section) VALUES
                                                                  (1, 'CENG420', 'A'),
                                                                  (2, 'CENG420', 'B'),
                                                                  (3, 'CENG435', 'A');

INSERT INTO Assignment_3.Registered (s_id, c_id) VALUES
                                                     (514333, 1),
                                                     (514333, 3),
                                                     (515300, 1);
