# IPT10 Laboratory - Student Management System

This project is a PHP-based Student Management System developed for the IPT10 laboratory. It demonstrates CRUD (Create, Read, Update, Delete) operations using two different PHP database connectivity approaches: **MySQLi** and **PDO**.

## Project Versions

The project contains two implementations:

* **MySQLi** - located in `ipt10_lab/`
* **PDO** - located in `ipt10_lab_pdo/`

Both versions connect to the same MySQL database and provide the same student management functionality.

## Features

The applications support the following CRUD operations:

* Create a new student record
* View the list of students
* View a single student's information
* Edit an existing student record
* Delete a student record
* Input validation
* Prepared statements and parameterized queries
* UUID-based student IDs
* ENUM values for the sex field

## Technologies Used

* PHP
* MySQL
* MySQLi
* PDO
* XAMPP
* phpMyAdmin
* HTML
* CSS

## Database Setup

Create a database named:

```text
ipt10_lab
```

Create the `students` table using the following SQL:

```sql
CREATE TABLE students (
    id CHAR(36) NOT NULL,
    first_name VARCHAR(100) NOT NULL,
    middle_name VARCHAR(100) NULL,
    last_name VARCHAR(100) NOT NULL,
    birthday DATE NOT NULL,
    sex ENUM('Male', 'Female') NOT NULL,
    email VARCHAR(150) UNIQUE NOT NULL,
    student_number VARCHAR(50) UNIQUE NOT NULL,
    program VARCHAR(200) NOT NULL,
    enrolment_date DATE NOT NULL,
    PRIMARY KEY (id)
);
```

## XAMPP Setup

1. Install and open XAMPP.
2. Start **Apache**.
3. Start **MySQL**.
4. Open phpMyAdmin.
5. Create the `ipt10_lab` database.
6. Create the `students` table using the SQL provided above.
7. Place this project inside the XAMPP `htdocs` folder.

The project should be located similar to:

```text
C:\xampp\htdocs\ipt10-lab-db
```

## Running the MySQLi Version

Open the following address in a browser:

```text
http://localhost/ipt10-lab-db/ipt10_lab/
```

The MySQLi version uses `db_connect.php` for the database connection.

## Running the PDO Version

Open:

```text
http://localhost/ipt10-lab-db/ipt10_lab_pdo/
```

The PDO version uses `config.php` for the database connection.

## Project Structure

```text
ipt10-lab-db/
│
├── ipt10_lab/
│   ├── db_connect.php
│   ├── index.php
│   ├── create.php
│   ├── view.php
│   ├── edit.php
│   └── delete.php
│
├── ipt10_lab_pdo/
│   ├── config.php
│   ├── index.php
│   ├── create.php
│   ├── view.php
│   ├── edit.php
│   └── delete.php
│
├── README.md
└── .gitignore
```

## Purpose of the Laboratory

The purpose of this laboratory is to gain practical experience with PHP database connectivity and CRUD operations. It also provides a comparison between MySQLi and PDO, particularly in prepared statements, error handling, database portability, and connection configuration.

## Author

**Princess Allyssa Miranda**

**GitHub:** https://github.com/miranda-auf
